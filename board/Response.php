<?php
namespace App;

class Response{
    public static function _sendJSON($data = array(), $error = FALSE, $message = ''){
        $result = array('data' => $data,'error' => $error, 'message' => $message);
        echo json_encode($result);
    }

    public static function sendJSON($data){
        return Response::_sendJSON($data);
    }

    public static function sendJSONError($message){
        //TODO 기본값을 쓰는 방법: $data 인수 기본값을 중복으로 사용중
        return Response::_sendJSON(array(), TRUE, $message);
    }
}