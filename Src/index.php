<?php
namespace App\Server;
use App\Server\Controller\LogController;
include_once(__DIR__.'/../vendor/autoload.php');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri_splited = explode('/',$uri);

$request_data = [
    'service'=> $uri_splited[1],
    'id'=> $uri_splited[2]
];

switch ($method) {
    case 'GET':

        switch ($request_data['service']) {
            case 'produtos':
                # code...
                break;
            
            case 'logs':
                $logs = LogController::getLogs();
                echo json_encode($logs);
                break;
        }
        
        break;
    
    default:
        # code...
        break;
}