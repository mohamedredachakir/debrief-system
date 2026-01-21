<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;
use App\Services\UserService;
use App\Services\EvaluationService;

class TeacherController extends Controller
{
    private $structureService;
    private $userService;
    private $evaluationService;

    public function __construct()
    {
        parent::__construct();
        $this->structureService = new StructureService();
        $this->userService = new UserService();
        $this->evaluationService = new EvaluationService();
    }

    public function dashboard()
    {
        // Mock: Get Briefs assigned to teacher's class (Sprint 1)
        $briefs = $this->structureService->getBriefsForSprint(1);
        $this->view('teacher.dashboard', ['briefs' => $briefs]);
    }

    public function debrief()
    {
        $briefId = $_GET['brief_id'] ?? null;
        if (!$briefId) { $this->redirect('/teacher/dashboard'); return; }

        // Mock: Get Learners in class (Class 1)
        $learners = $this->userService->getLearnersByClass(1);
        
        // Pseudo-load brief for title
        $brief = $this->structureService->getBrief($briefId); // Need to ensure getBrief exists in StructureService or repo
        // Fallback if not implemented in service yet
        if (!$brief) {
             $brief = (object)['id' => $briefId, 'title' => 'Brief ' . $briefId];
        }

        $this->view('teacher.debrief', ['brief' => $brief, 'learners' => $learners]);
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
