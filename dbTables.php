<?php
    include 'dbConnect.php';

    //table stores courses, identified by CourseID
    $sql = "CREATE TABLE course(
        CourseID VARCHAR(10),
        Description TEXT,
        PRIMARY KEY (CourseID)
    )";
    $conn->query($sql);

    //table stores user information. 
    //UserID is the primary key and automatically increments
    $sql = "CREATE TABLE user(
        UserID INT AUTO_INCREMENT,
        Username VARCHAR(16) NOT NULL,
        FName VARCHAR(40),
        LName VARCHAR(40),
        Email VARCHAR(40) Unique,
        isTutor BOOLEAN DEFAULT false,
        Password VARCHAR(40),
        PRIMARY KEY (UserID)
    )";
    $conn->query($sql);

    //table stores posts with an auto-incrementing PostID
    $sql = "CREATE TABLE post(
        PostID INT AUTO_INCREMENT,
        Title TEXT,
        PostDate DATETIME,
        Content TEXT,
        PRIMARY KEY (PostID)
    )";
    $conn->query($sql); 

    //table stores comments with an auto-incrementing CommentID
    $sql = "CREATE TABLE comment(
        CommentID INT AUTO_INCREMENT,
        Content TEXT,
        PostDate DATETIME,
        PRIMARY KEY (CommentID)
    )";
    $conn->query($sql);

    //table stores prerequisite relationships between courses
    $sql = "CREATE TABLE prereq(
        CourseID VARCHAR(10),
        PreReqID VARCHAR(10),
        PRIMARY KEY (CourseID, PreReqID),
        FOREIGN KEY (CourseID) REFERENCES course(CourseID),
        FOREIGN KEY (PreReqID) REFERENCES course(CourseID)
    )";
    $conn->query($sql); 

    //table links tutors to users
    $sql = "CREATE TABLE tutors(
        TutorID INT,
        UserID INT,
        FOREIGN KEY (TutorID) REFERENCES user(UserID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (TutorID, UserID)   
    )";
    $conn->query($sql);

    //table associates posts with courses
    $sql = "CREATE TABLE postUnder(
        PostID INT,
        CourseID VARCHAR(10),
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        FOREIGN KEY (CourseID) REFERENCES course(CourseID),
        PRIMARY KEY (PostID, CourseID)
    )";
    $conn->query($sql);

    //table links posts to users
    $sql = "CREATE TABLE posts(
        PostID INT,
        UserID INT,
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (PostID, UserID)
    )";

    //table associates comments with posts
    $conn->query($sql);
    $sql = "CREATE TABLE commentUnder(
        CommentID INT,
        PostID INT,
        FOREIGN KEY (CommentID) REFERENCES comment(CommentID),
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        PRIMARY KEY (CommentID, PostID)
    )";

    $conn->query($sql);

    //table links comments to users
    $sql = "CREATE TABLE comments(
        CommentID INT,
        UserID INT,
        FOREIGN KEY (CommentID) REFERENCES comment(CommentID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (CommentID, UserID)
    )";
    $conn->query($sql);

    //tablet to link courses to tutors
    $sql = "CREATE TABLE teaches(
        TutorID INT,
        CourseID INT,
        FOREIGN KEY (TutorID) REFERENCES user(UserID),
        FOREIGN KEY (CourseID) REFERENCES course(CourseID),
        PRIMARY KEY (TutorID, CourseID)
    )";
    $conn->query($sql);

    $conn->close();
?>
