<?php
/**
 * Created by PhpStorm.
 * User: Zak
 * Date: 3/11/2018
 * Time: 1:52 PM
 */
session_start();
include 'config.php';

$firstName = $_SESSION['fName'];
$lastName = $_SESSION['lName'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Time!</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>


<div id="quiz">
    <h1> Welcome <?=$firstName?></h1>
    <form action="" method="post" id="quizForm">
            <?php
            //echo "Connected successfully";
            $result = getQuiz();
            $counter = 1;
            $answerArray = array("$", "GET", "POST ", "SQL Injection", "<?PHP and ?>", "PHP: Hypertext Preprocessor");

            foreach($result as $row){ ?>
                <fieldset>
                    <legend> Answer <? echo $counter ?></legend>
                        <label><?php echo $row['Quest_text'] ?>:</label><br>

                        <input type="radio" value="<?php echo htmlspecialchars($row['answer1']);?>"  name="answer<? echo $counter?>">
                        <?php echo htmlspecialchars($row['answer1']);?>

                        <input type="radio" value="<?php echo htmlspecialchars($row['answer2']);?>"  name="answer<? echo $counter?>">
                        <?php echo htmlspecialchars($row['answer2']);?>

                        <input type="radio" value="<?php echo htmlspecialchars($row['answer3']);?>"  name="answer<? echo $counter?>">
                        <?php echo htmlspecialchars($row['answer3']);?>

                        <input type="radio" value="<?php echo htmlspecialchars($row['answer4']);?>"  name="answer<? echo $counter?>">
                        <?php echo htmlspecialchars($row['answer4']);?>
                </fieldset>
                    <?php $counter++;
            }?>
        <input type="submit" value="See Score" id="button">
    </form>
</div>

<?php
if(isset($_POST['answer1'])) {
    $query = array();
    foreach ($_POST as $value) {
        $query[] = $value;
    }
    $result = array_diff($answerArray, $query);
    $count = 6 - count($result);
}

?>
<div id="result">
    <div id="quiz">
    <?php

    echo "<h1>Your score: $count</h1>";
            //echo "Connected successfully";
            $result = getQuiz();
            $counter = 1;
            $answerCounter = 0;
            $score = $count;
            foreach($result as $row){ ?>
                <fieldset>
                    <legend> Answer <? echo $counter ?></legend>
                    <label><?php echo $row['Quest_text'] ?>:</label><br>

                    <?php
                    echo 'Your answer: ' . $query[$answerCounter];
                    echo '<br>';
                    echo 'Correct answer: ' . htmlspecialchars($row['correct']);
                    ?>


                </fieldset>
                <?php $counter++; $answerCounter++;

                }?>
                <form action="display_quiz.php" id="reset">
                <input type="submit" value="Restart Quiz" id="button">
                </form>
                <form action="results.php" method="post">
                    <input type="hidden" value="<?=$score;?>" name="score">
                    <input type="submit" value="Submit Results" id="button">
                </form>
    </div>
</div>
<?php
if(isset($_POST['answer1'])){
    echo /** @lang text */
    "<script>
        document.getElementById('quiz').style.display = 'none';
        document.getElementById('result').style.display = 'block';
    </script>";

}else{
    echo /** @lang text */
    "<script>
        document.getElementById('quiz').style.display = 'block';
        document.getElementById('result').style.display = 'none';
    </script>";
}
?>

</body>
</html>
