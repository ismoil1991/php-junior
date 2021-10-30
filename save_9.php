<?php

//$host = 'localhost';
//$dbname = 'stepbystep';
//$username = 'root';
//$password = 'root';
//
//$connection = mysqli_connect($host, $username, $password, $dbname);
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $data = $_POST['text'];
//    $query = "INSERT INTO others (title) VALUES ('{$data}')";
//    if (mysqli_query($connection, $query)) {
//        echo "New record created successfully";
//    } else {
//        echo "Error: " . $query . "<br>" . mysqli_error($connection);
//    }
//}
$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=stepbystep","root","root");
$sql = 'INSERT INTO others (text) VALUES (:text)';
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
header("Location: /task_9.php");
?>