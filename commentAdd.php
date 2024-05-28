<?php
    include 'dbConnect.php';
    session_start();
    $userID = $_SESSION['userID'];
    $content =  $_POST['content'];
    $postID = $_POST['PostID'];
    $date  = date ('Y-m-d H:i:s', time());

    $sql = "INSERT INTO comment (Content,PostDate) VALUES('$content','$date')";
    $conn->query($sql);
    $commentID =  mysqli_insert_id($conn);
    $sql ="INSERT INTO comments (CommentID, UserID) VALUES('$commentID','$userID')";
    $conn->query($sql);
    $sql = "INSERT INTO commentunder (CommentID, PostID) VALUES('$commentID','$postID')";
    $conn->query($sql);

    header("Location: postPage.php?postID=$postID");

?>