<?php

namespace App\Repositories;

use App\Models\ClassModel;

class ClassRepository implements RepositoryInterface
{
    public function all()
    {
        return ClassModel::all();
    }

    public function find($id)
    {
        return ClassModel::query("SELECT * FROM classes WHERE id = :id", ['id' => $id], ClassModel::class);
    }

    public function create(array $data)
    {
        return ClassModel::create($data);
    }

    public function update($id, array $data)
    {
        // Add update method to Model or query directly
        $sql = "UPDATE classes SET name = :name WHERE id = :id";
        $db = \App\Core\Database::getInstance();
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute(['name' => $data['name'], 'id' => $id]);
    }
}

