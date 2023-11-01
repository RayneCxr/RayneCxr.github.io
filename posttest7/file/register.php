<?php
session_start();
require '../aksi/koneksi.php';

if(isset($_POST['register'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if($pass === $cpass) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$name'");

        if(mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('Username Sudah Ada!');
                document.location.href = 'register.php';
            </script>";
        } else {
            $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$pass')");

            if(mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        alert('Register Berhasil!!');
                        document.location.href = 'login.php';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Register Gagal!');
                        document.location.href = 'register.php';
                    </script>";
            }
        }
    } else {
        echo "
            <script>
                alert('Password Tidak Sama!');
                document.location.href = 'register.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style3.css">
</head>
<body>
    <div class="form__container grid">
        <div class="form__mail">
            <h1 class="form__title">Register</h1><hr>
            <form action="" method="post" class="form__form">
                <div class="form__group">
                    <div class="form__box">
                        <input type="text" name="username" class="form__input" placeholder="Username" required>
                    </div>

                    <div class="form__box">
                        <input type="password" name="password" class="form__input" placeholder="Password"  required>
                    </div>

                    <div class="form__box">
                        <input type="password" name="cpassword" class="form__input" placeholder="Confirm Password"  required>
                    </div>

                    <div class="remember">
                        <input type="checkbox" name="remember" value="true">
                        <label for="remember">Save this username</label>
                    </div>
                    <input type="submit" name="register" value="Register" class="form__button button">
                </div>
            </form>
        </div>
    </div>
</body>
</html>