<?php 
    session_start();
    include 'dbConnect.php';
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE UserID = '$userID'";
    $row = $conn->query($sql)->fetch_assoc();
    $username = $row['Username'];
    $firstname = $row['FName'];
    $lastname = $row['LName'];
    $email = $row['Email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Source Code for userAccount.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Page</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">


</head>
<body>

    <!-- Header Section -->
    <?php include 'header.php'?>

   <!-- Account Display -->
    <section id="section1" class="section section2">
        <div class="welcome-content course">
            <h1>Welcome to <br><strong>shareBestie!</strong></h1>
        
        <div>
            <h1>Account</h1>
            <div>Username:  <?php echo $username?></div>
            <div>First Name: <?php echo $firstname?></div>
            <div>Last Name: <?php echo $lastname?></div>
            <div>Email: <?php echo $email?></div>
        </div></div>
    </section>

    <!--Footer Sectio -->
    <footer>
        <!--Contact Informatio -->
        <div class="contact-info">
            <p>Contact Us: wwww.DVA@shareBestie.com | Follow Us: <a href="#">Social Media</a></p>
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

