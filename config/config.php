<?php
// config/db.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "hrqm_brand"; // Sesuaikan dengan nama DB kalian

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("[DATABASE ERROR]: Connection failed - " . mysqli_connect_error());
}