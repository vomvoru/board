<?php
namespace App\Model;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/Base.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Exception/ClientException.php';

use Exception;
use Mysqli;

//App\Exception\ClientException
class MySQL extends Base {
    private $mysqli;
    
    //TODO 파일로 추출
    private $host = '127.0.0.1:3306';
    private $username = 'pch';
    private $password = '1q2w3e4r%';
    private $database = 'board';
    
    public function connect(){
        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->mysqli->connect_errno) {
            throw new Exception('db 접속 실패');
        }
    }
    
    public function createPost($title, $content){
        //TODO 대략 이런식으로: $DB->insert(array('Title' => $title, 'Contnet' => $Content));
        // http://docs.sequelizejs.com/ 참고
        $query = 'INSERT INTO Post (Title, Content) VALUES ("'.$title.'", "'.$content.'")';
        $queryResult = $this->runQuery($query);
        
        return true;
    }
    
    public function readPost($id){
        $query = 'SELECT Title, Content FROM Post WHERE ID='.$id;
        $queryResult = $this->runQuery($query);
        
        $row = $queryResult->fetch_assoc();
        
        if($row === FALSE){
            throw new \App\Exception\ClientException('게시물이 없습니다.');
        }
        
        $data = array('title' => $row['Title'], 'content' => $row['Content']);
        
        return $data;
    }
    public function updatePost() {
        //TODO
    }
    public function deletePost() {
        //TODO
    }
    
    public function readPosts() {
        $query = 'SELECT Title, ID FROM Post';
        $queryResult = $this->runQuery($query);
        
        $posts = array();
        while ($row = $queryResult->fetch_assoc()) {
            array_push($posts, array('id' => $row['ID'], 'title' => $row['Title']));
        }
        
        return $posts;
    }
    
    public function createComment($content, $relatedPostID){
        $query = 'INSERT INTO Comment (Content, RelatedPostID) VALUES ("'.$content.'", '.$relatedPostID.')';
        $queryResult = $this->runQuery($query);
        return true;
    }
    
    public function readComment($id){
        //TODO
    }
    public function updateComment(){
        //TODO
    }
    public function deleteComment(){
        //TODO
    }
    
    public function readComments($relatedPostID){
        $query = 'SELECT Content FROM Comment WHERE RelatedPostID='.$relatedPostID;
        $queryResult = $this->runQuery($query);
        
        $comments = array();
        while ($row = $queryResult->fetch_assoc()) {
            array_push($comments, array('content' => $row['Content']));
        }

        return $comments;
    }
    
    private function runQuery($query){
        $queryResult = $this->mysqli->query($query);
        
        if($queryResult === FALSE){
            throw new Exception('쿼리 실패: '.$query);
        }
        
        return $queryResult;
    }
}
?>