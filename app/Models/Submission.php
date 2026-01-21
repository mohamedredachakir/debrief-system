<?php

namespace App\Models;

class Submission extends Model
{
    protected $table = 'submissions';

    public int $id;
    public int $learner_id;
    public int $brief_id;
    public ?string $project_link;
    public ?string $comments;
    public string $submitted_at;

    public function __construct() {}

    public static function getByBriefAndLearner($briefId, $learnerId)
    {
        return self::query("SELECT * FROM submissions WHERE brief_id = :bid AND learner_id = :lid", ['bid' => $briefId, 'lid' => $learnerId], self::class);
    }
}
