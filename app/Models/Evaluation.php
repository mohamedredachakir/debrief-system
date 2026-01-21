<?php

namespace App\Models;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    public int $id;
    public int $learner_id;
    public int $brief_id;
    public int $competence_id;
    public string $level;
    public ?string $comment;

    public function __construct() {}

    public static function create($data)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) { return true; }

        $sql = "INSERT INTO evaluations (learner_id, brief_id, competence_id, level, comment, teacher_id) 
                VALUES (:learner_id, :brief_id, :competence_id, :level, :comment, :teacher_id)";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute([
            'learner_id' => $data['learner_id'],
            'brief_id' => $data['brief_id'],
            'competence_id' => $data['competence_id'],
            'level' => $data['level'],
            'comment' => $data['comment'],
            'teacher_id' => $data['teacher_id']
        ]);
    }
}
