<?php
namespace App;

class Response{
    public static function sendJSON($data = array(), $error = FALSE, $message = ''){
        $result = array('data' => $data,'error' => $error, 'message' => $message);
        echo json_encode($result);
    }
}