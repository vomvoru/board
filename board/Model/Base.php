<?php
namespace App\Model;

include_once $_SERVER["DOCUMENT_ROOT"].'/board/DesginPattern/Singleton.php';

abstract class Base extends \App\DesginPattern\Singleton {
    abstract public function createPost($title, $content);
    abstract public function readPost($id);
    abstract public function updatePost();
    abstract public function deletePost();

    abstract public function readPosts();

    //TODO 분리 필요
    abstract public function createComment($content, $relatedPostID);
    abstract public function readComment($id);
    abstract public function updateComment();
    abstract public function deleteComment();

    abstract public function readComments($relatedPostID);
}
?>