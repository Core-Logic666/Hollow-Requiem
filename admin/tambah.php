<?php
include '../config/config.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $harga = $_POST['harga'];

    mysqli_query(
        $conn,
        "INSERT INTO products (nama_produk, deskripsi, gambar, harga)
        VALUES ('$nama', '$deskripsi', '$gambar', '$harga')"
    );

    header("Location: product.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Artifact — Management</title>
    <link rel="stylesheet" href="../css/adminstyle.css"> 
</head>
<body>

    <h1>Add New Collection</h1>
    
    <ul>
        <li><a href="product.php">← Back to Dashboard</a></li>
    </ul>

    <form method="POST">

        <label style="display: block; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">PRODUCT NAME</label>
        <input type="text" name="nama" placeholder="e.g., Crimson Gothic Cloak" required>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">DESCRIPTION</label>
        <textarea name="deskripsi" placeholder="Describe the dark aesthetic of this piece..."></textarea>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">IMAGE FILENAME</label>
        <input type="text" name="gambar" placeholder="e.g., product1.jpg" required>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">PRICE (IDR)</label>
        <input type="number" name="harga" placeholder="e.g., 250000" required>

        <button name="submit" type="submit">Tambah</button>

    </form>

</body>
</html>