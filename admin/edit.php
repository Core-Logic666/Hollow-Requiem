<?php

include '../config/config.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM products
     WHERE id='$id'"
);

$p = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){

    mysqli_query(
        $conn,
        "UPDATE products SET
        nama_produk='$_POST[nama]',
        deskripsi='$_POST[deskripsi]',
        gambar='$_POST[gambar]',
        harga='$_POST[harga]'
        WHERE id='$id'"
    );

    header("Location: product.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Artifact — Management</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>

    <h1>Modify Collection</h1>
    
    <ul>
        <li><a href="product.php">← Cancel & Back</a></li>
    </ul>

    <form method="POST">

        <label style="display: block; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">PRODUCT NAME</label>
        <input type="text" name="nama" value="<?= $p['nama_produk']; ?>" required>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">DESCRIPTION</label>
        <textarea name="deskripsi" placeholder="Describe the dark aesthetic of this piece..."><?= $p['deskripsi']; ?></textarea>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">IMAGE FILENAME</label>
        <input type="text" name="gambar" value="<?= $p['gambar']; ?>" required>

        <label style="display: block; margin-top: 15px; margin-bottom: 5px; font-size: 0.8rem; color: var(--text-muted);">PRICE (IDR)</label>
        <input type="number" name="harga" value="<?= $p['harga']; ?>" required>

        <button name="submit" type="submit">Update Artifact (Simpan)</button>

    </form>

</body>
</html>