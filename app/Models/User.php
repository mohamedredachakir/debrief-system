<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User extends Model
{
    protected $table = 'users';

    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public string $role;
    public ?int $class_id = null;
    public ?string $class_name = null; // For joins

    public function __construct(
        int $id = 0,
        string $name = '',
        string $email = '',
        string $password = '',
        string $role = '',
        ?int $class_id = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->class_id = $class_id;
    }

    public static function findByEmail($email)
    {
        return self::query("SELECT * FROM users WHERE email = :email LIMIT 1", ['email' => $email], self::class);
    }

    public static function find($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(self::class);
    }

    public static function create($data)
    {
        $db = Database::getInstance()->getConnection();
        $sql = "INSERT INTO users (name, email, password, role, class_id) VALUES (:name, :email, :password, :role, :class_id)";
        $stmt = $db->prepare($sql);
        
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
            'class_id' => $data['class_id'] ?? null
        ]);

        return $db->lastInsertId();
    }
}

