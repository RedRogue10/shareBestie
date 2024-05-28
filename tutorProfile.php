<?php 
    session_start();
    include 'dbConnect.php';
    $tutorID = $_REQUEST['id'];
    $sql = "SELECT * FROM user WHERE UserID = '$tutorID'";
    $row = $conn->query($sql)->fetch_assoc();
    $username = $row['Username'];
    $firstname = $row['FName'];
    $lastname = $row['LName'];
    $email = $row['Email'];
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
               <!--  <li><a href="/login">Login</a></li>
                <li><a href="signup">Sign up</a></li> -->
            </ul>
        </nav>
        <?php 
            if(isset($_SESSION['userID'])){
                echo '<div class="user-auth">
                        <!--Login Form -->
                        <a href=""><button class="btn btn-primary" id="account" type="submit" >Account</button></a>
      
                        <!--Logout -->
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

   <!-- Account Display -->
    <section id="section1" class="section section2">
        <div class="welcome-content">
            <h1>Welcome to <br><strong>shareBestie!</strong></h1>
        </div>
        <div>
            <h1>Account</h1>
            <div>Username:  <?php echo $username?></div>
            <div>First Name: <?php echo $firstname?></div>
            <div>Last Name: <?php echo $lastname?></div>
            <div>Email: <?php echo $email?></div>
        </div>
        <div class="signupform" style="text-align:center">
            <h1 id="tableheader">Teaches</h1>
            <?php 
                $sql = "SELECT * FROM teaches WHERE TutorID ='$tutorID'";
                $result =  $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<p>".$row['CourseID']."</p>";
                }
            ?>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <!-- Contact Information -->
        <div class="contact-info">
            <p>Contact Us: insert email here | Follow Us: <a href="#">Social Media</a></p>
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

