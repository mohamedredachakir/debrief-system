<?php

namespace App\Repositories;

use App\Models\Competence;

class CompetenceRepository implements RepositoryInterface
{
    public function all()
    {
        return Competence::all();
    }

    public function find($id)
    {
        return Competence::query("SELECT * FROM competences WHERE id = :id", ['id' => $id], Competence::class);
    }

    public function create(array $data)
    {
        $db = \App\Core\Database::getInstance();
        $sql = "INSERT INTO competences (code, label) VALUES (:code, :label)";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute([
            'code' => $data['code'],
            'label' => $data['label']
        ]);
    }

    public function update($id, array $data)
    {
        $db = \App\Core\Database::getInstance();
        $sql = "UPDATE competences SET code = :code, label = :label WHERE id = :id";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute([
            'code' => $data['code'],
            'label' => $data['label'],
            'id' => $id
        ]);
    }
}
