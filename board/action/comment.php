<?php
$content = $_POST['content'];
$relatedPostID = $_POST['relatedPostID'];

$mysqli = new mysqli('127.0.0.1:3306', 'pch', '1q2w3e4r%', 'board');

if ($mysqli->connect_errno) {
    $result = array('error' => TRUE, 'message' => '디비 접속 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$queryResult = $mysqli->query('INSERT INTO Comment VALUES (null, "'.$content.'", '.$relatedPostID.');');

if($queryResult === FALSE){
    $result = array('error' => TRUE, 'message' => '쿼리 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$result = array('error' => FALSE);
echo json_encode($result);

$mysqli->close();
?>