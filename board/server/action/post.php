<?php namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';

include_once $_SERVER["DOCUMENT_ROOT"].\App\path\MODEL.'/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Request.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/ActionLogic.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\EXCEPTION.'/ClientException.php';

use App\Model\MySQL;

use Exception;
use App\Exception\ClientException;

class PostREST extends REST{
    public function get(){
        $id = Request::get('id');
        
        //TODO 클라이언트 입력값 필터링
        
        $db = MySQL::getInstance();
        //TODO connect, close 메서드 중복이 너무 많다. 한꺼번에 없애야됨.
        $db->connect();

        $post = $db->readPost($id);

        $db->close();

        Response::sendJSON($post);
    }
    
    public function post(){
        $title = Request::get('title');
        $content = Request::get('content');
        
        $db = MySQL::getInstance();
        $db->connect();
        
        $db->createPost($title, $content);

        $db->close();
        
        Response::sendJSON();
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

ActionLogic::run(new PostREST());
?>