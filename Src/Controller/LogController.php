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

        $array_logs = [];
        foreach ($logs as $key => $log) {
            $obj_log = new Log();
            $obj_log->setId($log['idLog']);
            $obj_log->setAcao($log['acaoLog']);
            $obj_log->setDataHora($log['data_hora']);
            $obj_log->setUserInsert($log['userInsert']);
            $obj_prod = new Produto();
            $obj_prod->setId($log['idProduto']);
            $obj_log->setProduto($obj_prod);

            array_push($array_logs, $obj_log);
        }

        return $array_logs;

    }

}

LogController::getLogs();