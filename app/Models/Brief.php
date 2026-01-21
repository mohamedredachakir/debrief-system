<?php

namespace App\Models;

class Brief extends Model
{
    protected $table = 'briefs';
    
    public int $id;
    public string $title;
    public ?string $description;
    public ?int $duration_days;
    public ?string $type;
    public int $sprint_id;

    public function __construct(
        int $id = 0,
        string $title = '',
        ?string $description = null,
        ?int $duration_days = null,
        ?string $type = null,
        int $sprint_id = 0
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->duration_days = $duration_days;
        $this->type = $type;
        $this->sprint_id = $sprint_id;
    }

    public static function getBySprint($sprintId)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            $b1 = new self(); $b1->id=1; $b1->title='Landing Page'; $b1->description='Create a landing page'; $b1->duration_days=2; $b1->type='individuel'; $b1->sprint_id=$sprintId;
            $b2 = new self(); $b2->id=2; $b2->title='Portfolio'; $b2->description='Create personal portfolio'; $b2->duration_days=3; $b2->type='collectif'; $b2->sprint_id=$sprintId;
            return [$b1, $b2];
        }
        return self::fetchAll("SELECT * FROM briefs WHERE sprint_id = :sid", ['sid' => $sprintId], self::class);
    }
}
