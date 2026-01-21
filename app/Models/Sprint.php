<?php

namespace App\Models;

class Sprint extends Model
{
    protected $table = 'sprints';

    public int $id;
    public string $name;
    public string $start_date;
    public int $duration;

    public function __construct() {}

    public static function getByClass($classId)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            $s1 = new self(); 
            $s1->id=1; 
            $s1->name='Sprint 1: HTML/CSS'; 
            $s1->start_date='2026-01-12'; 
            $s1->duration=5; 
            $s1->class_id=$classId;

            $s2 = new self(); 
            $s2->id=2; 
            $s2->name='Sprint 2: PHP Basics'; 
            $s2->start_date='2026-01-19'; 
            $s2->duration=5; 
            $s2->class_id=$classId;
            return [$s1, $s2];
        }
        return self::fetchAll("SELECT * FROM sprints WHERE class_id = :cid ORDER BY start_date ASC", ['cid' => $classId], self::class);
    }
}
