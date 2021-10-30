<?php
session_start();
$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=stepbystep","root","root");
$sql = 'SELECT * FROM others WHERE text=:text';
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)){
    $message = 'You should check in on some of those fields below.';
    $_SESSION['error'] = $message;
    header("Location: /task_10.php");
    exit;
}

$sql = 'INSERT INTO others (text) VALUES (:text)';
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$message = 'New record created successfully';
$_SESSION['success'] = $message;

header("Location: /task_10.php");