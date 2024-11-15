<?php
session_start();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script>
        setTimeout(function () {
            window.location.href = 'index.php';
        }, 3000);
    </script>
</head>
<body>
<div class="container text-center mt-5">
    <h2>You have been logged out</h2>
    <p>`You will be redirected to the homepage in 3 seconds.`</p>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
