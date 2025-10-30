<?php
session_start();

if (!isset($_SESSION['user_id']) || strpos($_SESSION['user_nama'], '_adm') === false) {
    // Hanya admin yang boleh akses
    header("Location: login.php");
    exit;
}

$nama_user = $_SESSION['user_nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0; padding: 0; background: #f7f9fc;
        }
        .container {
            display: flex;
            min-height: 100vh;
            padding: 20px 40px;
            gap: 40px;
        }
        .left-panel {
            flex: 1;
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .left-panel img.logo {
            width: 160px;
            margin-bottom: 20px;
        }
        .left-panel h1 {
            font-size: 36px;
            margin: 0 0 10px;
            color: #2c3e50;
            letter-spacing: 3px;
        }
        .left-panel .tagline {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;  /* dikurangi supaya button tidak terlalu jauh */
            text-align: center;
            line-height: 1.4;
        }
        .left-panel .welcome-text {
            font-size: 20px;
            margin-bottom: 30px; /* geser ke atas */
            color: #34495e;
            text-align: center;
        }
        .btn-logout {
            background: #e74c3c;
            border: none;
            color: white;
            padding: 10px 18px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 0; /* pastikan button tepat di bawah tagline */
        }
        .btn-logout:hover {
            background: #c0392b;
        }
        .right-panel {
            flex: 1.5;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 8px #ccc;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            font-size: 18px;
            color: #2c3e50;
            font-weight: 600;
            cursor: pointer;
            transition: box-shadow 0.3s ease;
            user-select: none;
        }
        .card:hover {
            box-shadow: 0 0 15px #2980b9;
            color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="welcome-text">
                Selamat datang, <strong><?= htmlspecialchars($nama_user) ?></strong>
            </div> 
            <h1>LAUNDRY SERVICE</h1>
            <img src="assets/logo2.png" alt="Logo Laundry" class="logo" />
            
            <div class="tagline">Bersih, Wangi, Kilat</div>

            <button class="btn-logout" onclick="window.location.href='login.php'">Logout</button>
        </div>

        <div class="right-panel">
            <div class="card" onclick="window.location.href='manage_users.php'">
                Pengelolaan Data Pengguna
            </div>
            <div class="card" onclick="window.location.href='records.php'">
                Pencatatan
            </div>
            <div class="card" onclick="window.location.href='manage_orders.php'">
                Pengelolaan Pesanan
            </div>
            <div class="card" onclick="window.location.href='update_status.php'">
                Update Status Cucian
            </div>
            <div class="card" onclick="window.location.href='reports.php'">
                Laporan Transaksi
            </div>
            <div class="card" onclick="window.location.href='manage_services.php'">
                Manajemen Layanan & Harga
            </div>
        </div>
    </div>
</body>
</html>
