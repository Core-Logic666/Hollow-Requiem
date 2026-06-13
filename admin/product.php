<?php
session_start();
include '../config/config.php';

$data = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manage Collections</title>
    <link rel="stylesheet" href="../css/adminstyle.css"> </head>
<body>

<h1>Manage Collections</h1>
<ul>
    <li><a href="tambah.php">Tambah Produk</a></li>
    <li><a href="../php/collection.php">Collections</a></li>
</ul>

<table>
<tr>
    <th>ID</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>

<?php while($p = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $p['id']; ?></td>
    <td><img src="../img/<?= $p['gambar']; ?>" width="100"></td>
    <td><?= $p['nama_produk']; ?></td>
    <td>Rp <?= number_format($p['harga']); ?></td>
    <td>
        <a href="edit.php?id=<?= $p['id']; ?>">Edit</a> | 
        <a href="hapus.php?id=<?= $p['id']; ?>" onclick="return confirm('Hapus produk?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>