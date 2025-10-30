<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$nama_user = $_SESSION['user_nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Beranda - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    
</head>
<body>
    <div class="container">
        <div class="left-box">
            <div class="top-row">
                <div class="notification" title="Notifikasi">
                    <i class="fa-regular fa-bell"></i>
                </div>
                <div class="welcome-text">
                    Selamat datang, <br>
                    <span><?= htmlspecialchars($nama_user) ?></span>
                </div>
            </div>

            <div class="welcome-subtext">Laundry Service</div>

            <img src="assets/logo2.png" alt="Logo Laundry" class="logo-large" />

            <div class="tagline">Bersih, Wangi, Kilat,<br/>Cuci Tanpa Ribet!</div>

            <button class="btn-order" onclick="window.location.href='order.php'">Order Now</button>


            <div class="header-right">
                <button class="btn-logout" onclick="window.location.href='login.php'">Logout</button>
            </div>
        </div>

        <div class="right-box">
            <div class="icon-row">
            
                <a href="riwayat.php" class="icon-box" title="Riwayat">
    <i class="fa-solid fa-clock-rotate-left"></i>
                <a href="mesin.php" class="icon-box" title="Mesin Cuci">
    <i class="fa-solid fa-soap"></i>
                <a href="about.php" class="icon-box" title="About">
    <i class="fa-solid fa-info-circle"></i>
</a>
                <div class="icon-box" title="Pakaian">
                    <i class="fa-solid fa-shirt"></i>
                </div>
            </div>

            <img src="assets/ibu.png" alt="Ibu Menyetrika" />
        </div>
    </div>
</body>
</html>
