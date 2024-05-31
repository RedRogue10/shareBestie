<?php
    /*Source Code for commentAdd.php*/
    include 'dbConnect.php';
 
    session_start();
    
    $userID = $_SESSION['userID'];
    
    $content =  $_POST['content'];
    $postID = $_POST['PostID'];
    
    $date  = date ('Y-m-d H:i:s', time());

    //Inserting comment content and date into 'comment' table
    $sql = "INSERT INTO comment (Content, PostDate) VALUES ('$content', '$date')";
    $conn->query($sql);

    //Getting the last inserted comment ID
    $commentID =  mysqli_insert_id($conn);
    
    //Inserting comment ID and userID into 'comments' table
    $sql = "INSERT INTO comments (CommentID, UserID) VALUES ('$commentID', '$userID')";
    $conn->query($sql);

    //Inserting comment ID and postID into 'commentunder' table
    $sql = "INSERT INTO commentunder (CommentID, PostID) VALUES ('$commentID', '$postID')";
    $conn->query($sql);

    //Redirecting
    header("Location: postPage.php?postID=$postID");
?>
