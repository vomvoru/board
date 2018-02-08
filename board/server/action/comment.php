<?php namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';

include_once $_SERVER["DOCUMENT_ROOT"].\App\path\MODEL.'/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Request.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/ActionLogic.php';

use App\Model\MySQL;

class CommentREST extends REST{
    public function get(){
        
    }
    
    public function post(){
        $content = Request::get('content');
        $relatedPostID = Request::get('relatedPostID');

        $db = MySQL::getInstance();
        $db->connect();

        $db->createComment($content, $relatedPostID);

        $db->close();
        
        Response::sendJSON();
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

ActionLogic::run(new CommentREST());
?>