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
    <title>Tutors</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">
</head>
<body>
    <!-- Header Section -->
    <?php include 'header.php'?>
    <section class="section1 course_section">
        <div class="">
            <h1 class="header">Add A Tutor</h1>
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
