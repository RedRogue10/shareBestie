<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="SigninCSS.css">

    <title>Sign Up</title>
</head>
<body>
    <div class="navbar-header">
        <ul>
            <img src="ShareBestie_Logo.png" alt="LOGO" style=" padding:0%; height:50px; width:50px; object-fit:cover;">
            <a href="index.html" id="brandname">ShareBestie</a>
            <li><a href="">Careers</a></li>
            <li><a href="">Courses</a></li>
            <li><a href="tutors.php">Tutors</a></li>
        </ul>
    </div>

    <section>
        <div class="signupform">
        <h1 id="tableHeader">Create your account</h1>
            <form action="">
                <table>
                    <tr>
                        <p id="gen-info">General Information</p>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="username" placeholder="Username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="fullname" placeholder="Full Name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary" id="signup" type="submit">Sign Up</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    
</body>
</html>