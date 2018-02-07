<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';

$relatedPostID = $_GET['relatedPostID'];

$db = App\Model\MySQL::getInstance();
$db->connect();
$comments = $db->readComments($relatedPostID);

//TODO 출력 형식이 중복되어있다.(정해져있다)
$result = array('error' => FALSE, 'data' => $comments);
echo json_encode($result);
?>