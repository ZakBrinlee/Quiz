<?php
/**
 * Created by PhpStorm.
 * User: Zak
 * Date: 3/11/2018
 * Time: 1:44 PM
 */

include 'config.php';
session_start();

$firstName = $_SESSION['fName'];
$lastName = $_SESSION['lName'];

if(isset($_POST['score'])) {
    $score= $_POST['score'];
    $query = "INSERT INTO results (first_name, last_name, score) VALUES ('$firstName', '$lastName' , '$score')";
    execute_query($query);
}
    $query = "SELECT * FROM results WHERE first_name = '$firstName' AND last_name = '$lastName'";
    $result = execute_query($query);

//echo $query;


?>
<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <div id="quiz">
    <h1><?=$firstName;?>'s PHP Quiz Results!</h1>
    <?php
//    $result = resultsLookup($firstName, $lastName);

        while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <fieldset>
                <legend> Quiz Results</legend>
                <?php
                    echo 'Name: ' . $row['first_name'];
                    echo '<br>';
                    echo 'Score: ' . $row['score'];
                    echo '<br>';
                    echo 'Date: ' . $row['quiz_date'];
                ?>
            </fieldset>
            <?php
        }?>
        <form action="display_quiz.php">
            <input type="submit" value="Start Over" id="button">
        </form>
    </div>
</body>
</html>
