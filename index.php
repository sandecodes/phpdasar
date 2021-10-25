<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$students = query("SELECT * FROM students");

if(isset($_POST["cari"])) {
    $students = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <a href="logout.php">Logout!</a>
    
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" >Tambah Data</a>
    <br><br>
    <form action="" method="post">
        <input type="text" class="keyword" name="keyword" size="40" placeholder="Masukkan keyword pencarian..." autocomplete="off" autofocus>
        <button type="submit" name="cari" class="tombol-cari">Cari!</button>
    </form>
    <br>
    <div class="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php if(empty($students)) : ?>
                <tr>
                    <td colspan="7">
                        <p style="color: red; font-style: italic; font-weight: bold; text-align: center;">Data Tidak Ditemukan!!!</p>
                    </td>
                </tr>
            <?php endif; ?>

            <?php $no = 1; ?>
            <?php foreach ($students as $student) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $student["id"]; ?>">Ubah</a> || 
                    <a href="hapus.php?id=<?= $student["id"]; ?>" 
                    onclick="return confirm('Apakah anda yakin akan menghapus <?= $student['nama']; ?>')">Hapus</a>
                </td>
                <td>
                    <img src="img/<?= $student["gambar"]; ?>" width="50">
                </td>
                <td><?= $student["npm"]; ?></td>
                <td><?= $student["nama"]; ?></td>
                <td><?= $student["email"]; ?></td>
                <td><?= $student["jurusan"]; ?></td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>