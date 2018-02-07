<?php
$title = $_POST['title'];
$content = $_POST['content'];

include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';

$db = App\Model\MySQL::getInstance();
$db->connect();

$db->createPost($title, $content);

$result = array('error' => FALSE);
echo json_encode($result);
?>