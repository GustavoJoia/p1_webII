<?php
namespace App\Server\Controller;
use App\Server\Model\Produto;
use App\Server\Model\Log;
use App\Server\Repository\ProdutoRepository;
use App\Server\Repository\LogRepository;

class ProdutoController {

    public static function get(null|Produto $p){
        if($p){
            $produto = ProdutoRepository::getById($p);
            if($produto==false){
                return ['status'=>false,'mensagem'=>'Não há nenhum produto registrado nesse ID'];
            }
            $prod = new Produto();
            foreach ($produto as $key => $produto) {
                $prod->setId($produto['idProduto']);
                $prod->setNome($produto['nomeProduto']);
                $prod->setDesc($produto['descProduto']);
                $prod->setPreco($produto['precoProduto']);
                $prod->setEstoque($produto['estoqueProduto']);
                $prod->setUserInsert($produto['userInsert']);
                $prod->setDataHora($produto['data_hora']);
            }
            return $prod;
        }

        $produtos = ProdutoRepository::getAll();
        if($produtos==false){
            return ['status'=>false,'mensagem'=>'Não há nenhum produto registrado'];
        }
        $array_produtos = [];
        var_dump($produtos);
        foreach ($produtos as $key => $produto) {
            $prod = new Produto();
            $prod->setId($produto['idProduto']);
            $prod->setNome($produto['nomeProduto']);
            $prod->setDesc($produto['descProduto']);
            $prod->setPreco($produto['precoProduto']);
            $prod->setEstoque($produto['estoqueProduto']);
            $prod->setUserInsert($produto['userInsert']);
            $prod->setDataHora($produto['data_hora']);
            array_push($array_produtos, $prod);
        }
        return $array_produtos;
    }

    public static function post(Produto $p){
        
        if(strlen($p->getNome())<3){
            return ['status'=>false,'mensagem'=>'Nome do produto muito curto'];
        }
        if($p->getPreco()<0){
            return ['status'=>false,'mensagem'=>'Preço do produto negativo'];
        }
        if($p->getEstoque()<0){
            return ['status'=>false,'mensagem'=>'Número em estoque nulo ou negativo'];
        }

        $response = ProdutoRepository::post($p);
        if(is_int($response)){
            $p->setId($response);
            $log = new Log();
            $log->setAcao('Criação');
            $log->setUserInsert($p->getUserInsert());
            $log->setProduto($p);
            LogRepository::register($log);
        }

    }

    public static function put(Produto $p){
        
        if(strlen($p->getNome())<3){
            return ['status'=>false,'mensagem'=>'Nome do produto muito curto'];
        }
        if($p->getPreco()<0){
            return ['status'=>false,'mensagem'=>'Preço do produto negativo'];
        }
        if($p->getEstoque()<0){
            return ['status'=>false,'mensagem'=>'Número em estoque nulo ou negativo'];
        }

        $response = ProdutoRepository::put($p);
        if(is_int($response)){
            $p->setId($response);
            $log = new Log();
            $log->setAcao('Atualização');
            $log->setUserInsert($p->getUserInsert());
            $log->setProduto($p);
            LogRepository::register($log);
        }

    }

    public static function delete(Produto $p){

        $response = ProdutoRepository::delete($p);
        if(is_int($response)){
            $p->setId($response);
            $log = new Log();
            $log->setAcao('Exclusão');
            $log->setUserInsert($p->getUserInsert());
            $log->setProduto($p);
            LogRepository::register($log);
        }

    }

}