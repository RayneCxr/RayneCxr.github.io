<?php
require "../aksi/koneksi.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM posttest where id=$id");

$posttest = [];

while ($row = mysqli_fetch_assoc($result)){
    $posttest[] = $row;
}

$posttest = $posttest[0];


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $foto = $_FILES['foto']['name'];

    $tanggal = date('Y-m-d h-i-s');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));

    $new_foto = "$tanggal.$name.$ekstensi";
    $tmp = $_FILES['foto']['tmp_name'];


    if (move_uploaded_file($tmp, "../img/".$new_foto)) {
        $result = mysqli_query($conn, "UPDATE posttest SET name = '$name', email = '$email', subject='$subject', foto = '$new_foto', message = '$message' WHERE id = '$id' ");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil Diubah!');
                document.location.href = 'dashboard.php'
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'edit.php'
            </script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
    <link rel="stylesheet" href="../style2.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Comment</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $posttest['name']?>" class="textfield">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $posttest['email']?>" class="textfield">
                <label for="subject">Subject</label>
                <input type="text" name="subject" value="<?php echo $posttest['subject']?>" class="textfield">
                <label for="foto">foto</label>
                <input type="file" name="foto" class="textfield">
                <label for="message">Message</label>
                <input type="text" name="message" value="<?php echo $posttest['message']?>" class="textfield">
                <input type="submit" name="edit" value="Kirim" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>