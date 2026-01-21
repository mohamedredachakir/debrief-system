<?php

namespace App\Repositories;

use App\Models\Evaluation;

class EvaluationRepository implements RepositoryInterface
{
    public function all() { return []; }
    public function find($id) { return null; }

    public function create(array $data)
    {
        return Evaluation::create($data);
    }
    
    // Additional methods for fetching by user/brief if needed
}
