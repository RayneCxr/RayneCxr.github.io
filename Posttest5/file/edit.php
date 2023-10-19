<?php
require "koneksi.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM posting where id=$id");

$posting = [];

while ($row = mysqli_fetch_assoc($result)){
    $posting[] = $row;
}

$posting = $posting[0];


if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    //upload gambar
    $gambar = $_FILES['gambar']['name'];
    date_default_timezone_set('Asia/Makassar');
    $tanggal = date("Y-m-d h-i-s");
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $gambar_terbaru = "$nama.$ekstensi";
    $tmp = $_FILES ['gambar']['tmp_name'];


    if(move_uploaded_file($tmp, "../img/".$gambar_terbaru)){
        $result = mysqli_query($conn, "UPDATE posting SET nama = '$nama', deskripsi='$deskripsi', gambar = '$gambar_terbaru' WHERE id = '$id' ");

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
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Comment</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $posting['nama']?>" class="textfield">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" value="<?php echo $posting['deskripsi']?>" class="textfield">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="textfield">
                <input type="submit" name="edit" value="Kirim" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>