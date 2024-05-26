<?php

 
    $uname = $_POST['username'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO user (Username,Fname,LName,Email,Password)
        VALUES ('$uname','$fname','$lname','$email','$password')"; 
    $conn->query($sql);
    
    header("Location: home.php");