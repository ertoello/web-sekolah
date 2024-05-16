<?php
//Codingan ini adalah codingan untuk memanggil database di phpmyadmin dengan 
// nama host= localhost dengan username=root dengan password= tidak ada, dan nama_databasenya=password
$conn = mysqli_connect("localhost", "root", "", "password");
//codingan ini untuk mengambil inputan di file registrasi lalu disimpan di database
function registrasi($data){
    //memanggil $conn terlebih dahulu
    global $conn;
    //inputan diregistrasi, semua diberi variabel
    $nama=htmlspecialchars($data["nama"]);//untuk input nama divariabel dengan $nama
    $tempat=htmlspecialchars($data["tempat"]);//untuk input tempat lahir divariabel dengan $tempat
    $ttl=htmlspecialchars($data["ttl"]);//untuk input tanggal lahir divariabel dengan $ttl
    $username=strtolower(stripslashes($data["username"]));//untuk input username divariabel dengan $username
    $password=mysqli_real_escape_string($conn, $data["password"]);//untuk input password divariabel dengan $password
    $password2=mysqli_real_escape_string($conn, $data["password2"]);//untuk input password2 divariabel dengan $password2

    //codingan dibawah ini untuk mengecek username sudah ada atau belom!!!
    $result=mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){//Jika username ada didatabase,
        //maka akan diberi pesan javascript, yang tertera dibawah ini
        echo"<script>
            alert('Username Sudah Terdaftar!!!');
        </script>";
        return false;//codingan untuk menghentikan program,programnya berhenti sampai disini
    }
    //cek konfirmasi password
    if($password!== $password2){//Jika password1 tidak sama dengan password2, 
        //maka akan diberi pesan javascript, yang tertera dibawah ini
        echo "<script>
            alert('Konfirmasi Password Tidak Sesuai!!!');
        </script>";
        return false;//programnya berhenti sampai disini
    }
    //enksripsi password/ mengacak password berfungsi untuk keamanan password
    //pengacakan password dilakukan menggunakan algoritma password_hash
    $password= password_hash($password, PASSWORD_DEFAULT);
    //dan yang terakhir adalah jika semuanya berhasil, inputannya berhasil menambahkan ke database
    //codingan dibawah ini adalah menambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$tempat', '$ttl', '$username', '$password')");
    return mysqli_affected_rows($conn);
}

?>