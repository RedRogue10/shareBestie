o<?php
    include 'dbConnect.php';

    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $result = $conn->query($sql)->fetch_assoc();
    $userID = $_POST['userID'];

    foreach($_POST['courses'] as $course){
        //insert each course with the TutorID and CourseID
        $sql = "INSERT INTO teaches(TutorID,CourseID) VALUES('$userID','$course')";
        $conn->query($sql);
    }

    //prepare and execute the SQL query to update the user
    $sql = "UPDATE user 
            SET isTutor = 'true'
            WHERE UserID = '$userID'";
    $conn->query($sql);

    //redirect
    header("Location:tutorAdd.php");
?>
