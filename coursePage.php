<!DOCTYPE html>
<?php 
    include 'DBConnect';
    $courseID = $_GET['CourseID'];

    // Query course information
    $sql = "SELECT * FROM course WHERE CourseId = '$courseID'";
    $courseRow = $conn->query($sql)->fetch_assoc();
    
    // Query Posts Under Course
    $sql = "SELECT PostID FROM postUnder WHERE CourseId = '$courseID'";
    $postsUnder = $conn->query($sql);

?>