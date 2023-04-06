<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<html>
<head>
    <title>Login Ok</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* center the text */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        /* make the text bold */
        p {
            font-weight: bold;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <p>
        Welcome!
        Click on <a href="codici.php">Manage snippets</a> to start.
    </p>
</body>
</html>
