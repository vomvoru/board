<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Output.php';

use App\Model\MySQL;

class PostsREST extends REST{
    public function get(){
        $db = MySQL::getInstance();
        $db->connect();

        $posts = $db->readPosts();

        $db->close();
        
        Output::JSON($posts);
    }
    
    public function post(){
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

$postsREST = new PostsREST();
$postsREST->run();
?>