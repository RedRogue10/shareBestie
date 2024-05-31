<!DOCTYPE html>
<?php 
    session_start();
    include 'dbConnect.php';
    $courseID = $_GET['id'];

    // Query course information
    $sql = "SELECT * FROM course WHERE CourseId = '$courseID'";
    $courseRow = $conn->query($sql)->fetch_assoc();
    
    // Query Posts Under Course
    $sql = "SELECT * FROM postUnder NATURAL JOIN post WHERE CourseID = '$courseID'";
    $postsUnder = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - shareBestie</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">


</head>
<body>

    <!-- Header Section -->
    <?php include 'header.php'?>
    <!-- Main Body -->
    <section id="section1" class="section section1">
        <div class="coursepage-mb">
            <h2><?php echo $courseRow['CourseID']?></h2>
            <p><?php echo $courseRow['Description']?></p>
            </div>
            <?php
            if(isset($_SESSION['userID'])){
                echo '<a href="postAdd.php?courseID='.$courseRow["CourseID"].'"><button class="btn btn-primary" id="signup" type="submit" name="addPost">Add Post</button></a>';
            }
            ?>
                    <?php
                        if ($postsUnder->num_rows > 0){
                            while($row = $postsUnder->fetch_assoc()){
                                echo "<a href=postPage.php?postID=".$row['PostID']."><div class='posts'>".
                                    "<h3>".$row['Title']."</h3>".
                                    "<p>".$row['Content']."</p>".
                                    "<p>".$row['PostDate']."</p>".
                                "</a></div>";
                            }}
            
            ?>
        </section>

    <!-- Footer Section -->
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
