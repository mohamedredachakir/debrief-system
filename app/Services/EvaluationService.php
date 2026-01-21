<?php

namespace App\Services;

use App\Repositories\EvaluationRepository;

class EvaluationService
{
    private $evalRepo;

    public function __construct()
    {
        $this->evalRepo = new EvaluationRepository();
    }

    public function submitEvaluation($data)
    {
        // Could wrap in transaction or loop here if not already handled
        return $this->evalRepo->create($data);
    }
}

