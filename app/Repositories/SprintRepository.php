<?php

namespace App\Repositories;

use App\Models\Sprint;

class SprintRepository implements RepositoryInterface
{
    public function all() { return []; }
    public function getByClass($classId)
    {
        return Sprint::fetchAll(
            "SELECT s.* FROM sprints s 
            JOIN class_sprint cs ON s.id = cs.sprint_id 
            WHERE cs.class_id = :cid ORDER BY s.start_date ASC", 
            ['cid' => $classId], 
            Sprint::class
        );
    }

    public function find($id)
    {
        return Sprint::query("SELECT * FROM sprints WHERE id = :id", ['id' => $id], Sprint::class);
    }

    public function create(array $data)
    {
        $db = \App\Core\Database::getInstance();
        $conn = $db->getConnection();

        try {
            $conn->beginTransaction();

            $sql = "INSERT INTO sprints (name, start_date, duration) VALUES (:name, :start_date, :duration)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'name' => $data['name'],
                'start_date' => $data['start_date'],
                'duration' => $data['duration']
            ]);
            $sprintId = $conn->lastInsertId();

            if (!empty($data['class_ids'])) {
                $sqlClass = "INSERT INTO class_sprint (class_id, sprint_id) VALUES (:cid, :sid)";
                $stmtClass = $conn->prepare($sqlClass);
                foreach ($data['class_ids'] as $classId) {
                    $stmtClass->execute(['cid' => $classId, 'sid' => $sprintId]);
                }
            }

            if (!empty($data['competence_ids'])) {
                $sqlComp = "INSERT INTO sprint_competences (sprint_id, competence_id) VALUES (:sid, :compid)";
                $stmtComp = $conn->prepare($sqlComp);
                foreach ($data['competence_ids'] as $compId) {
                    $stmtComp->execute(['sid' => $sprintId, 'compid' => $compId]);
                }
            }

            $conn->commit();
            return true;
        } catch (\Exception $e) {
            $conn->rollBack();
            return false;
        }
    }

    public function update($id, array $data)
    {
        $db = \App\Core\Database::getInstance();
        $conn = $db->getConnection();

        try {
            $conn->beginTransaction();

            $sql = "UPDATE sprints SET name = :name, start_date = :start_date, duration = :duration WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'name' => $data['name'],
                'start_date' => $data['start_date'],
                'duration' => $data['duration'],
                'id' => $id
            ]);

            $conn->prepare("DELETE FROM class_sprint WHERE sprint_id = ?")->execute([$id]);
            if (!empty($data['class_ids'])) {
                $sqlClass = "INSERT INTO class_sprint (class_id, sprint_id) VALUES (:cid, :sid)";
                $stmtClass = $conn->prepare($sqlClass);
                foreach ($data['class_ids'] as $classId) {
                    $stmtClass->execute(['cid' => $classId, 'sid' => $id]);
                }
            }

            $conn->prepare("DELETE FROM sprint_competences WHERE sprint_id = ?")->execute([$id]);
            if (!empty($data['competence_ids'])) {
                $sqlComp = "INSERT INTO sprint_competences (sprint_id, competence_id) VALUES (:sid, :compid)";
                $stmtComp = $conn->prepare($sqlComp);
                foreach ($data['competence_ids'] as $compId) {
                    $stmtComp->execute(['sid' => $id, 'compid' => $compId]);
                }
            }

            $conn->commit();
            return true;
        } catch (\Exception $e) {
            $conn->rollBack();
            return false;
        }
    }

    public function getClassesForSprint($sprintId) {
        $db = \App\Core\Database::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT class_id FROM class_sprint WHERE sprint_id = ?");
        $stmt->execute([$sprintId]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function getCompetencesForSprint($sprintId) {
        $db = \App\Core\Database::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT competence_id FROM sprint_competences WHERE sprint_id = ?");
        $stmt->execute([$sprintId]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

}
