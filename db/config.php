<?php
$host = "localhost";
$user = "root";    // sesuaikan username
$pass = "";        // sesuaikan password
$db   = "laundry_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
