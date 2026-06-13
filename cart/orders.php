<?php
session_start();
include '../config/config.php';

$username = $_SESSION['username'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM orders
     WHERE username='$username'
     ORDER BY id DESC"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoices</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <style>
        .order-history {
            max-width: 700px;
            margin-top: 20px;
        }
        .order-box {
            background-color: var(--bg-secondary);
            border-left: 3px solid var(--accent);
            border-top: 1px solid var(--border);
            border-right: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .order-box:hover {
            border-left-color: var(--accent-hover);
            box-shadow: 0 0 10px rgba(177,18,38,0.1);
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            font-family: 'Cinzel', serif;
            font-size: 1.1rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .order-id {
            color: var(--text);
        }
        .order-date {
            color: var(--text-muted);
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
        }
        .order-total {
            font-size: 1.2rem;
            color: var(--accent);
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <h1>Order History</h1>
    
    <ul>
        <li><a href="../php/collection.php">← Back to Collections</a></li>
        <li><a href="cart.php">View Cart</a></li>
    </ul>

    <div class="order-history">
        <?php 
        if(mysqli_num_rows($data) == 0) {
            echo "<p style='color: var(--text-muted); font-style: italic;'>No past rituals/orders found for this user.</p>";
        }
        
        while($o = mysqli_fetch_assoc($data)){ 
        ?>
            <div class="order-box">
                <div class="order-header">
                    <span class="order-id">Invoice #<?= $o['id']; ?></span>
                    <span class="order-date"><?= $o['tanggal']; ?></span>
                </div>
                <div style="font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase;">Total Amount Paid:</div>
                <div class="order-total">
                    Rp <?= number_format($o['total'], 0, ',', '.'); ?>
                </div>
            </div>
        <?php } ?>
    </div>

</body>
</html>