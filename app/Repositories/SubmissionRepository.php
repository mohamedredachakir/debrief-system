<?php

namespace App\Repositories;

use App\Models\Submission;

class SubmissionRepository implements RepositoryInterface
{
    public function all() { return []; }

    public function find($id)
    {
        return Submission::query("SELECT * FROM submissions WHERE id = :id", ['id' => $id], Submission::class);
    }

    public function getByBriefAndLearner($briefId, $learnerId)
    {
        return Submission::getByBriefAndLearner($briefId, $learnerId);
    }

    public function create(array $data)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            return new \stdClass();
        }
        $sql = "INSERT INTO submissions (learner_id, brief_id, project_link, comments, submitted_at) VALUES (:learner_id, :brief_id, :project_link, :comments, NOW()) RETURNING id";
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute([
            'learner_id' => $data['learner_id'],
            'brief_id' => $data['brief_id'],
            'project_link' => $data['project_link'] ?? null,
            'comments' => $data['comments'] ?? null
        ]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function update($id, array $data)
    {
        $db = \App\Core\Database::getInstance();
        $sql = "UPDATE submissions SET project_link = :project_link, comments = :comments WHERE id = :id";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute([
            'project_link' => $data['project_link'] ?? null,
            'comments' => $data['comments'] ?? null,
            'id' => $id
        ]);
    }
}
