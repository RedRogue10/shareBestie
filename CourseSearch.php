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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
function fill(value){
    $('#searchBox').val(value);
    $('#searchResults').hide();
}
$(document).ready(function(){
    $("#searchBox").keyup(function(){

        var name = $('#searchBox').val();
        if (name=="") {
            $('#searchResults').html("");
        } else {
            $.ajax({
                type: "POST", 
                url:"courseSearchResults.php", 
                data: {
                    search: name
                },
                success: function(html){
                    console.log("test 5");
                    $('#searchResults').html(html).show();
                }
            });
        }
    });
});


</script>

<html>
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
        <section id ="course_section "class="course_section" >
            <div class="search_section">
                <form name="searchBar" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="text" size="30" id="searchBox" name="search">
                    <button type="submit" value="Search" name='button' id="search_button">Search</button>
                    <div id="searchResults"></div>
                </form>
            </div>
            <div id="searchCards">
                <?php
                    include 'dbConnect.php';
                    $req = '';
                    if(isset($_REQUEST['button'])){
                        $req = $_REQUEST['button'];}

                    switch($req){
                        case 'Search':
                            $name = $_POST['search'];
                            $sql = "SELECT * FROM Course WHERE CourseID LIKE '%$name%'";
                            $result = $conn->query($sql);

                            while($course = $result->fetch_assoc()){
                            echo    "<div class='posts'>".
                                    "<a href='coursePage.php?id=".$course["CourseID"]."'><p class='coursetitle'>".$course["CourseID"]."</p><p>".$course["Description"]."</p></a>".
                                    "<br></div>";
                            }
                    }   

                ?>
            </div>
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

