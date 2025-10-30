<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Koneksi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "laundry_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$layanan = $_POST['layanan'] ?? '';
$berat = (int) ($_POST['berat'] ?? 0);
$nomor_hp = $conn->real_escape_string($_POST['nomor_hp'] ?? '');
$alamat = $conn->real_escape_string($_POST['alamat'] ?? '');
$metode_pembayaran = $_POST['metode_pembayaran'] ?? '';
$catatan = $conn->real_escape_string($_POST['catatan'] ?? '');
$user_id = $_SESSION['user_id'];

// Validasi sederhana
if (!$layanan || $berat < 1 || !$nomor_hp || !$alamat || !$metode_pembayaran) {
    die("Data tidak lengkap, silakan isi semua field yang wajib.");
}

// Proses upload bukti transfer jika metode QRISH
$bukti_transfer_path = null;
if ($metode_pembayaran === "QRISH" && isset($_FILES['bukti_transfer']) && $_FILES['bukti_transfer']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['bukti_transfer']['tmp_name'];
    $fileName = $_FILES['bukti_transfer']['name'];
    $fileSize = $_FILES['bukti_transfer']['size'];
    $fileType = $_FILES['bukti_transfer']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedfileExtensions)) {
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $bukti_transfer_path = $dest_path;
        } else {
            die("Error saat mengupload file bukti transfer.");
        }
    } else {
        die("Format file bukti transfer tidak didukung. Gunakan jpg, jpeg, png, atau gif.");
    }
}

// Simpan data ke database
$stmt = $conn->prepare("INSERT INTO orders (user_id, layanan, berat, nomor_hp, alamat, metode_pembayaran, bukti_transfer, catatan, tanggal_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("isisssss", $user_id, $layanan, $berat, $nomor_hp, $alamat, $metode_pembayaran, $bukti_transfer_path, $catatan);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: riwayat.php?success=1");
    exit;
} else {
    die("Gagal menyimpan data order: " . $stmt->error);
}
