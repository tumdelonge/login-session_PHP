<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location: index.php?status=sudahlogin');
}

require 'config.php';

// jika login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['pass'])) {

            // set SESSION
            $_SESSION['login'] = true;
            header('location: index.php?status=loginsucces');
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
</head>

<body>
    <div class="container">
        <div class="form-box">
            <header>
                <h2>LoginPage</h2>
            </header>
            <?php if (isset($error)) : ?>
                <p style="font-style: italic; color: crimson;">Username / Password salah</p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="detail-box">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" placeholder="username">
                </div>
                <div class="detail-box">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
                <div class="detail-box">
                    <input type="submit" name="login" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>