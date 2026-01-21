<?php

namespace App\Models;

class ClassModel extends Model
{
    protected $table = 'classes';
    
    public int $id;
    public string $name;
    public ?string $created_at = null;

    public function __construct(int $id = 0, string $name = '')
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function all()
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            // Return some mock classes
            $c1 = new self(); $c1->id=1; $c1->name='Dev Web A'; $c1->created_at=date('Y-m-d');
            $c2 = new self(); $c2->id=2; $c2->name='Dev Data B'; $c2->created_at=date('Y-m-d');
            return [$c1, $c2];
        }
        return self::fetchAll("SELECT * FROM classes ORDER BY created_at DESC", [], self::class);
    }

    public static function create($data)
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) { return true; }
        
        $sql = "INSERT INTO classes (name) VALUES (:name)";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute(['name' => $data['name']]);
    }
}
