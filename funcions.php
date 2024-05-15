<?php
//Codingan ini adalah codingan untuk memanggil database di phpmyadmin dengan 
// nama host= localhost dengan username=root dengan password= tidak ada, dan nama_databasenya=password
$conn = mysqli_connect("localhost", "root", "", "phpdasar1");
//codingan dibawah ini untuk mengambil inputan di file registrasi lalu disimpan di database
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;   
    }
    return $rows;
}
// Codingan dibawah ini adalah codingan untuk tambah data, dimana data inputannya, akan masuk ke database
function tambah($data){
    global $conn;   
    $nama=htmlspecialchars($data["nama"]);
    $nik=htmlspecialchars($data["nik"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    
    $gambar=upload();
    if(!$gambar){
        return false;
    }
    
    $query= "INSERT INTO mahasiswaubsi
                VALUES
                ('','$nama', '$nik','$email','$jurusan','$gambar')
                ";
                mysqli_query($conn,$query);

                return mysqli_affected_rows($conn); 
}
// codingan dibawah ini adalah codingan untuk mengupload gambar, dan akan tampil di halaman data siswa
function upload(){
    $namaFile = $_FILES['gambar']['name'];  
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];    
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if($error===4){
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid=['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar= strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
            alert('Yang Anda Upload Bukan Gambar!');
        </script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
            alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
    }
    //lolos pengecekkan, gambar siap diupload
    //generate nama gambar baru

    $namaFileBaru= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
    return $namaFileBaru;
}
// Codingan dibawah ini adalah codingan utk pencaharian sebuah data di database berdasarkan
// nama, nik, email, jurusan
function cari($keyword){
    $query = "SELECT * FROM mahasiswaubsi WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR 
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    return query($query);
}
?>