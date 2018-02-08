<?php namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';

include_once $_SERVER["DOCUMENT_ROOT"].\App\path\MODEL.'/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Request.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/ActionLogic.php';

use App\Model\MySQL;

class PostsREST extends REST{
    public function get(){
        $db = MySQL::getInstance();
        $db->connect();

        $posts = $db->readPosts();

        $db->close();
        
        Response::sendJSON($posts);
    }
    
    public function post(){
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

ActionLogic::run(new PostsREST());
?>