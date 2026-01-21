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
        $this->service = new StructureService();
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
        // Add basic validation
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
