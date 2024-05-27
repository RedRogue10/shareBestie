<?php
   ob_start();
   session_start();
   if(isset($_SESSION['userID'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
?>
<?php
    include 'dbConnect.php';
    if(isset($_REQUEST['loginMessage'])){
        $msg=$_REQUEST['loginMessage'];
    }else{
        $msg="Enter your credentials";
    }
    $email = $_POST['email'];
    if(isset($_POST['Login'])){
        $getUsers = "SELECT Email FROM user WHERE Email = '$email'";
        $users  = "";  
        if(!($users = $conn->query($getUsers)->fetch_assoc())){
            $msg = "Email not used. <a href='userSignup.php'>Register here.</a>";
        }else if (in_array($email, $users)) {
          $getPass = "SELECT * FROM user WHERE Email = '$email' ";
          $pass = $conn->query($getPass)->fetch_assoc();    
          if ($pass['Password']==$_POST['password']) {
             $_SESSION['valid'] = true;
             $_SESSION['timeout'] = time();
             $_SESSION['userID'] = $pass['UserID'];
             $_SESSION['username'] = $pass['Username'];
             header("Location: home.php");
             
          }else { 
             $msg = "You have entered wrong Password"; 
          }
       }else {
          echo $users[0];
          $msg = "You have entered wrong user name";
       }
       
    }
    echo $msg;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="SigninCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">

    <title>Login</title>
</head>
<body>
    <div class="navbar-header">
        <ul>
            <img src="ShareBestie_Logo.png" alt="LOGO" style=" padding:0%; height:50px; width:50px; object-fit:cover;">
            <a href="home.php" id="brandname">ShareBestie</a>
            <li><a href="">Careers</a></li>
            <li><a href="courseSearch.php">Courses</a></li>
            <li><a href="tutors.php">Tutors</a></li>
        </ul>
    </div>

    <div class="signupform">
    <h1 id="tableHeader">Welcome Back!</h1>
        <form action='<?php $_SERVER['PHP_SELF']?>' method ="POST">
            <table>
                <tr>
                    <p id="gen-info">Account Login</p>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>
                    <td>
                        <a href="" id="forgotpass" style=" color: gray; text-decoration:none;" >Forgot password?</a>
                    </td>
                </tr>
                <tr>
                    <td>
                    <button class="btn btn-primary" id="signup" type="submit" name="Login">Log in</button>
                        <!-- <input class="btn btn-primary" id="signup" type="submit" name="Login" value="Log in"> -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo "<span>$msg</span>";?>
                    </td>
                </tr>
            </table>
            
        </form>
        </div>
    
</body>
</html>


