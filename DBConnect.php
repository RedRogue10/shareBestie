<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shareBestie";

$sql = "IF NOT EXISTS(SELECT name FROM sys.databases WHERE name = 'database_name')
        BEGIN
            CREATE DATABASE $dbname;
        END";

$conn = new mysqli($servername,$username,$password);

if($conn->query($sql)==TRUE){
    include 'tables.php';
    $conn->close();
    echo "Database Created";
}else{
    $conn = new mysqli($servername, $username, $password, $dbname);
}
