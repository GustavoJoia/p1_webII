<?php
namespace App\Server;
use App\Server\Controller\LogController;
use App\Server\Controller\ProdutoController;
use App\Server\Model\Produto;
include_once(__DIR__.'/../vendor/autoload.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: *");

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri_splited = explode('/',$uri);

if(count($uri_splited)==3){
    $request_data = [
        "service"=>$uri_splited[1],
        "id"=>$uri_splited[2]
    ];
} else {
    $request_data = [
        "service"=>$uri_splited[1]
    ];
}

switch ($method) {
    case 'GET':

        switch ($request_data['service']) {
            case 'produtos':
                if(isset($request_data['id'])){
                    $produto = new Produto();
                    $produto->setId($request_data['id']);
                    $response = ProdutoController::get($produto);
                    echo json_encode($response);
                    break;
                }
                $response = ProdutoController::get(null);
                echo json_encode($response);
                break;
            
            case 'logs':
                $logs = LogController::getLogs();
                echo json_encode($logs);
                break;
        }
        
        break;
    
    case 'POST':

        $data = json_decode(file_get_contents('php://input'));
        $produto = new Produto();
        $produto->setNome($data->nomeProduto);
        $produto->setDesc($data->descProduto);
        $produto->setEstoque($data->estoqueProduto);
        $produto->setPreco($data->precoProduto);
        $produto->setUserInsert(1);
        $response = ProdutoController::post($produto);
        echo json_encode($response);

        break;

    case 'PUT':

        $data = json_decode(file_get_contents('php://input'));
        $produto = new Produto();
        $produto->setId($request_data['id']);
        $produto->setNome($data->nomeProduto);
        $produto->setDesc($data->descProduto);
        $produto->setEstoque($data->estoqueProduto);
        $produto->setPreco($data->precoProduto);
        $produto->setUserInsert(1);
        $response = ProdutoController::put($produto);
        echo json_encode($response);

        break;

    case 'DELETE':

        $data = json_decode(file_get_contents('php://input'));
        $produto = new Produto();
        $produto->setId($request_data['id']);
        $produto->setUserInsert(1);
        $response = ProdutoController::delete($produto);
        echo json_encode($response);

        break;
}