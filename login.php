<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'creds.php';
/** @var PDO $pdo */
session_start();

if(isset($_POST['name']) && isset($_POST['password'])) {
    $pass = hash('sha256', $_POST['password']);
    $req = $pdo->query("SELECT id, name FROM users WHERE name = '".$_POST['name']."' AND password = '".$pass."'");
    echo ("SELECT id, name FROM users WHERE name = '".$_POST['name']."' AND password = '".$pass."'");
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $_SESSION["name"] = $result['name'];
    $_SESSION["id"] = $result['id'];
    echo "
<h2>Welcome ".$_SESSION["name"]."</h2>
<p>You are logged-in successfully</p>
";
    header('Location: index.php');
}