<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Source Code for about.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - shareBestie</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">
</head>
<body>

    <!--Header Section-->
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
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
        <!--Log In and Sign Up for Logged In and Nonlogged In Users-->
        <?php 
            if(isset($_SESSION['userID'])){
                echo '<div class="user-auth">
                        <a href="userAccount.php"><button class="btn btn-primary" id="account" type="submit" >Account</button></a>
                        <a href="userLogout.php"><button class="btn btn-primary" id="logout" type="submit">Log Out</button></a> 
                    </div>';
            }else{
                echo '<div class="user-auth">
                        <a href="userLogin.php"><button class="btn btn-primary" id="login" type="submit" >Log in</button></a>
                        <a href="userSignup.php"><button class="btn btn-primary" id="signup" type="submit" >Sign Up</button></a>
              </div>';
            }
        ?>
    </header>

    <!--Main Content-->
    <section id="about-us" class="sectio1n section1">
        <div class="aboutus" style="background-color:rgba(255,255,255,0.5)">
            <h1>About Us</h1>
            <p>Welcome to shareBestie, your one-stop platform for collaborative learning and knowledge sharing among students!</p>
            
            <h2>Our Mission</h2>
            <p>Our mission is to provide a supportive community where students can come together to share class notes, insights, and study resources to enhance their learning experience.</p>
            
            <h2>Our Vision</h2>
            <p >We envision a world where education is accessible to all, and students can easily connect with peers to learn and grow together.</p>
            
            <h2>Our Team</h2>
            <p>Meet the passionate team behind shareBestie:</p>
            <ul>
                <li>Agent Aguirre</li>
                <li>Agent Dicar</li>
                <li>Agent Vincoy</li>
            </ul>
            
            <h2>Contact Us</h2>
            <p>If you have any questions, feedback, or inquiries, feel free to contact us:</p>
            <ul>
                <li>Email: www.DVA@sharebestie.com</li>
                <li>Phone: +1234567890</li>
                <li>Address: Miagao, Iloilo, Philippines</li>
            </ul>
        </div>
    </section>

    
   <!--Footer Section-->
   <footer>
        <!--Contact Information-->
        <div class="contact-info">
            <p>Contact Us: wwww.DVA@shareBestie.com | Follow Us: <a href="#">Facebook</a></p>
        </div>
        <!--Footer Links-->
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
