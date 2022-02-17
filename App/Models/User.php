<?php

namespace App\Models;

use Core\Model;
use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class User extends \Core\Model
{

    public $user_id;
    public $user_name;
    public $password;

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT * FROM users');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}

