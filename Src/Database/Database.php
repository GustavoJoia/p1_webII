<?php
namespace App\Server\Database;

use PDO;
use PDOException;

class Database {

    public static function connect() {

        $path = 'produtos_p1.sqlite';

        try {
            $pdo = new PDO("sqlite:$path");
            return $pdo;
        } catch (PDOException $e) {
            echo $e;
        }

    }

}