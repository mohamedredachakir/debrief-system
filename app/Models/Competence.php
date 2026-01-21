<?php

namespace App\Models;

class Competence extends Model
{
    protected $table = 'competences';
    
    public int $id;
    public string $code;
    public string $label;

    public function __construct(int $id = 0, string $code = '', string $label = '')
    {
        $this->id = $id;
        $this->code = $code;
        $this->label = $label;
    }

    public static function all()
    {
        $db = \App\Core\Database::getInstance();
        if ($db->isMock()) {
            $c1 = new self(); $c1->id=1; $c1->code='C1'; $c1->label='Maquetter une application';
            $c2 = new self(); $c2->id=2; $c2->code='C2'; $c2->label='Développer une interface web';
            $c3 = new self(); $c3->id=3; $c3->code='C3'; $c3->label='Développer la partie back-end';
            return [$c1, $c2, $c3];
        }
        return self::fetchAll("SELECT * FROM competences ORDER BY code ASC", [], self::class);
    }
}

