<?php
/**
 * Created by PhpStorm.
 * User: Zak
 * Date: 3/11/2018
 * Time: 1:44 PM
 */

session_start();
if(isset($_POST['firstName'])){

    $_SESSION['fName'] = $_POST['firstName'];
    $_SESSION['lName'] = $_POST['lastName'];

    if ($_POST['action'] == 'Start Quiz') {
        header("Location: display_quiz.php");
        exit;
    } else if ($_POST['action'] == 'See Past Results') {
        header("Location: results.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz App</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>PHP & MySQL Quiz App!</h1>
        <h3>Please submit your name when you are ready to proceed to the quiz</h3>

        <form action="" method="post">
            <div id="data">

                <label>First Name</label>
                <input name="firstName" type="text" />

                <label>Last Name</label>
                <input name="lastName" type="text" />

            </div>

            <div id="buttons">
                <label> </label>
                <input type="submit" name="action" value="Start Quiz">
                <input type="submit" name="action" value="See Past Results">
            </div>
        <!--    <table>-->
        <!--        <tr>-->
        <!--            <td> First Name</td>-->
        <!--            <td><input name="firstName" type="text" /></td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td> Last Name</td>-->
        <!--            <td><input name="lastName" type="text" /></td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>-->
        <!--                <input type="submit" name="action" value="Start Quiz">-->
        <!--                <input type="submit" name="action" value="See Past Results">-->
        <!--            </td>-->
        <!--        </tr>-->
        <!--    </table>-->

        </form>
    </main>
</body>
</html>
