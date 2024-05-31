<?php 
    session_start();
    include 'dbConnect.php';
    if(isset($_GET['postID'])){
        $postID = $_GET['postID'];
    }
    //Query post information
    $sql = "SELECT * FROM post WHERE postID = '$postID'";
    $postRow = $conn->query($sql)->fetch_assoc();
    
    //Query comments under post
    $sql = "SELECT * FROM commentUnder NATURAL JOIN comment WHERE PostID = '$postID'";
    $commentsUnder = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Source Code for postPage.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">
</head>
<body>

    <!-- Header Section -->
    <?php include 'header.php'?>

    <!--Main Body-->
    <section id="postpage" class="section section1">
        <div class="mainbody">
            <h2><?php echo $postRow['Title']?></h2>
            <p><?php echo $postRow['Content']?></p>
            <?php 
            if(isset($_SESSION['userID'])){
                echo '<form name="commenting" method="POST" action="commentAdd.php">'.
                '<textarea name="content"></textarea>'.
                '<button class="btn btn-primary" type="submit" name="comment">Comment</button>'.
                '<input type="hidden" value="'.$postRow['PostID'].'" name="PostID"></form>';
                }
            ?>
        </div>
        <!--Comment Section-->
        <div class="comments">
                <?php
                    if ($commentsUnder->num_rows > 0){
                        while($row = $commentsUnder->fetch_assoc()){
                            $commentID = $row['CommentID'];
                            $sql = "SELECT * FROM comments NATURAL JOIN user WHERE CommentID = '$commentID' ";
                            $name = $conn->query($sql)->fetch_assoc();

                            echo "<div id='post' class='posts'>".
                                "<p>".$row['Content']."<p>".
                                "<p>".$name['Username']." ".$row['PostDate']."</p>".
                            "</div>";
                        }
                    }else{
                        echo "<div> <p> There are no comments for this post </p></div>";
                    }
        
                ?>
        </div>
    </section>

    <!--Footer Section-->
    <footer>
        <!-- Contact Information -->
        <div class="contact-info">
            <p>Contact Us: wwww.DVA@shareBestie.com | Follow Us: <a href="#">Social Media</a></p>
        </div>
        <!-- Footer Links -->
        <div class="footer-links">
            <ul>
                <li><a href="/terms">Terms of Service</a></li>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
