<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections|HRQM</title>
    <link rel="stylesheet" href="../css/style.css">
     <!-- icons -->
     <script src="https://unpkg.com/feather-icons"></script>
     <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
     <!-- Navbar Start -->
    <nav class="navbar">
        <a href="easteregg.php" class="navbar-logo">
            <img src="../img/logo3.png" alt="">
        </a>
    
   <div class="navbar-nav">
    <a href="#home">Home</a>
    <a href="#collection">Collections</a>
    <a href="#contact">Contact</a>

    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a href="../admin/manage-products.php">Sanctum</a>
    <?php endif; ?>
</div>

    <div class="navbar-extra">

    <a id="search">
        <i data-feather="search"></i>
    </a>

    <a href="../cart/cart.php">
        <i data-feather="shopping-cart"></i>
    </a>

    <?php
    if(isset($_SESSION['username'])){
    ?>
        <a href="logout.php">
            <i data-feather="log-out"></i>
        </a>
    <?php
    }
    ?>

    <a id="hamburger-menu">
        <i data-feather="menu"></i>
    </a>

</div>
    </nav>
    <!-- Navbar end -->
     <div class="search-form">
    <input
    type="text"
    id="search-box"
    placeholder="Search collection...">
</div>

<!-- Hero section start -->
    <section class="hero1" id="home">
        <main class="hero-content1">
            <h1>WELCOME,<span>FORGOTTEN</span> SOUL.</h1>
            <p>☾ You belong here.</p>
            <!-- <a href="clublogin.php" class="cta">Join the club 𖤐</a> -->
        </main>
    </section>
    <!-- Hero section end -->

    <!-- collection section start -->
    <section id="collection" class="collection">
        <h2>Collections</h2>
        <div class="row">
            <?php
include '../config/config.php';

$query = mysqli_query(
    $conn,
    "SELECT * FROM products"
);

while($produk = mysqli_fetch_assoc($query)){
?>
<div class="collection-card">

    <img
    src="../img/<?php echo $produk['gambar']; ?>"
    alt="<?php echo $produk['nama_produk']; ?>">

    <h3 class="product-name">
        <?php echo $produk['nama_produk']; ?>
    </h3>

    <p>
        <?php echo $produk['deskripsi']; ?>
    </p>

    <h4>
        Rp <?php echo number_format($produk['harga'],0,',','.'); ?>
    </h4>

    <a href="../cart/add_cart.php?id=<?php echo $produk['id']; ?>" class="cta">
        Shop Now
    </a>

</div>
<?php
}
?>
    </section>
    <!-- collection section End -->
     <!-- Contact section start -->
     <section id="contact" class="contact">
        <h2>Contact</h2>
        <p>Questions, collaborations, or simply a message from another lost soul? Reach out and become part of the Hollow Requiem story.</p>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63709.55260437382!2d98.46000390849605!3d3.622409177919707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030d60114970f8d%3A0x3039d80b220cbd0!2sBinjai%2C%20Kota%20Binjai%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1780986412750!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form>
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="Your Name" required>
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                <input type="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <i data-feather="message-square"></i>
                    <textarea placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="cta">Send Message</button>
            </form>
            
        </div>
    </section>
     <!-- Contact section end -->

    <!-- footer section start -->
    <footer>

        <div class="judul">
            <p>⛧For the forgotten. For the lost. For those who never belonged.⛧</p>

        </div>

        <div class="socials">
            <a href="https://www.instagram.com/suck__lyn/" target="_blank"><i data-feather="instagram"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100089749050342" target="_blank"><i data-feather="facebook"></i></a>
            <a href="https://x.com/JupriWolfgang" target="_blank"><i data-feather="twitter"></i></a>
        </div>


        <div class="credit">
            <p>Created by <a href="us.php" class="tujuh">Suclyn</a> | &copy; 2026 All Rights Reserved.</p>
        </div>
    </footer>
    <!-- footer section end -->
<!-- Icons -->
    <script>
    lucide.createIcons();
    </script>
    <script>
    feather.replace();
    </script>
    <script src="../js/script.js"></script>
    </body>
</body>
</html>