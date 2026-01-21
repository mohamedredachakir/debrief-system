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

        return $this->evalRepo->create($data);
    }
}
