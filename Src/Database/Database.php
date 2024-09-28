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

$create1 = 'CREATE TABLE IF NOT EXISTS produtos (
    idProduto INTEGER PRIMARY KEY AUTOINCREMENT,
    nomeProduto VARCHAR(50) NOT NULL,
    descProduto VARCHAR(500) NOT NULL,
    precoProduto FLOAT NOT NULL,
    estoqueProduto INTEGER NOT NULL,
    userInsert INTEGER NOT NULL,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP
);';

$create2 = 'CREATE TABLE IF NOT EXISTS logs (
    idLog INTEGER PRIMARY KEY AUTOINCREMENT,
    acaoLog VARCHAR(20) NOT NULL,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    userInsert INTEGER NOT NULL,
    idProduto INTEGER NOT NULL
);';
$pdo = Database::connect();
$c1 = $pdo->prepare($create1);
$c2 = $pdo->prepare($create2);

$c1->execute();
$c2->execute();