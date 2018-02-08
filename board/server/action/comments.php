<?php namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';

include_once $_SERVER["DOCUMENT_ROOT"].\App\path\MODEL.'/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Response.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/Request.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/ActionLogic.php';

use App\Model\MySQL;
use App\Exception\ClientException;

class CommentsREST extends REST{
    public function get(){
        $relatedPostID = Request::get('relatedPostID');
        
        $db = MySQL::getInstance();
        $db->connect();

        $comments = $db->readComments($relatedPostID);

        $db->close();
        
        Response::sendJSON($comments);
    }
    
    public function post(){
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

ActionLogic::run(new CommentsREST());
?>