<?php
$relatedPostID = $_GET['relatedPostID'];

$mysqli = new mysqli('127.0.0.1:3306', 'pch', '1q2w3e4r%', 'board');

if ($mysqli->connect_errno) {
    $result = array('error' => TRUE, 'message' => '디비 접속 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$queryResult = $mysqli->query('SELECT Content FROM Comment WHERE RelatedPostID='.$relatedPostID);

if($queryResult === FALSE){
    $result = array('error' => TRUE, 'message' => '쿼리 에러');
    echo json_encode($result);

    $mysqli->close();
    exit();
}

$data = array();
while ($row = $queryResult->fetch_assoc()) {
    array_push($data, array('content' => $row['Content']));
}

$result = array('error' => FALSE, 'data' => $data);
echo json_encode($result);

$mysqli->close();
?>