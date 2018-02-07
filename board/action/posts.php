<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';

//TODO 설정파일에서 무슨 DB를 쓸것인지 설정 가능하게
$db = App\Model\MySQL::getInstance();
$db->connect();
$posts = $db->readPosts();

$result = array('error' => FALSE, 'data' => $posts);
echo json_encode($result);
?>