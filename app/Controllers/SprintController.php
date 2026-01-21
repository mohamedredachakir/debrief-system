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
        $this->service = new StructureService();
    }

    public function index()
    {
        $classId = $_GET['class_id'] ?? null;
        if (!$classId) {
            $this->redirect('/admin/classes'); 
            return;
        }

        $sprints = $this->service->getSprintsForClass($classId);
        $this->view('admin.sprints.index', ['sprints' => $sprints, 'class_id' => $classId]);
    }

    public function create()
    {
        // We can create a sprint for a specific class context if link is from class, 
        // but now sprints are global/multi-class.
        // Let's pass all classes to select.
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
        // Redirect back to class view if context exists, or dashboard/sprints list
        if (!empty($_POST['default_class_id'])) {
             $this->redirect('/admin/classes/sprints?class_id=' . $_POST['default_class_id']);
        } else {
             $this->redirect('/admin/classes'); // Fallback
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
        $this->redirect('/admin/classes/sprints?class_id=' . $_POST['class_id']);
    }
}

