<?php
require 'koneksi.php';//=>koneksi untuk menghubungkan ke database melalui file 'koneksi.php'
//=>ketika tombol login dipencet,program mengecek dulu apakah input yang di simpan di $_POST berhasil apa tidak
if( isset($_POST["login"])){
    //username dan password diberi variabel terlebih dahulu
    $username = $_POST["username"];
    $password = $_POST["password"];
    //cek username, apakah ada didatabease
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");
    if(mysqli_num_rows($result) === 1){//jika ada usename,maka
        //cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){//jika password sesuai dengan di database, 
//maka akan munculnya pesan javascript, yang tertera dibawah ini
            echo"
        <script>
            alert('Anda Memasuki Website Universitas Bina Sarana Informatika');
            alert('Selamat Datang, Selamat Bergabung Di Universitas Bina Sarana Informatika');
            document.location.href = 'utama.php';
        </script>
        ";
        }
    }
        $error= true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title><!-- dengan titlenya adalah Halaman Login -->
</head>
<body bgcolor= lightskyblue>
    <h1 align=center >LOGIN</h1>
    <?php if( isset($error))://Ketika Loginnya Dipencet Error/tidak berhasil,
    //Maka akan tampilnya teks dengan tag p, teksnya tertera seperti dibawah ini?>
    <p style="color:red; font-style:italic;" align=center>Username Dan Password Salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <table border="3" width="700" cellspacing="10" cellpadding="25" bgcolor = #F9F078 align=center>
<!--Pada halaman login,codingan menggunakan tag table-->
        <tr>
<!--codingan ini Untuk Membuat text field username-->
            <td>
                <label for="username">Username  :</label>
            </td>
            <td>
                <input type="text" name="username" id="username"
                required autocomplete="off">
            </td>
        </tr>
        <tr>
<!--codingan ini Untuk Membuat text field password-->
            <td>
                <label for="password">Password  :</label>
            </td>
                <td>
                    <input type="password" name="password" id="password" required autocomplete="off">
            </td>
        </tr>
        
        <tr>
<!--codingan ini Untuk Membuat tombol register-->
            <td colspan ="2">
                <center>
                <button type="submit" name="login">LOGIN</button>
                </center>
            </td>
        </tr>
        <tr>
<!--codingan ini Untuk Membuat text link.
Ketika kita mengarahkan kursor di 'klik disini' 
dan dipencet, maka akan diarahkan ke website halaman registrasi. Itu semua karna menggunakan Tag a-->        
            <td colspan ="2">
                <center>
                <P>Apakah Anda Belum Registrasi?<a href="http://localhost/websitedelfi/delfi/regis.php">Klik Disini</a></P>
                </center>
            </td>
        </tr>
        </table>
    </form>
</body>
</html>