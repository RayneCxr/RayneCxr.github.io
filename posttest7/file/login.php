<?php
session_start();
require '../aksi/koneksi.php';

if(isset($_POST['login'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    if ($name === 'admin' && $pass === '12345') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$name'");

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($pass, $row['password'])) {
            $_SESSION['login'] = true;

            header("Location: index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style3.css">
</head>
<body>
    <div class="form__container grid">
        <div class="form__mail">
            <h1 class="form__title">Login</h1><hr>
            <?php 
                if (isset($error)) {
                    echo "<p style='color: red;'>Username atau Password Salah!</p>";
                }
            ?>
            <form action="" method="post" class="form__form">
                <div class="form__box">
                    <input type="text" name="username" placeholder="Username" class="form__input" required>
                </div>

                <div class="form__box">
                    <input type="password" name="password" placeholder="Password" class="form__input" required>
                </div>

                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Save this username</label>
                </div>
                <input type="submit" name="login" value="Login" class="form__button button">
                <div>
                    <hr><br>
                    <p>Click here if you don't have an account!</p>
                    <a href="../file/register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>