<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements RepositoryInterface
{


    public function find($id)
    {
        return User::find($id);
    }
    
    public function findByEmail($email) 
    {
        return User::findByEmail($email);
    }


    
    public function all()
    {
        return User::fetchAll("SELECT users.*, classes.name as class_name FROM users LEFT JOIN classes ON users.class_id = classes.id ORDER BY users.role, users.name", [], User::class);
    }

    public function create(array $data)
    {
        $db = \App\Core\Database::getInstance();
        $sql = "INSERT INTO users (name, email, password, role, class_id) VALUES (:name, :email, :password, :role, :class_id)";
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
            'class_id' => !empty($data['class_id']) ? $data['class_id'] : null
        ]);
    }

    public function update($id, array $data)
    {
        $db = \App\Core\Database::getInstance();
        // Dynamic update query would be better, but fixed for now
        $sql = "UPDATE users SET name = :name, email = :email, role = :role, class_id = :class_id";
        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'class_id' => !empty($data['class_id']) ? $data['class_id'] : null,
            'id' => $id
        ];

        if (isset($data['password'])) {
            $sql .= ", password = :password";
            $params['password'] = $data['password'];
        }
        
        $sql .= " WHERE id = :id";
        
        $stmt = $db->getConnection()->prepare($sql);
        return $stmt->execute($params);
    }

    public function getByClass($classId, $role = 'learner')
    {
        // Mock query for now inside Model or here
        // Ideally Model::where(...)
        return User::fetchAll("SELECT * FROM users WHERE class_id = :cid AND role = :role", ['cid' => $classId, 'role' => $role], User::class);
    }
}

