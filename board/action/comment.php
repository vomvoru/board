<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Response.php';

use App\Model\MySQL;

class CommentREST extends REST{
    public function get(){
        
    }
    
    public function post(){
        $content = $_POST['content'];
        $relatedPostID = $_POST['relatedPostID'];

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

$commentREST = new CommentREST();
$commentREST->run();
?>