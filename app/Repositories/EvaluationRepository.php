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

}
