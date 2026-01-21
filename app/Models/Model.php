<?php

namespace App\Models;

use App\Core\Database;
use PDO;

#[\AllowDynamicProperties]
abstract class Model
{

    protected static function getDB() {
        return Database::getInstance();
    }

    public static function query($sql, $params = [], $fetchClass = null) {
        $db = self::getDB();

        if ($db->isMock()) {

            if (strpos($sql, 'SELECT * FROM users') !== false) {
                if ($params['email'] === 'admin@debrief.com') {
                     $obj = new \stdClass();
                     $obj->id = 1;
                     $obj->name = 'Admin Staff'; 
                     $obj->email = 'admin@debrief.com';
                     $obj->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; 
                     $obj->role = 'admin';
                     $obj->class_id = null;
                     return $obj;
                }
            }
            return null;
        }

        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute($params);

        if ($fetchClass) {
            return $stmt->fetchObject($fetchClass);
        }
        return $stmt->fetch();
    }

    public static function fetchAll($sql, $params = [], $fetchClass = null) {
        $db = self::getDB();
        if ($db->isMock()) { return []; } 

        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute($params);
        if ($fetchClass) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }
        return $stmt->fetchAll();
    }
}
