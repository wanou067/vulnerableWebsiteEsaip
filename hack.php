<?php
include 'creds.php';
/** @var PDO $pdo */

if(isset($_GET['token'])) {
    $req = $pdo->prepare("INSERT INTO hack (token) VALUES (:token)");
    $req->bindValue(':token', $_GET['token']);
    $req->execute();
} else {
    http_response_code(403);
}