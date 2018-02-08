<?php
namespace App\Model;

include_once $_SERVER["DOCUMENT_ROOT"].'/path.php';
include_once $_SERVER["DOCUMENT_ROOT"].\App\path\SERVER.'/DesginPattern/Singleton.php';

use App\DesginPattern\Singleton;

abstract class Base extends Singleton {
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