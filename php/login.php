<?php
session_start();
include '../config/config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin'){
            header("Location: collection.php");
        }else{
            header("Location: collection.php");
        }

        exit;

    }else{
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HRQM Login</title>

<link rel="stylesheet" href="../css/style.css">
</head>

<body>
<section class="login" id="login">
<div class="login-box">

    <h1 style="font-family:'Special Elite';">HRQM LOGIN</h1>

    <?php if($error): ?>
        <div class="error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn">
            Login
        </button>

    </form>

</div>
</section>
</body>
</html>