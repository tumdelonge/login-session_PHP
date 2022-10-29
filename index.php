<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php?status=logindulu');
    exit;
}
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>

<body>
    <div class="container">
        <header>
            <h2>HomePage</h2>
        </header>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="logout.php">LogOut</a></li>
        </ul>
    </div>
</body>

</html>