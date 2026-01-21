<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;
use App\Services\UserService;
use App\Services\EvaluationService;
use App\Services\SubmissionService;

class TeacherController extends Controller
{
    private $structureService;
    private $userService;
    private $evaluationService;
    private $submissionService;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('teacher');
        $this->structureService = new StructureService();
        $this->userService = new UserService();
        $this->evaluationService = new EvaluationService();
        $this->submissionService = new SubmissionService();
    }

    private function checkAuth($requiredRole = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        if ($requiredRole && $_SESSION['user_role'] !== $requiredRole) {
            header('Location: /login');
            exit();
        }
    }

    public function dashboard()
    {
        $teacherId = $_SESSION['user_id'] ?? null;
        $sprints = $this->structureService->getSprintsForTeacherClasses($teacherId);

        $sprintsWithBriefs = [];
        foreach ($sprints as $sprint) {
            $sprint->briefs = $this->structureService->getBriefsForSprint($sprint->id);
            $sprintsWithBriefs[] = $sprint;
        }

        $this->view('teacher.dashboard', ['sprints' => $sprintsWithBriefs]);
    }

    public function debrief()
    {
        $briefId = $_GET['brief_id'] ?? null;
        if (!$briefId) { $this->redirect('/teacher/dashboard'); return; }

        $brief = $this->structureService->getBrief($briefId);
        if (!$brief) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $sprintClassIds = $this->structureService->getSprintClasses($brief->sprint_id);

        $learners = [];
        foreach ($sprintClassIds as $classId) {
            $classLearners = $this->userService->getLearnersByClass($classId);
            $learners = array_merge($learners, $classLearners);
        }

        $this->view('teacher.debrief', ['brief' => $brief, 'learners' => $learners]);
    }

    public function viewSubmission()
    {
        $briefId = $_GET['brief_id'] ?? null;
        $learnerId = $_GET['learner_id'] ?? null;

        if (!$briefId || !$learnerId) { $this->redirect('/teacher/dashboard'); return; }

        $brief = $this->structureService->getBrief($briefId);
        if (!$brief) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $learner = $this->userService->getUser($learnerId);
        if (!$learner) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $submission = $this->submissionService->getSubmission($briefId, $learnerId);

        $this->view('teacher.view_submission', [
            'brief' => $brief,
            'learner' => $learner,
            'submission' => $submission
        ]);
    }

    public function evaluate()
    {
        $briefId = $_GET['brief_id'] ?? null;
        $learnerId = $_GET['learner_id'] ?? null;

        if (!$briefId || !$learnerId) { $this->redirect('/teacher/dashboard'); return; }

        $competences = $this->structureService->getAllCompetences();

        $this->view('teacher.evaluate_form', [
            'brief_id' => $briefId,
            'learner_id' => $learnerId,
            'competences' => $competences
        ]);
    }

    public function storeEvaluation()
    {
        $briefId = $_POST['brief_id'];
        $learnerId = $_POST['learner_id'];
        $teacherId = $_SESSION['user_id'] ?? 2;

        if (isset($_POST['levels'])) {
            foreach ($_POST['levels'] as $compId => $level) {
                $this->evaluationService->submitEvaluation([
                    'learner_id' => $learnerId,
                    'brief_id' => $briefId,
                    'competence_id' => $compId,
                    'level' => $level,
                    'comment' => $_POST['comments'][$compId] ?? '',
                    'teacher_id' => $teacherId
                ]);
            }
        }

        $this->redirect("/teacher/debrief?brief_id=$briefId");
    }
}
