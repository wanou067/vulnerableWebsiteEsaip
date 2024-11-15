<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'creds.php';
/** @var PDO $pdo */
session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Forum Secret Super Secure</title>
</head>
<body>

<?php
if (isset($_SESSION["name"])) {
    ?>
    <a class="btn btn-warning position-absolute m-3" href="logout.php">Logout</a>
    <p class="position-absolute mt-3 py-2" style="left: 7rem;">Connecté en tant que: <?= $_SESSION['name'] ?></p>
    <?php
} else {
    ?>
    <a class="btn btn-primary position-absolute m-3" href="login.html">Login</a>
    <?php
}
?>


<h2 class="text-center mb-5">Forum secret super secure</h2>
<div class="container border border-2 py-2">

    <h3 class="mb-3 text-center">Le fil de discussion</h3>

    <?php
    $req = $pdo->query("SELECT name, content FROM comments INNER JOIN users on comments.sender = users.id");
    $res = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $comment) {

        if (isset($_SESSION["name"])) {
            $isUserMessage = $comment['name'] === $_SESSION["name"];
        } else {
            $isUserMessage = false;
        }
        ?>

        <div class="d-flex mb-2 <?= !$isUserMessage ? 'justify-content-start' : 'justify-content-end' ?>">
            <div class="<?= !$isUserMessage ? 'bg-primary-subtle' : 'bg-success-subtle' ?> border rounded-3 w-50 px-3">
                <h4 class="text-start"><?= $comment['name'] ?></h4>
                <p><?= $comment['content'] ?></p>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($_SESSION["id"])) {
        ?>
        <form action="post.php" method="post">
            <!--        <h2>Welcome --><?php //= $_SESSION["name"] ?><!--</h2>-->
            <label class="form-label mt-5" for="comment">Commenter:</label>
            <textarea class="form-control h-25 mb-3" name="comment" id="comment" cols="25" rows="3"></textarea>
            <input class="btn btn-success" type="submit" value="Poster">
        </form>
        <?php
    } else {
    ?>
        <div class="alert alert-warning" role="alert">Veuillez vous connecter pour pouvoir poster</div>
    <?php
    }
    ?>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
