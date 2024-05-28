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
                        <a href="userAccount.php"><button class="btn btn-primary" id="account" type="submit" >Account</button></a>
      
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

   <!-- Welcome Section -->
    <section id="section1" class="section section1">
        <div class="welcome-content">
            <h1>Welcome to <br><strong>shareBestie!</strong></h1>
            <p>Your one-stop platform for collaborative learning and knowledge sharing among students!</p>
        </div>
        <div class="introduction">
            <p> At shareBestie, we believe that every student deserves access to quality educational resources to excel in their academic journey. That's why we've created a community where students can come together to share class notes and insights on various subjects. Whether you're looking for notes from your recent lecture or eager to contribute your own knowledge, shareBestie provides the perfect platform to connect with peers and enhance your learning experience. With a diverse range of courses and topics covered, you'll find everything you need. Our user-friendly interface makes it easy to browse, upload, and view notes, ensuring that valuable learning resources are accessible to all. Join us today and become part of a supportive community of students who are passionate about learning and helping each other succeed. Together, let's make learning a collaborative and enjoyable experience!</p>
        </div>
    </section>


    <!-- Top Class Notes Section -->
    <section id="section2" class="section section2">
        <h2>Popular Courses</h2>
        <p>Check out different courses now!</p>
        <div class="popular-courses">
            <div class="course">
                <h3>CMSC 11 - Introduction to Python Programming</h3>
                <p>This course covers the fundamentals of computer science using the Python programming language.</p>
                <a href="coursePage.php?id=CMSC 11" class="btn btn-primary">View Posts</a>
            </div>
            <div class="course">
                <h3>MATH 18 - Introduction to Algebra</h3>
                <p>This course covers introductory topics on the real number system, algebraic functions, and more.</p>
                <a href="coursePage.php?id=MATH 18" class="btn btn-primary">View Posts</a>
            </div>
            <div class="course">
                <h3>CMSC 56 - 	Discrete Mathematical Structures in Computer Science</h3>
                <p>Principles of logic, set theory, relations and functions</p>
                <a href="coursePage.php?id=CMSC 56" class="btn btn-primary">View Posts</a>
            </div>
        </div>
        <h2>Top Posts</h2>
        <p>Insert top class notes here.</p>
        <div class="popular-courses">
            <div class="course">
                <h3>Question Topics</h3>
                <p>Hello, what are the topics covered in the post?</p>
                <a href="postPage.php?postID=2" class="btn btn-primary">View Posts</a>
            </div>
            <div class="course">
                <h3>Question: possible Teacher?</h3>
                <p>Who are the possible teachers for this course?</p>
                <a href="postPage.php?postID=3" class="btn btn-primary">View Posts</a>
            </div>
            <div class="course">
                <h3>CMSC 56 - 	Discrete Mathematical Structures in Computer Science</h3>
                <p>Principles of logic, set theory, relations and functions</p>
                <a href="postPage.php?postID=6" class="btn btn-primary">View Posts</a>
            </div>
        </div>
    </section>

    <!-- Top Tutors Section -->
    <section id="section3" class="section section3">
        <h2>Top Tutors</h2>
        <div class="course">
                <h3>Badaboopie - Gabriel Dominic Dicar</h3>
                <p></p>
                <a href="tutorProfile.php?id=2" class="btn btn-primary">View Posts</a>
        </div>
        <p>Insert top tutors here</p>
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

