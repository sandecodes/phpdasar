<?php 

require '../functions.php';
$students = cari($_GET["keyword"]);

?>

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