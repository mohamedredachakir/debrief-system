<?php

namespace App\Repositories;

use App\Models\Brief;
use PDO;

class BriefRepository implements RepositoryInterface
{
    public function all() { return []; }

    public function find($id) 
    {

        return Brief::query("SELECT * FROM briefs WHERE id = :id", ['id' => $id], Brief::class);
    }

    public function getBySprint($sprintId)
    {
        return Brief::getBySprint($sprintId);
    }

    public function create(array $data)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            return new \stdClass(); // Mock object
        }
        $sql = "INSERT INTO briefs (title, description, duration_days, type, sprint_id, created_at) VALUES (:title, :description, :duration_days, :type, :sprint_id, NOW()) RETURNING id";
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'duration_days' => $data['duration_days'] ?? null,
            'type' => $data['type'] ?? null,
            'sprint_id' => $data['sprint_id']
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
}
