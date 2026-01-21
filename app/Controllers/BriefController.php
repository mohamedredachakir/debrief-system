<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;

class BriefController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
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
        $sprintId = $_GET['sprint_id'] ?? null;
        if (!$sprintId) {
            $this->redirect('/admin/classes');
            return;
        }

        $briefs = $this->service->getBriefsForSprint($sprintId);
        $this->view('admin.briefs.index', ['briefs' => $briefs, 'sprint_id' => $sprintId]);
    }

    public function create()
    {
        $this->checkAuth('teacher');

        $sprintId = $_GET['sprint_id'] ?? null;
        if (!$sprintId) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $sprint = $this->service->getSprint($sprintId);
        if (!$sprint) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $teacherId = $_SESSION['user_id'];
        $teacherSprints = $this->service->getSprintsForTeacherClasses($teacherId);
        $hasAccess = false;
        foreach ($teacherSprints as $ts) {
            if ($ts->id == $sprintId) {
                $hasAccess = true;
                break;
            }
        }

        if (!$hasAccess) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $this->view('teacher.briefs.create', ['sprint' => $sprint]);
    }

    public function store()
    {
        $this->checkAuth('teacher');

        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'duration_days' => $_POST['duration_days'] ?? null,
            'type' => $_POST['type'] ?? null,
            'sprint_id' => $_POST['sprint_id'] ?? null
        ];

        if (empty($data['title']) || empty($data['sprint_id'])) {
            $this->redirect('/teacher/dashboard');
            return;
        }
        $teacherId = $_SESSION['user_id'];
        $teacherSprints = $this->service->getSprintsForTeacherClasses($teacherId);
        $hasAccess = false;
        foreach ($teacherSprints as $ts) {
            if ($ts->id == $data['sprint_id']) {
                $hasAccess = true;
                break;
            }
        }

        if (!$hasAccess) {
            $this->redirect('/teacher/dashboard');
            return;
        }

        $this->service->createBrief($data);
        $this->redirect('/teacher/dashboard');
    }
}
