<?php
namespace App\Server;
use App\Server\Controller\LogController;
use App\Server\Controller\ProdutoController;
use App\Server\Model\Produto;
include_once(__DIR__.'/../vendor/autoload.php');

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
                if(is_int($request_data['id'])){
                    $produto = new Produto();
                    $produto->setId($request_data['id']);
                    $response = ProdutoController::get($p);
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

        switch ($request_data['service']) {
            case 'produtos':
                if(is_int($request_data['id'])){
                    $produto = new Produto();
                    $produto->setId($request_data['id']);
                    $response = ProdutoController::get($p);
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
}