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
    <title>About - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .about-container {
            display: flex;
            height: 100vh;
        }

        .about-left {
            width: 50%;
            padding: 60px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo-about {
            width: 250px;
            margin-bottom: 20px;
        }

        .about-title {
            font-size: 40px;
            margin-bottom: 10px;
            color: #004085; /* Warna biru disamakan */
        }

        .about-tagline {
            font-size: 18px;
            margin-bottom: 40px;
            text-align: center;
            color: #555;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 24px;
            background-color:rgb(212, 93, 20);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #003066;
        }

        .about-right {
            width: 50%;
            padding: 60px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-box {
            padding: 30px;
            border-radius: 16px;
            border: 2px solid #004085;
            background-color: transparent;
        }

        .info-box h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 24px;
            color: #004085;
        }

        .info-box ul {
            list-style: none;
            padding-left: 0;
            font-size: 16px;
            color: #004085;
        }

        .info-box ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="about-container">
        <div class="about-left">
            <h1 class="about-title">Laundry Service</h1>
            <img src="assets/logo2.png" alt="Logo" class="logo-about" />
            
            <p class="about-tagline">Bersih. Wangi. Kilat. Cuci tanpa ribet!</p>
            <a href="home.php" class="btn-back"><span>Kembali</span></a>
        </div>

        <div class="about-right">
            <div class="info-box">
                <h2>Pemberitahuan</h2>
                <ul>
                    <li>Minimal DP 50%</li>
                    <li>Info contact admin</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
