<?php

include 'DBConnect.php';
session_start();
$userid = $_SESSION['userID'];
$date = date ('Y-m-d H:i:s', time());
$title = $_POST['title'];
$content  = $_POST['content'];

$sql = ""
?>