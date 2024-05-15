<!-- berikut adalah codingan keseluruhan untuk data siswa -->
<?php
// require funcion.php
// file funcions.php adalah file koneksi untuk menghubungkan antara data input ke database 
// dan dari database akan tampil di halaman data siswa
require 'funcions.php';
//ambil data dari database dgn tabel data siswa
$mahasiswa = query("SELECT * FROM mahasiswaubsi");
// Codingan dibawah ini adalah pencaharian data siswa. Pencahariannya berrdasarkan nama, nik, email, dan jurusan. 
if(isset($_POST["cari"])){
    $mahasiswa= cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- codingan ini menggunakan title Data Siswa dan link style menggunakan file styleform.css --> 
    <title>DATA SISWA</title>
    <link rel="stylesheet" href="styleform.css">
    <!-- dibawah ini adalah style tambahan untuk file data.php dengan class home -->
    <style>
        .home{
            bottom: 5px;
            left: 2px;
            
        }
        .container{
            border-left: 10px solid #D9DAD4;
            border-right: 10px solid #D9DAD4; 
        }
    </style>
</head>
<body >
    <!-- selanjutnya kita langsung ke body codingannya, disini ada div dengan class tob-bar  
    untuk mendesain bagian atas ujung website-->
    <div class="top-bar"></div>
    <!-- div dengan class container adalah isi contentnya  -->
    <div class="container" >
<!-- Selanjutnya, tag a dengan class instagram adalah logo sekolah yang memiliki 
link menuju instagram sekolah pelita cahaya  -->
        <a href="https://www.instagram.com/pelcah_shs/" class="instagram" ></a>
<!-- Div dengan class header 
        Div ini kegunaannya untuk bisa diberi style untuk judul dan tabel pada 
        file css, agar stylenya bisa kami desain sesuai apa yg kami mau.--> 
    <div class="header">
        <h1 align=center>DATA SISWA</h1><!-- Selanjutnya, judul websitenya menggunakan tag h1 -->
    </div>
<!--Pada halaman Data Siswa,codingan menggunakan tag table-->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" 
        autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" >
        <button type="submit" name="cari">Cari!</button>
        <br>
        <br>
        <hr>
    </form>
    <table border="1" cellpadding="20" cellspacing="3" width="900" align=center bgcolor="#A5A04A">
        <tr>
            <th>No</th>
            <th>Foto Siswa</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
    
        <?php $i = 1;?>
        <?php foreach($mahasiswa as $row):
        ?>
        <tr>
            <td><?= $i;?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" height ="80"></td>
            <td ><?= $row["nama"]; ?></td>
            <td><?= $row["nik"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- dan terakhir, terakhir footer untuk footer website. -->
        <div class="footer">
            <p class="copy">PELITA CAHAYA HIGHSCHOOL</p>
            <a href="http://localhost/websiteerto/websiteku/project1web/informasi.php" class="home" >HOME</a>
        </div>
        </div>
        
</body>
</html>