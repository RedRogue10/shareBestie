<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Source Code for CourseSearch.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - shareBestie</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="search.js"></script>  
</head>
<body>
    <!-- Header Section -->
    <?php include 'header.php'?>

    <!--Course Section -->
    <section id="course_section" class="course_section">
        <!--Search Bar-->
        <div class="search_section">
            <form name="searchBar" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" size="30" id="searchBox" name="search">
                <button type="submit" value="Search" name='button' id="search_button">Search</button>
                <div id="searchResults" class="searchResults"></div>
            </form>
        </div>
        <!-- Search Results Cards -->
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
                        break;
                    default:
                        $sql = "SELECT * FROM Course";
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

    <footer>
        <!-- Contact Information -->
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

    <!--Query Library-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        //function to fill the search box with selected value
        function fill(value){
            $('#searchBox').val(value);
            $('#searchResults').hide();
        }
        //jQuery function to perform AJAX search
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
                            $('#searchResults').html(html).show();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
