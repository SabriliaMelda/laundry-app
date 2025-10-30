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
    <title>Layanan & Harga - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .mesin-container {
            display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 30px 60px;
    height: 100vh;
    background: linear-gradient(to bottom, #e6f0fa, #62b9f5);
    border-radius: 20px;
    box-sizing: border-box;
    gap: 80px; /* kecilkan gap */
        }

        .mesin-left {
            width: 50%;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        .mesin-left h1 {
            color: #004085;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .mesin-left p {
            font-size: 18px;
            color: #555;
            text-align: center;
            max-width: 400px;
            margin-bottom: 40px;
        }

        .logo-laundry {
            width: 300px;
            margin-bottom: 20px;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 24px;
            background-color:rgb(225, 135, 8);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color:rgb(204, 100, 3);
        }

        .mesin-right {
            width: 50%;
            padding: 60px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-box {
            background-color: #f8f9fa;
            border-left: 5px solid #004085;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .service-box h2 {
            margin: 0 0 10px;
            font-size: 22px;
            color: #004085;
        }

        .service-box p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="mesin-container">
        <div class="mesin-left">
            <h1>Laundry Service</h1>
            <img src="assets/logo2.png" alt="Logo Laundry" class="logo-laundry" />
            <p>Bersih. Wangi. Kilat. Cuci tanpa ribet! Pilih layanan yang sesuai dengan kebutuhanmu.</p>
            <a href="home.php" class="btn-back">Kembali</a>
        </div>

        <div class="mesin-right">
            <div class="service-box">
                <h2>Setrika Saja</h2>
                <p>Rp5.000 / kg</p>
            </div>
            <div class="service-box">
                <h2>Cuci Kering Lipat</h2>
                <p>Rp12.000 / kg</p>
            </div>
            <div class="service-box">
                <h2>Cuci Kering Setrika</h2>
                <p>Rp15.000 / kg</p>
            </div>
            <div class="service-box">
                <h2>Informasi Tambahan</h2>
                <p>- Estimasi selesai 24 jam<br>
                   - Layanan antar jemput tersedia<br>
                   - Gunakan parfum premium khusus laundry<br>
                   - Minimal pemesanan 2 kg
                </p>
            </div>
        </div>
    </div>
</body>
</html>
