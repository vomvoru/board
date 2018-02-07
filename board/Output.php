<?php
namespace App;

class Output{
    public static function JSON($data = array(), $error = FALSE, $message = ''){
        $result = array('data' => $data,'error' => $error, 'message' => $message);
        echo json_encode($result);
    }
}