<?php
include "DBConnect.php";

if (isset($_POST['search'])){
    $name = $_POST['search'];
    $query = "SELECT * FROM Course WHERE CourseID LIKE '%$name%' LIMIT 5 ";
    $queryResults = mysqli_query($conn,$query);
    
    echo '
    <ul>
    ';

    while($result = mysqli_fetch_array($queryResults)){
        ?>
        <li onclick='fill("<?php echo $result['CourseID']; ?>")'>
        <a>
            <?php echo $result['CourseID'];?>

        
        </li></a>
        <?php
    }

}
?>

</ul>