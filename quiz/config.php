<?php
/**
 * Created by PhpStorm.
 * User: Zak
 * Date: 3/11/2018
 * Time: 2:03 PM
 */

// ** MySQL settings - You can get this info from your web host ** //
define( 'DB_NAME', 'central_zak240' );

/** MySQL database username */
define( 'DB_USER', 'zak240_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'batman32!' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql.zakbrinlee.com' );

function rdy_DB(){
//connection info for testing purposes
    $servername = DB_HOST;
    $server_username = DB_USER;
    $server_password = DB_PASSWORD;
    $dbname = DB_NAME;
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    try{
        $db = new PDO($dsn, $server_username, $server_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //FOR DEBUGGING ONLY
        //echo "<p>Connected</p>";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message </p>";
        exit();
    }
    return $db;
//return null;
}

function execute_query($query){
    //$connection = rdy_DB();
    $statement = rdy_DB()->prepare($query);
    $statement->execute();
    //$connection->close();
    return $statement;
}


function resultsLookup($firstName, $lastName){
    $query = "SELECT * FROM results
             WHERE first_name = $firstName AND last_name = $lastName";
    //echo $query;
    $stmt = execute_query($query);
    //var_dump($stmt->fetchAll());
    return $stmt->fetchAll();
}

function getQuiz(){
    $query = "SELECT * FROM Question";
    //echo $query;
//    $conn = prepare_conn();
//    $stmt = $conn->prepare($query);
    $stmt = execute_query($query);
    //var_dump($stmt->fetchAll());
    return $stmt->fetchAll();
}

function submitResults($firstName, $lastName, $score){
    $query = "INSERT INTO results (first_name, last_name, score)
              VALUES ('$firstName', '$lastName', $score)";
    //echo $query;
    execute_query($query);
}

function prepare_conn(){
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;

    try{
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Check connection
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}