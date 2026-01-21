<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;

class CompetenceController extends Controller
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
        $competences = $this->service->getAllCompetences();
        $this->view('admin.competences.index', ['competences' => $competences]);
    }

    public function create()
    {
        $this->view('admin.competences.create');
    }

    public function store()
    {

        if (empty($_POST['code']) || empty($_POST['label'])) {
             $this->view('admin.competences.create', ['error' => 'All fields required']);
             return;
        }
        $this->service->createCompetence($_POST);
        $this->redirect('/admin/competences');
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) { $this->redirect('/admin/competences'); return; }
        $competence = $this->service->getCompetence($id);
        $this->view('admin.competences.edit', ['competence' => $competence]);
    }

    public function update()
    {
        $this->service->updateCompetence($_POST['id'], $_POST);
        $this->redirect('/admin/competences');
    }
}
