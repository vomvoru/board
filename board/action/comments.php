<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Output.php';

use App\Model\MySQL;

class CommentsREST extends REST{
    public function get(){
        $relatedPostID = $_GET['relatedPostID'];
        
        $db = MySQL::getInstance();
        $db->connect();

        $comments = $db->readComments($relatedPostID);

        $db->close();
        
        Output::JSON($comments);
    }
    
    public function post(){
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

$commentsREST = new CommentsREST();
$commentsREST->run();
?>