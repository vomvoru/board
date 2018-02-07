<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';

$content = $_POST['content'];
$relatedPostID = $_POST['relatedPostID'];

$db = App\Model\MySQL::getInstance();
$db->connect();
$db->createComment($content, $relatedPostID);

$result = array('error' => FALSE);
echo json_encode($result);
?>