<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Request.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/ActionLogic.php';

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