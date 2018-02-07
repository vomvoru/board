<?php
namespace App;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/REST.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Output.php';
//TODO Input 개발

use App\Model\MySQL;

class PostREST extends REST{
    public function get(){
        //TODO $id = INPUT::get('id')
        //TODO route 설정이 필요.
        $id = $_GET['id'];
        
        //TODO 클라이언트 입력값 필터링
        
        $db = MySQL::getInstance();
        //TODO connect, close 메서드 중복이 너무 많다. 한꺼번에 없애야됨.
        $db->connect();

        $post = $db->readPost($id);

        $db->close();

        Output::JSON($post);
    }
    
    public function post(){
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        $db = MySQL::getInstance();
        $db->connect();
        
        $db->createPost($title, $content);

        $db->close();
        
        Output::JSON();
    }
    
    public function put(){
        
    }
    
    public function delete(){
        
    }
}

$postRest = new PostREST();
$postRest->run();
?>