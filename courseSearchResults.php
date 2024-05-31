<?php
/*Souce Code for courseSearchResults.php*/
include "dbConnect.php";

if (isset($_POST['search'])) {
    $name = $_POST['search'];

    //constructing the SQL query to search for courses based on CourseID
    $query = "SELECT * FROM Course WHERE CourseID LIKE '%$name%' LIMIT 5";

 
    $queryResults = mysqli_query($conn, $query);

    //outputting the search results as an unordered list
    echo '<ul>';

    //looping through the query results
    while ($result = mysqli_fetch_array($queryResults)) {
        ?>
        <li onclick='fill("<?php echo $result['CourseID']; ?>")'>
            <a>
                <?php echo $result['CourseID'];?>
            </a>
        </li>
        <?php
    }

    echo '</ul>';
}
?>
