<?php

namespace App\Repositories;

use App\Models\Brief;

class BriefRepository implements RepositoryInterface
{
    public function all() { return []; }
    
    public function find($id) 
    {
        // Add specific find method to Model or query here
        return Brief::query("SELECT * FROM briefs WHERE id = :id", ['id' => $id], Brief::class);
    }

    public function getBySprint($sprintId)
    {
        return Brief::getBySprint($sprintId);
    }

    public function create(array $data)
    {
        // Brief::create($data)
    }
}
