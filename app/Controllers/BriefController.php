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
        $this->service = new StructureService();
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
}

