<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$nama_user = $_SESSION['user_nama'];

$host = "localhost";
$dbname = "laundry_db";
$username = "root";  // sesuaikan username db kamu
$password = "";      // sesuaikan password db kamu

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY tanggal_order DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Riwayat Order - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0; padding: 20px;
            background-color: #f0f2f5;
        }
        .riwayat-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #004085;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        th, td {
            border: 1.5px solid #ddd;
            padding: 12px 15px;
            text-align: left;
            font-size: 15px;
            vertical-align: top;
        }
        th {
            background-color: #004085;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #555;
        }
        a.back-link {
            display: inline-block;
            margin-top: 20px;
            color: #004085;
            text-decoration: none;
            font-weight: 600;
        }
        a.back-link:hover {
            text-decoration: underline;
        }
        .status-lunas {
            color: green;
            font-weight: bold;
        }
        .status-belum-lunas {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="riwayat-container">
        <h1>Riwayat Order <?= htmlspecialchars($nama_user) ?></h1>

        <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Order</th>
                    <th>Layanan</th>
                    <th>Berat (kg)</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= date('d-m-Y H:i', strtotime($row['tanggal_order'])) ?></td>
                    <td><?= htmlspecialchars($row['layanan']) ?></td>
                    <td><?= htmlspecialchars($row['berat']) ?></td>
                    <td><?= htmlspecialchars($row['nomor_hp']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
                    <td><?= htmlspecialchars($row['metode_pembayaran']) ?></td>
                    <td>
                        <?php
                            if ($row['metode_pembayaran'] === 'Cash') {
                                echo '<span class="status-belum-lunas">BELUM LUNAS</span>';
                            } elseif ($row['metode_pembayaran'] === 'QRISH') {
                                echo '<span class="status-lunas">LUNAS</span>';
                            } else {
                                // Untuk metode lain, cek status selesai
                                if ($row['status'] === 'Selesai') {
                                    echo '<span class="status-lunas">LUNAS</span>';
                                } else {
                                    echo '<span class="status-belum-lunas">BELUM LUNAS</span>';
                                }
                            }
                        ?>
                    </td>
                    <td><?= nl2br(htmlspecialchars($row['catatan'])) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="no-data">Belum ada riwayat order.</div>
        <?php endif; ?>

        <a href="home.php" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
