<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;
use App\Services\SubmissionService;

class LearnerController extends Controller
{
    private $structureService;
    private $submissionService;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('learner');
        $this->structureService = new StructureService();
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
        $learnerId = $_SESSION['user_id'];
        $userClassId = $_SESSION['user_class_id'] ?? null;

        if (!$userClassId) {
            $this->view('learner.dashboard', ['briefs' => [], 'evaluations' => []]);
            return;
        }

        $sprints = $this->structureService->getSprintsForClass($userClassId);

        $briefs = [];
        foreach ($sprints as $sprint) {
            $sprintBriefs = $this->structureService->getBriefsForSprint($sprint->id);
            $briefs = array_merge($briefs, $sprintBriefs);
        }

        $evaluations = [];

        $this->view('learner.dashboard', ['briefs' => $briefs, 'evaluations' => $evaluations]);
    }

    public function submitForm()
    {
        $briefId = $_GET['brief_id'] ?? null;
        if (!$briefId) {
            $this->redirect('/learner/dashboard');
            return;
        }

        $brief = $this->structureService->getBrief($briefId);
        if (!$brief) {
            $this->redirect('/learner/dashboard');
            return;
        }

        $learnerId = $_SESSION['user_id'];
        $existingSubmission = $this->submissionService->getSubmission($briefId, $learnerId);

        $this->view('learner.submit', ['brief' => $brief, 'submission' => $existingSubmission]);
    }

    public function submitWork()
    {
        $learnerId = $_SESSION['user_id'];

        $data = [
            'learner_id' => $learnerId,
            'brief_id' => $_POST['brief_id'] ?? null,
            'project_link' => $_POST['project_link'] ?? '',
            'comments' => $_POST['comments'] ?? ''
        ];

        if (empty($data['brief_id'])) {
            $this->redirect('/learner/dashboard');
            return;
        }

        $this->submissionService->submitWork($data);
        $this->redirect('/learner/dashboard');
    }
}
