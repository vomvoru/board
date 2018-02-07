<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/board/Model/MySQL.php';

$id = $_GET['id'];

//TODO 클라이언트 입력값 필터링

$db = App\Model\MySQL::getInstance();
$db->connect();
$data = $db->readPost($id);

$result = array('error' => FALSE, 'data' => $data);
echo json_encode($result);
?>