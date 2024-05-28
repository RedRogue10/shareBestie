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
    </header>
    <section class="course_section">
        <div>
            <form action="tutorSet.php" method="POST">
                <input type="email" name = "email" placeholder="enter tutor email">
                <select class="expand" name="userID" >
                <option value="" disabled="">----Select Tutor's Courses-----</option>
                <?php 
                    include 'dbConnect.php';
                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);

                    if($result -> num_rows > 0 ){
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['UserID']."'>".$row['Username']."</option>";
                        }
                    }
                
                ?>
                </select>
                <select class="expand" name="courses[]" multiple>
                <option value="" disabled="">----Select Tutor's Courses-----</option>
                <?php 
                    include 'dbConnect.php';
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);

                    if($result -> num_rows > 0 ){
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['CourseID']."'>".$row['CourseID']."</option>";
                        }
                    }
                
                ?>
                </select>
                <button name="addTutor" type="submit">Set As Tutor</button>
            </form>
        </div>
    </section>

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
