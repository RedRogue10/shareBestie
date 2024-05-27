<!DOCTYPE html>
<?php 
    session_start();
    include 'dbConnect.php';
    $postID = $_GET['postID'];

    // Query post information
    $sql = "SELECT * FROM post WHERE postID = '$postID'";
    $postRow = $conn->query($sql)->fetch_assoc();
    
    // Query comments under post
    $sql = "SELECT * FROM commentUnder NATURAL JOIN comment WHERE PostID = '$postID'";
    $commentsUnder = $conn->query($sql);

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
    <header>
        <div class="logo">
            <img src="ShareBestie_Logo.png" alt="Your Website Logo">
            <a href="home.php" id="brandname">ShareBestie</a>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="courseSearch.php">Courses</a></li>
                <li><a href="tutors.php">Tutors</a></li>
                <li><a href="/about">About Us</a></li>
            </ul>
        </nav>
        <?php 
            if(isset($_SESSION['userID'])){
                echo '<div class="user-auth">
                        <!--Login Form -->
                        <a href=""><button class="btn btn-primary" id="account" type="submit" >Account</button></a>
      
                        <!--Signup Form -->
                        <a href="userLogout.php"><button class="btn btn-primary" id="logout" type="submit">Log Out</button></a> 
                    </div>';
            }else{
                echo '<div class="user-auth">
                        <!--Login Form -->
                        <a href="userLogin.php"><button class="btn btn-primary" id="login" type="submit" >Log in</button></a>
      
                        <!--Signup Form -->
                        <a href="userSignup.php"><button class="btn btn-primary" id="signup" type="submit" >Sign Up</button></a>
              </div>';
            }
        ?>
    </header>

    <!-- Main Body -->
    <section id="section1" class="section section1">
        <h2><?php echo $postRow['Title']?></h2>
        <p><?php echo $postRow['Content']?></p>
        <form name="commenting" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <?php
                    if ($commentsUnder->num_rows > 0){
                        while($row = $commentsUnder->fetch_assoc()){
                            echo "<a href=''><div id='post' class=''>".
                                "<h3>".$row['Title']."</h3>".
                                "<p>".$row['Content']."</p>".
                            "</div></a>";
                        }}
        
        ?>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="contact-info">
            <p>Contact Us: insert email here | Follow Us: <a href="#">Social Media</a></p>
        </div>
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
