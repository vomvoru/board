<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Exception/ClientException.php';

use Exception;
use App\Exception\ClientException;

class ActionLogic {
    public static function run($restInstance){
        try{
            $restInstance->run();
        }catch(ClientException $error){
            Response::sendJSONError($error->getMessage());
            exit();
        }catch(Exception $error){
            //TODO 에러 기록
            //TODO debug 모드 처리
            exit();
        }
    }
}