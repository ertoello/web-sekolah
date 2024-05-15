<!-- berikut adalah codingan keseluruhan untuk form daftar siswa -->
<?php
require 'funcions.php';
// require funcion.php
// file funcions.php adalah file koneksi untuk menghubungkan antara data input ke database 
// dan dari database akan tampil di halaman data siswa

// ketika tombol submit dipencet, program mengecek dulu apakah input yang di simpan  
//di $_POST berhasil apa tidak
if( isset($_POST["submit"])){
    // Jika berhasil,
//akan munculnya pesan javascript, yang tertera dibawah ini
if( tambah($_POST)> 0 ){
    echo "
        <script>
        alert('Selamat!!! data anda diterima. Terima Kasih, telah terdaftar.');
        document.location.href = 'data.php';
        </script>
    ";    
}else{//=> Jika gagal,
//akan munculnya pesan javascript, yang tertera dibawah ini
    echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'daftar.php';
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
    <!-- codingan ini menggunakan title form daftar siswa dan link style menggunakan file styleform.css -->
    <title>FORM DAFTAR SISWA</title>
    <link rel="stylesheet" href="styleform.css">
</head>
<body>
    <!-- selanjutnya, kita langsung ke body codingannya. 
    disini ada div dengan class tob-bar  
    untuk mendesain bagian atas ujung website.-->
    <div class="top-bar"></div>
<!-- div dengan class container adalah isi contentnya  -->
<div class="container">
        <a href="https://www.instagram.com/pelcah_shs/" class="instagram" target="_blank"></a>
    <div class="header">
        <h1 align=center>FORM DAFTAR SISWA</h1><!-- Selanjutnya, judul websitenya menggunakan tag h1 -->
    </div>
<!--Pada halaman form daftar siswa,codingan menggunakan tag table-->   
    <form action="" method="post" enctype="multipart/form-data">
        <table border="3" width="700" cellspacing="10" cellpadding="25" align="center" bgcolor="#A5A04A">
<!--codingan ini Untuk Membuat text field NIK-->
    <tr>
        <td>
            <label for="nik">NIK    :</label></td>
        <td><input type="text" name="nik" id="nik" size="30"
            required>
        </td>
    </tr>
<!--codingan ini Untuk Membuat text field Nama-->
    <tr>
        <td>
            <label for="nama">Nama  :</label></td>
        <td><input type="text" name="nama" id="nama" size="30"
            required>
        </td> 
    </tr>
<!--codingan ini Untuk Membuat text field Email-->
    <tr>
        <td>
            <label for="email">Email    :</label></td>
        <td><input type="text" name="email" id="email" size="30">
        </td>
</tr>
<!--codingan ini Untuk Membuat text field Jurusan-->
<tr>
    <td>
        <label for="jurusan">Jurusan    :</label >
    </td>
    <td><select name="jurusan" id="jurusan" >
        <option >IPA</option>
        <option >IPS</option>
        </select>
    </td>
</tr>
<!--codingan ini Untuk Membuat inputan file gambar-->
    <tr>
        <td>
            <label for="gambar">Foto Profil  :</label></td>
        <td><input type="file" name="gambar" id="gambar">
        </td>
</tr>
<!--codingan ini Untuk Membuat tombol Tambahkan Data-->
<tr>
    
    <td colspan="2">
        <center>
            <button type="submit" name="submit">TAMBAHKAN DATA!!!</button>
        </center>
    </td>
</tr>
    </form>
</table>
<!-- dan terakhir, ada div dengan kelas footer untuk mendesain footer.-->
        <div class="footer">
            <p class="copy">PELITA CAHAYA HIGHSCHOOL</p>
            <a href="http://localhost/websiteerto/websiteku/project1web/informasi.php" class="home" >HOME</a>
        </div>
        </div>
</body>
</html>