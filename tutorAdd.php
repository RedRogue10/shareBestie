<?php 
    session_start();
    // Check if the user is an admin. If not, redirect to home.php
    if(isset($_SESSION['admin'])){
    }else{
        header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Source Code for tutorAdd.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - shareBestie</title>
    
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
                <!--Navigation Menu-->
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
    <section class="course_section">
        <div>
            <!--Set a tutor for courses-->
            <form action="tutorSet.php" method="POST">
                <!--Select a tutor-->
                <select class="expand" name="userID" >
                    <option value="" disabled>----Select Tutor's Courses-----</option>
                    <?php 
                        include 'dbConnect.php'; 
                        $sql = "SELECT * FROM user"; // SQL query to get all users
                        $result = $conn->query($sql);

                        if($result -> num_rows > 0 ){
                            // Loop through each user and create an option in the dropdown
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['UserID']."'>".$row['Username']."</option>";
                            }
                        }
                    ?>
                </select>
                <!--Select multiple courses for the tutor-->
                <select class="expand" name="courses[]" multiple>
                    <option value="" disabled>----Select Tutor's Courses-----</option>
                    <?php 
                        include 'dbConnect.php'; 
                        $sql = "SELECT * FROM course"; //SQL query to get all courses
                        $result = $conn->query($sql);

                        if($result -> num_rows > 0 ){
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['CourseID']."'>".$row['CourseID']."</option>";
                            }
                        }
                    ?>
                </select>
                <!--Submit the form -->
                <button name="addTutor" type="submit">Set As Tutor</button>
            </form>
        </div>
    </section>

    
    <!--Footer Section-->
    <footer>
        <!--Contact Information-->
        <div class="contact-info">
            <p>Contact Us: www.DVA@shareBestie.com | Follow Us: <a href="#">Facebook</a></p>
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

    <!--jQuery library for AJAX -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchBox").keyup(function(){
                var name = $('#searchBox').val();
                if (name == "") {
                    $('#searchResults').html("");
                } else {
                    $.ajax({
                        type: "POST", 
                        url: "courseSearchResults.php", 
                        data: { search: name },
                        success: function(html){
                            console.log("test 5");
                            $('#searchResults').html(html).show();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
