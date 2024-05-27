<?php

   session_start();
   include 'dbConnect.php';
   $courseID = $_REQUEST['courseID'];
   if(isset($_REQUEST['submitPost'])){
    $userID = $_SESSION['userID'];
    $date = date ('Y-m-d H:i:s', time());
    $title = $_POST['title'];
    $content  = $_POST['content'];
    $sql = "INSERT INTO post (Title, Content, PostDate) VALUES('$title','$content','$date')";
    $conn->query($sql);
    $postID = mysqli_insert_id($conn);
    $sql = "INSERT INTO posts (UserID,PostID) VALUES ('$userID','$postID')";
    $conn->query($sql);
    $sql = "INSERT INTO postUnder (PostID, CourseID) VALUES ('$postID','$courseID')";
    $conn->query($sql);
   }
   
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="SigninCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">

    <title>Login</title>
</head>
<body>
    <div class="navbar-header">
        <ul>
            <img src="ShareBestie_Logo.png" alt="LOGO" style=" padding:0%; height:50px; width:50px; object-fit:cover;">
            <a href="home.php" id="brandname">ShareBestie</a>
            <li><a href="">Careers</a></li>
            <li><a href="">Courses</a></li>
            <li><a href="">Tutors</a></li>
        </ul>
    </div>

    <div class="signupform">
    <h1 id="tableHeader">New Post</h1>
        <form action='<?php echo $_SERVER["PHP_SELF"]?>' method ="POST">
            <input type="hidden" name="courseID" value ="<?php echo $courseID?>">
            <input type="text" name="title" placeholder="Post Title">
            <input type="textarea" name="content" placeholder="Write your post here.">
            <button class="btn btn-primary" id="submitPost" type="submit" name="submitPost">Post</button>
        </form>
        </div>
    
</body>
</html>


