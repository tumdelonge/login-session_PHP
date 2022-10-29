<?php
$conn = mysqli_connect('localhost', 'root', '', 'login_db');

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
