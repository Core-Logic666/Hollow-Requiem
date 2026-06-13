<?php
session_start();
include '../config/config.php';

$cart = $_SESSION['cart'] ?? [];

if(empty($cart)){
    die("
    <link rel='stylesheet' href='style.css'>
    <div style='background: var(--card); border: 1px solid var(--accent); padding: 30px; text-align: center; margin-top: 50px; font-family: \"JetBrains Mono\", monospace;'>
        <h3 style='color: var(--accent); font-family: \"Cinzel\", serif; margin-bottom: 10px;'>TRANSACTION DENIED</h3>
        <p style='color: var(--text-muted);'>Your cart is empty.</p>
        <br><a href='cart.php' style='color: var(--text); text-decoration: underline;'>Go Back</a>
    </div>
    ");
}

$total = 0;
foreach($cart as $id){
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
    $p = mysqli_fetch_assoc($query);
    $total += $p['harga'];
}

$username = $_SESSION['username'];

mysqli_query($conn, "INSERT INTO orders (username, total) VALUES ('$username', '$total')");
unset($_SESSION['cart']);

// Tampilan sukses bergaya Gothic Box
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Ritual Complete</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 80vh;">
    <div style="background: var(--card); border: 1px solid var(--border); padding: 40px; text-align: center; max-width: 500px; box-shadow: 0 0 20px var(--glow);">
        <h2 style="font-family: 'Cinzel', serif; color: var(--text); letter-spacing: 2px; margin-bottom: 15px;">ORDER SECURED</h2>
        <p style="color: var(--text-muted); margin-bottom: 25px; font-size: 0.95rem;">Checkout berhasil! Item Anda telah dicatat ke dalam *invoice database*.</p>
        <a href="orders.php" class="btn-goth" style="display: inline-block; text-decoration: none; width: auto;">View Invoices</a>
    </div>
</body>
</html>