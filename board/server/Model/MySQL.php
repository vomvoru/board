<?php namespace App\Model;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';

include_once $_SERVER["DOCUMENT_ROOT"].\App\path\MODEL.'/Base.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\EXCEPTION.'/ClientException.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\CONFIG.'/DB.conf.php';

use Exception;
use Mysqli;
use App\Exception\ClientException;
use App\config;

class MySQL extends Base {
    private $mysqli;
    
    public function connect(){
        $this->mysqli = new mysqli(config\DB\HOST, config\DB\USERNAME, config\DB\PASSWORD, config\DB\DATABASE);
        
        if ($this->mysqli->connect_errno) {
            throw new Exception('db 접속 실패');
        }
    }

    public function close(){
        $this->mysqli->close();
    }
    
    public function createPost($title, $content) {
        $query = 'INSERT INTO Post (Title, Content) VALUES ("'.$title.'", "'.$content.'")';
        $queryResult = $this->runQuery($query);
        
        return true;
    }
    
    public function readPost($id){
        $query = 'SELECT Title, Content FROM Post WHERE ID='.$id;
        $queryResult = $this->runQuery($query);
        
        $row = $queryResult->fetch_assoc();

        if(count($row) === 0){
            throw new ClientException('게시물이 없습니다.');
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