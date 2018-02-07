<?php
$id = $_GET['id'];

//TODO 클라이언트 입력값 필터링

$mysqli = new mysqli('127.0.0.1:3306', 'pch', '1q2w3e4r%', 'board');

if ($mysqli->connect_errno) {
    $result = array('error' => TRUE, 'message' => '디비 접속 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$queryResult = $mysqli->query('SELECT Title, Content FROM Post WHERE ID='.$id);

if($queryResult === FALSE){
    $result = array('error' => TRUE, 'message' => '쿼리 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$row = $queryResult->fetch_assoc();

if($row === FALSE){
    $result = array('error' => TRUE, 'message' => '쿼리 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$data = array('title' => $row['Title'], 'content' => $row['Content']);

$result = array('error' => FALSE, 'data' => $data);
echo json_encode($result);

$mysqli->close();
?>