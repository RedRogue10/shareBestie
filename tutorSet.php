<?php
    include 'dbConnect.php';
    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $result = $conn->query($sql)->fetch_assoc();
    $userID = $_POST['userID'];
    foreach($_POST['courses'] as $course){
        $sql = "INSERT INTO teaches (TutorID,CourseID) VALUES($userID,$course)";
        $conn->query($sql);
    }
    $sql = "UPDATE user 
            SET isTutor = 'true'
            WHERE UserID = '$userID'";
    $conn->query($sql);



?>