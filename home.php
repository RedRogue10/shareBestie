<?php 
    session_start();
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
            <a href="" id="brandname">ShareBestie</a>
        </div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/notes">Courses</a></li>
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
      
                        <!--Signup Form -->
                        <a href="logout.php"><button class="btn btn-primary" id="logout" type="submit">Log Out</button></a> 
                    </div>';
            }else{
                echo '<div class="user-auth">
                        <!--Login Form -->
                        <a href="Login.php"><button class="btn btn-primary" id="login" type="submit" >Log in</button></a>
      
                        <!--Signup Form -->
                        <a href="SignUp.php"><button class="btn btn-primary" id="signup" type="submit" >Sign Up</button></a>
              </div>';
            }
        
        
        ?>
    </header>

    <!--Welcome Section -->
    <section id="section1" class="section section1">
        <h2>Welcome to shareBestie!</h2><br>
        <p>Insert introduction here</p>
    </section>

    <!-- Top Class Notes Section -->
    <section id="section2" class="section section2">
        <h2>Top Class Notes/Courses</h2>
        <p>Insert top class notes here.</p>
    </section>

    <!-- Top Tutors Section -->
    <section id="section3" class="section section3">
        <h2>Top Tutors</h2>
        <p>Insert top tutors here</p>
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
