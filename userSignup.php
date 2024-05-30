<?php
    /*Source Code for userSignup.php*/
    include 'dbConnect.php';
    session_start();
    if(isset($_SESSION['userID'])){
        header("Location: home.php");
    }
    
    $userMsg = '';
    $emailMsg = '';
    if(isset($_REQUEST['signUp'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user";
        $userTable = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
        $usernames = array_values(array_column($userTable,'Username'));
        $emails = array_values(array_column($userTable,'Email'));
        $validReg = true;
        if(in_array($username,$usernames)){
            $userMsg = 'username already taken.';
            $validReg = false;
        }
        if(in_array($email,$emails)){
            $emailMsg = 'email already in use.';
            $validReg = false;
        }

        if($validReg){
            $sql = "INSERT INTO  user (Username, Fname, Lname, Email, Password) VALUES('$username','$fname','$lname','$email','$password')";
            $conn->query($sql);
            header("Location: userLogin.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="SigninCSS.css">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">

    <title>Sign Up</title>
</head>
<body>
    <div class="navbar-header">
        <ul>
            <img src="ShareBestie_Logo.png" alt="LOGO" style=" padding:0%; height:50px; width:50px; object-fit:cover;">
            <a href="home.php" id="brandname">ShareBestie</a>
            <li><a href="courseSearch.php">Courses</a></li>
            <li><a href="tutors.php">Tutors</a></li>
             <li><a href="about.php">About</a></li>
        </ul>
    </div>

    <section>
        <div class="signupform">
        <h1 id="tableHeader">Create your account</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <table>
                    <tr>
                        <p id="gen-info">General Information</p>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "<p>$userMsg</p>" ?>   
                            <input type="text" name="username" placeholder="Username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="firstname" placeholder="First Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="lastname" placeholder="Last Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" placeholder="Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "<p>$emailMsg</p>" ?> 
                            <input type="email" name="email" placeholder="Email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" name="dob" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary" id="signup" type="submit" name="signUp">Sign Up</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    
</body>
</html>

