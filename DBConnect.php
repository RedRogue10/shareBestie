<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shareBestie";


// $conn = new mysqli($servername,$username,$password);
// $sql = "CREATE DATABASE $dbname";

// if($conn->query($sql) === TRUE){
//     echo "Database created successfully";
//     $conn->close();
//     include 'tables.php';
//     echo "Tables Created";
// } else{
$conn = new mysqli($servername, $username, $password, $dbname);