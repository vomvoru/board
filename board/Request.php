<?php
namespace App;

//TODO Route maping
class Request{
    public static $DATA = FALSE;

    public static function get($name){
        if(Request::$DATA === FALSE){
            Request::initDATA();
        }

        return Request::$DATA[$name];
    }

    public static function initDATA(){
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method === 'GET'){
            Request::$DATA = $_GET;
        }
        else if($method === 'POST'){
            Request::$DATA = $_POST;
        }
        else if($method === 'PUT'){
            Request::$DATA = $_POST;
        }
        else if($method === 'DELETE'){
            Request::$DATA = $_POST;
        }
    }
}