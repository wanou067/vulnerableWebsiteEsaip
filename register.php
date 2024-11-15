<?php
include 'creds.php';
/** @var PDO $pdo */

if(isset($_POST['name']) && isset($_POST['password'])) {
    $pass = hash('sha256', $_POST['password']);
    $pdo->exec("INSERT INTO users (name, password) VALUES ('".$_POST['name']."', '".$pass."')");
    echo "User created!";
    header('Location: login.php');
}