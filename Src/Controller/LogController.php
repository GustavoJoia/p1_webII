<?php
namespace App\Server\Controller;
use App\Server\Repository\LogRepository;
use App\Server\Model\Log;
use App\Server\Model\Produto;

class LogController{

    public static function getLogs(){

        $logs = LogRepository::get();

        if($logs==false){
            return ['status'=>false,'mensagem'=>'Não há registros de operações no Banco de Dados'];
        }

        return $logs;

    }

}