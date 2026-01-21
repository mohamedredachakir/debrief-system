<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $pdo;
    private $isMock = false;

    private function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';
        $dbConfig = $config['connections'][$config['default']];

        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s',
            $dbConfig['driver'],
            $dbConfig['host'],
            $dbConfig['port'],
            $dbConfig['database']
        );

        try {
            $this->pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Fallback to Mock Mode if DB fails
            $this->isMock = true;
            error_log("Database connection failed, switching to MOCK mode: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function isMock()
    {
        return $this->isMock;
    }
    
    // Simple mock query handler
    public function mockQuery($query, $params = []) {
        // Return dummy data based on query content
        if (strpos($query, 'SELECT * FROM users WHERE email') !== false) {
             // Mock Login
             return (object) [
                 'id' => 1,
                 'name' => 'Admin User',
                 'email' => $params['email'],
                 'password' => password_hash('password', PASSWORD_BCRYPT),
                 'role' => 'admin',
                 'class_id' => null
             ];
        }
        return null;
    }
}
