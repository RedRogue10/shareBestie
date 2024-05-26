<?php
    include 'DBconnect.php';

    // $sql = "CREATE TABLE coursePage(
    //     CourseID VARCHAR(10),
    //     Description TEXT,
    //     Prereq VARCHAR(10),
    //     PRIMARY KEY (Course ID),
    //     FOREIGN KEY (Prereq) REFERENCES course(CourseID)
    // )";

    $sql = "CREATE TABLE user(
        UserID INT AUTO_INCREMENT,
        Username VARCHAR(16) NOT NULL,
        FName VARCHAR(40),
        LName VARCHAR(40),
        Email VARCHAR(40) Unique,
        Password VARCHAR(40),
        PRIMARY KEY (UserID)
    )";
    $sql = "CREATE TABLE tutor(
        TutorID INT AUTO_INCREMENT,
        UserID INT AUTO_INCREMENT,
    )";

    $sql = "CREATE TABLE teaches(
        TutorID INT,
        
    )";

    $conn->query($sql);
    $conn()->close();

    // $sql = "CREATE TABLE postUnder(
    //     PostID INT AUTO_INCREMENT,
    //     Title VARCHAR,
    //     Content TEXT,
    //     PostDate DATETIME,
    //     CourseID VARCHAR(10),
    //     UserID INT,
    //     FOREIGN KEY (CourseID) REFERENCES coursePage(CourseID),
    //     FOREIGN KEY (UserID) REFERENCES user(UserID),
    //     PRIMARY KEY (PostID)
    // )";

    // $sql = "CREATE TABLE comments(
    //     CommentID INT AUTO_INCREMENT,
    //     UserID INT,
    //     PostID INT,
    //     Content TEXT,
    //     CommentDate DATETIME,
    // )";

    // $sql = "CREATE TABLE replies(
    //     CommentID INT,
    //     ReplyID INT,
    //     FOREIGN KEY (CommentID)  REFERENCES
    // )"

