<?php
require 'funcions.php';
$mahasiswa = query("SELECT * FROM mahasiswaubsi");

if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA SISWA</title>
    <link rel="icon" href="img/logo7.png" type="image/x-icon"> <!-- Ganti dengan file favicon Anda -->
    <link rel="stylesheet" href="styleform.css">
    <!-- <style>
        /* Reset & Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font: 14px/1.6 Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Top Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 40px;
            background-color: #4f5d73;
            border-bottom: 10px solid #e0e0e0;
            z-index: 999;
        }

        /* Instagram Logo */
        .instagram {
            width: 60px;
            height: 60px;
            background-image: url(img/logo7.png);
            background-size: contain;
            background-repeat: no-repeat;
            display: block;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        /* Main Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 60px; /* Offset top bar */
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: bold;
            color: #2d2d2d;
        }


        /* Footer */
        .footer {
            background-color: #4f5d73;
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 0 0 10px 10px;
            margin-top: 30px;
        }

        .footer .copy {
            font-size: 14px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            margin-left: 20px;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header h1 {
                font-size: 28px;
            }

            input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            table {
                font-size: 12px;
            }
        }
    </style> -->
</head>
<body>
    <div class="top-bar"></div>
    <div class="container">
        <a href="https://www.instagram.com/pelcah_shs/" class="instagram" target="_blank"></a>
        <div class="header">
            <h1>DATA SISWA</h1>
        </div>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Siswa</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row): ?>
                <tr>
                    <td data-label="No"><?= $i; ?></td>
                    <td data-label="Foto Siswa"><img src="img/<?= $row["gambar"]; ?>" height="80"></td>
                    <td data-label="Nama"><?= $row["nama"]; ?></td>
                    <td data-label="NIK"><?= $row["nik"]; ?></td>
                    <td data-label="Email"><?= $row["email"]; ?></td>
                    <td data-label="Jurusan"><?= $row["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="footer">
        <p class="copy">PELITA CAHAYA HIGHSCHOOL</p>
        <a href="index.html" class="home">HOME</a>
    </div>
    </div>
</body>
</html>
