<?php
$mysqli = mysqli_connect('127.0.0.1:3306', 'pch', '1q2w3e4r%', 'board');
$res = mysqli_query($mysqli, "SELECT 'Please, do not use ' AS _msg FROM DUAL");
$row = mysqli_fetch_assoc($res);
echo $row['_msg'];
?>