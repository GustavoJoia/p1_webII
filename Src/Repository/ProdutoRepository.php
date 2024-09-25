<?php
namespace App\Server\Repository;
use App\Server\Database\Database;
use App\Server\Model\Produto;
use PDO;
use PDOException;

class ProdutoRepository {

    public static function getAll() : bool|array {
        $pdo = Database::connect();
        $select = 'SELECT * FROM produtos';
        $prepare = $pdo->prepare($select);
        try {
            $prepare->execute();
            $lista = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getById(Produto $p) : bool|array {
        $pdo = Database::connect();
        $select = 'SELECT * FROM produtos WHERE idProduto = ?';
        $prepare = $pdo->prepare($select);
        $prepare->bindValue(1, $p->getId());
        try {
            $prepare->execute();
            $lista = $prepare->fetch(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function post(Produto $p) : bool|int {
        $pdo = Database::connect();
        $insert = 'INSERT INTO produtos(nomeProduto,descProduto,precoProduto,estoqueProduto,userInsert) VALUES (?,?,?,?,?)';
        $prepare = $pdo->prepare($insert);
        $prepare->bindValue(1, $p->getNome());
        $prepare->bindValue(2, $p->getDesc());
        $prepare->bindValue(3, $p->getPreco());
        $prepare->bindValue(4, $p->getEstoque());
        $prepare->bindValue(5, $p->getUserInsert());
        try {
            $prepare->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function put(Produto $p) : bool|int {
        $pdo = Database::connect();
        $update = 'UPDATE produtos SET nomeProduto = ?,descProduto = ?,precoProduto = ?,estoqueProduto = ?,userInsert = ? WHERE idProduto = ?';
        $prepare = $pdo->prepare($update);
        $prepare->bindValue(1, $p->getNome());
        $prepare->bindValue(2, $p->getDesc());
        $prepare->bindValue(3, $p->getPreco());
        $prepare->bindValue(4, $p->getEstoque());
        $prepare->bindValue(5, $p->getUserInsert());
        $prepare->bindValue(6, $p->getId());
        try {
            $prepare->execute();
            return $p->getId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function delete(Produto $p) : bool|int {
        $pdo = Database::connect();
        $update = 'DELETE FROM produtos WHERE idProduto = ?';
        $prepare = $pdo->prepare($update);
        $prepare->bindValue(1, $p->getId());
        try {
            $prepare->execute();
            return $p->getId();
        } catch (PDOException $e) {
            return false;
        }
    }

}