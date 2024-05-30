<?php
   session_start();
   
   include 'dbConnect.php';
   
   $courseID = $_REQUEST['courseID'];
   
   //handling the submission to create a new post
   if(isset($_REQUEST['submitPost'])){
       $userID = $_SESSION['userID'];
       
       $date = date ('Y-m-d H:i:s', time());
       
       //retrieving title and content of the post from the form data
       $title = $_POST['title'];
       $content  = $_POST['content'];
       
       //inserting the new post into the 'post' table
       $sql = "INSERT INTO post (Title, Content, PostDate) VALUES('$title','$content','$date')";
       $conn->query($sql);
       
       //retrieving the ID of the newly inserted post
       $postID = mysqli_insert_id($conn);
       
       //inserting the relationship into the 'posts' table
       $sql = "INSERT INTO posts (UserID,PostID) VALUES ('$userID','$postID')";
       $conn->query($sql);
       
       //inserting the relationship into the 'postUnder' table
       $sql = "INSERT INTO postUnder (PostID, CourseID) VALUES ('$postID','$courseID')";
       $conn->query($sql);
       
       //redirecting
       header("Location:postPage.php?postID=$postID");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!--Source Code for postAdd.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="SigninCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">

    <title>Login</title>
    <title>Post</title>
</head>
<body>
    <!--Navigation Menu-->
    <div class="navbar-header">
        <ul>
            <img src="ShareBestie_Logo.png" alt="LOGO" style=" padding:0%; height:50px; width:50px; object-fit:cover;">
            <a href="home.php" id="brandname">ShareBestie</a>
            <li><a href="home.php">Home</a></li>
            <li><a href="tutors.php">Tutors</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
    </div>
    <div class="signupform">
        <h1 id="tableHeader">New Post</h1>
        <div class="addpost">
            <!--Form for adding a new post-->
            <form action='<?php echo $_SERVER["PHP_SELF"]?>' method ="POST">
                <input type="hidden" name="courseID" value ="<?php echo $courseID?>">    
                <table>
                    <tr>
                        <td>
                            <!--Input field for post title-->
                            <input type="text" name="title" placeholder="Post Title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--Textarea for post content-->
                            <textarea name="content" id="description" placeholder="Write your post here."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary" id="submitPost" type="submit" name="submitPost">Post</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
