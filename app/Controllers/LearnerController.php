<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;

class LearnerController extends Controller
{
    private $structureService;

    public function __construct()
    {
        parent::__construct();
        $this->structureService = new StructureService();
    }

    public function dashboard()
    {
        // Mock: Get Briefs for the Learner's Class (Sprint 1)
        $briefs = $this->structureService->getBriefsForSprint(1);
        
        $evaluations = []; 
        
        $this->view('learner.dashboard', ['briefs' => $briefs, 'evaluations' => $evaluations]);
    }
}
