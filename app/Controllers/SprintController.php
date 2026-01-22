<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;

class SprintController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('admin');
        $this->service = new StructureService();
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

    public function index()
    {
        $classId = $_GET['class_id'] ?? null;
        
        if ($classId) {
            $sprints = $this->service->getSprintsForClass($classId);
        } else {
            $sprints = $this->service->getAllSprints();
        }
        
        $this->view('admin.sprints.index', ['sprints' => $sprints, 'class_id' => $classId]);
    }

    public function create()
    {

        $classes = $this->service->getAllClasses();
        $competences = $this->service->getAllCompetences();

        $defaultClassId = $_GET['class_id'] ?? null;

        $this->view('admin.sprints.create', [
            'classes' => $classes, 
            'competences' => $competences,
            'default_class_id' => $defaultClassId
        ]);
    }

    public function store()
    {
        $this->service->createSprint($_POST);

        if (!empty($_POST['default_class_id'])) {
             $this->redirect('/admin/classes/sprints?class_id=' . $_POST['default_class_id']);
        } else {
             $this->redirect('/admin/sprints'); 
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) { $this->redirect('/admin/classes'); return; }

        $sprint = $this->service->getSprint($id);
        $classes = $this->service->getAllClasses();
        $competences = $this->service->getAllCompetences();

        $assignedClassIds = $this->service->getSprintClasses($id);
        $assignedCompIds = $this->service->getSprintCompetences($id);

        $this->view('admin.sprints.edit', [
            'sprint' => $sprint,
            'classes' => $classes,
            'competences' => $competences,
            'assignedClassIds' => $assignedClassIds,
            'assignedCompIds' => $assignedCompIds
        ]);
    }

    public function update()
    {
        $this->service->updateSprint($_POST['id'], $_POST);
        if (!empty($_POST['class_id'])) {
            $this->redirect('/admin/classes/sprints?class_id=' . $_POST['class_id']);
        } else {
            $this->redirect('/admin/sprints');
        }
    }
}
