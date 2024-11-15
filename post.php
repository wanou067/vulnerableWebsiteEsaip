<?php
include 'creds.php';
/** @var PDO $pdo */
session_start();

if(isset($_POST['comment']) && isset($_SESSION['name'])) {
    $comment = $_POST['comment'];
    //Version sécurisée:
//    $comment = htmlspecialchars($_POST['comment']);
    $req = $pdo->prepare("INSERT INTO comments (content, sender, date) VALUES (:content, :sender, :date)");
    $req->execute([
        'content' => $comment,
        'sender' => $_SESSION['id'],
        'date' => date('Y-m-d H:i:s')
    ]);
    echo "Insertion effectuée";
    error_log($_SESSION['name']." posted a comment: ".$comment);
    header('Location: index.php');
}