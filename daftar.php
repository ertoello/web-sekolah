<?php
require 'funcions.php';

if( isset($_POST["submit"])){
    if( tambah($_POST) > 0 ){
        echo "
            <script>
            alert('Selamat!!! data anda diterima. Terima Kasih, telah terdaftar.');
            document.location.href = 'data.php';
            </script>
        ";    
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'daftar.html';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM DAFTAR SISWA</title>
    <link rel="icon" href="img/logo7.png" type="image/x-icon"> <!-- Ganti dengan file favicon Anda -->
    <link rel="stylesheet" href="styleform.css">
</head>
<body>

<div class="top-bar"></div>

<div class="container">
    <a href="https://www.instagram.com/pelcah_shs/" class="instagram" target="_blank"></a>

    <div class="header">
        <h1>Form Pendaftaran Siswa</h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" id="jurusan">
                <option>IPA</option>
                <option>IPS</option>
            </select>
        </div>

        <div class="form-group">
            <label for="gambar">Foto Profil:</label>
            <input type="file" name="gambar" id="gambar">
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn-submit">Tambah Data</button>
        </div>
    </form>

    <div class="footer">
        <p class="copy">PELITA CAHAYA HIGHSCHOOL</p>
        <a href="index.html" class="home">HOME</a>
    </div>
</div>

</body>
</html>
