<?php
session_start();
include '../config/config.php';
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Crypt — Cart</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <style>
        /* Custom internal style khusus halaman cart */
        .cart-container {
            max-width: 800px;
            margin-top: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            background-color: var(--card);
            border: 1px solid var(--border);
            padding: 20px;
            margin-bottom: 15px;
            gap: 20px;
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            border-color: var(--accent);
            box-shadow: 0 0 10px var(--glow);
        }
        .cart-item img {
            border: 1px solid var(--border);
            filter: grayscale(30%);
        }
        .cart-details {
            flex: 1;
        }
        .cart-details h3 {
            font-family: 'Cinzel', serif;
            font-size: 1.2rem;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        .cart-details p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }
        .remove-btn {
            color: #551111;
            text-decoration: none;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid transparent;
            padding: 8px 12px;
            transition: all 0.2s ease;
        }
        .remove-btn:hover {
            color: var(--accent-hover);
            border-color: var(--accent);
            box-shadow: 0 0 8px var(--glow);
        }
        .cart-summary {
            margin-top: 30px;
            padding: 20px;
            border-top: 2px dashed var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-summary h2 {
            font-family: 'Cinzel', serif;
            letter-spacing: 1px;
        }
        .cart-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        .btn-secondary {
            display: inline-block;
            text-decoration: none;
            background-color: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
            padding: 12px 24px;
            font-family: 'Cinzel', serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            color: var(--text);
            border-color: var(--text-muted);
        }
        .btn-checkout {
            display: inline-block;
            text-decoration: none;
            background-color: var(--accent);
            color: var(--text);
            border: 1px solid var(--accent);
            padding: 12px 30px;
            font-family: 'Cinzel', serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s ease;
        }
        .btn-checkout:hover {
            background-color: var(--accent-hover);
            box-shadow: 0 0 15px var(--glow);
        }
    </style>
</head>
<body>

    <h1>Your Cart</h1>
    
    <ul>
        <li><a href="../php/collection.php">← Continue Shopping</a></li>
        <li><a href="orders.php">View Orders History</a></li>
    </ul>

    <div class="cart-container">
        <?php
        $total = 0;

        if(empty($cart)){
            echo "<p style='color: var(--text-muted); font-style: italic;'>Your cart is currently empty as a tomb.</p>";
        } else {
            // Memperbaiki logical bug: loop sekali aja per baris session cart
            foreach($cart as $index => $id){
                $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
                $p = mysqli_fetch_assoc($query);

                if(!$p){
                    continue;
                }
                $total += $p['harga'];
        ?>
                <div class="cart-item">
                    <img src="../img/<?= $p['gambar']; ?>" width="100" alt="Product">
                    
                    <div class="cart-details">
                        <h3><?= $p['nama_produk']; ?></h3>
                        <p>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></p>
                    </div>

                    <a href="remove_cart.php?index=<?= $index ?>" class="remove-btn">
                        ✕ Remove
                    </a>
                </div>
        <?php 
            } // End foreach
        ?>
            
            <div class="cart-summary">
                <h2>Total Amount:</h2>
                <h2 style="color: var(--accent); text-shadow: 0 0 10px var(--glow);">
                    Rp <?= number_format($total, 0, ',', '.'); ?>
                </h2>
            </div>

            <div class="cart-actions">
                <a href="clear_cart.php" class="btn-secondary" onclick="return confirm('Purge all items from cart?')">Clear Cart</a>
                <a href="checkout.php" class="btn-checkout">Proceed to Checkout →</a>
            </div>
        <?php 
        } // End else
        ?>
    </div>

</body>
</html>