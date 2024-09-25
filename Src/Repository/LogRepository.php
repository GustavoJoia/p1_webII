<?php
namespace App\Server\Repository;
use App\Server\Database\Database;
use App\Server\Model\Log;
use App\Server\Model\Produto;
use PDO;
use PDOException;

class LogRepository {

    public static function register(Log $l) : bool {
        $pdo = Database::connect();
        $insert = 'INSERT INTO logs(acaoLog,userInsert,idProduto) VALUES(?,?,?)';
        $prepare = $pdo->prepare($insert);
        $prepare->bindValue(1, $l->getAcao());
        $prepare->bindValue(2, $l->getUserInsert());
        $prepare->bindValue(3, $l->getProduto()->getId());
        try {
            $prepare->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function get() : bool|array {
        $pdo = Database::connect();
        $select = 'SELECT * FROM logs';
        $prepare = $pdo->prepare($select);
        try {
            echo 'aqui';
            $prepare->execute();
            $lista = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $e) {
            return false;
            echo 'aqui';
        }
    }

}