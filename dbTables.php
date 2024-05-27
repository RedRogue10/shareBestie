<?php
    include 'dbConnect.php';

    $sql = "CREATE TABLE course(
        CourseID VARCHAR(10),
        Description TEXT,
        PRIMARY KEY (CourseID)
    )";
    $conn->query($sql);

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

    $sql = "CREATE TABLE post(
        PostID INT AUTO_INCREMENT,
        Title TEXT,
        PostDate DATETIME,
        Content TEXT,
        PRIMARY KEY (PostID)
    )";
    $conn->query($sql);   

    $sql = "CREATE TABLE comment(
        CommentID INT AUTO_INCREMENT,
        Content TEXT,
        PostDate DATETIME,
        PRIMARY KEY (CommentID)
    )";
    $conn->query($sql);

    $sql = "CREATE TABLE prereq(
        CourseID VARCHAR(10),
        PreReqID VARCHAR(10),
        PRIMARY KEY (CourseID, PreReqID),
        FOREIGN KEY (CourseID) REFERENCES course(CourseID),
        FOREIGN KEY (PreReqID) REFERENCES course(CourseID)
    )";
    $conn->query($sql); 



    $sql = "CREATE TABLE tutors(
        TutorID INT,
        UserID INT,
        FOREIGN KEY (TutorID) REFERENCES user(UserID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (TutorID, UserID)   
    )";
    $conn->query($sql);



    $sql = "CREATE TABLE postUnder(
        PostID INT,
        CourseID VARCHAR(10),
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        FOREIGN KEY (CourseID) REFERENCES course(CourseID),
        PRIMARY KEY (PostID, CourseID)
    )";
    $conn->query($sql);

    $sql = "CREATE TABLE posts(
        PostID INT,
        UserID INT,
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (PostID, UserID)
    )";
    $conn->query($sql);
    $sql = "CREATE TABLE commentUnder(
        CommentID INT,
        PostsID INT,
        FOREIGN KEY (CommentID) REFERENCES comment(CommentID),
        FOREIGN KEY (PostID) REFERENCES post(PostID),
        PRIMARY KEY (CommentID, PostID)
    )";

    $conn->query($sql);
    $sql = "CREATE TABLE replies(
        CommentID INT,
        ReplyID INT,
        FOREIGN KEY (CommentID) REFERENCES comment(CommentID),
        FOREIGN KEY (ReplyID) REFERENCES comment(CommentID),
        PRIMARY KEY (CommentID, ReplyID)
    )";
    $conn->query($sql);

    $sql = "CREATE TABLE comments(
        CommentID INT,
        UserID INT,
        FOREIGN KEY (CommentID) REFERENCES comment(CommentID),
        FOREIGN KEY (UserID) REFERENCES user(UserID),
        PRIMARY KEY (CommentID, UserID)
    )";
    $conn->query($sql);
    $conn->close();
