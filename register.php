<?php
// Include koneksi database
include 'db/config.php';

// Proses form saat submit POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp    = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Cek apakah nama berakhiran '_adm' untuk role admin
    if (substr($nama, -4) === '_adm') {
        $role = 'admin';
    } else {
        $role = 'user';
    }

    // Query insert data, tambahkan kolom role
    $query = "INSERT INTO users (nama, email, password, no_hp, alamat, role) 
              VALUES ('$nama', '$email', '$password', '$no_hp', '$alamat', '$role')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Akun berhasil didaftarkan! Silakan login.'); window.location.href='login.php';</script>";
        exit;
    } else {
        echo "<script>alert('Pendaftaran gagal: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="container">
        <!-- Kiri: Logo dan tag -->
        <div class="image-box">
            <h1 class="title">LAUNDRY SERVICE</h1>
            <img src="assets/logo.png" alt="Logo Laundry" class="logo-large" />
            <p class="tagline">Bersih, Wangi, Kilat.<br/>Cuci Tanpa Ribet!</p>
        </div>

        <!-- Kanan: Form pendaftaran -->
        <div class="form-box">
            <h2 class="form-title">DAFTAR AKUN</h2>
            <form action="register.php" method="POST">
                <div class="input-group">
                    <input type="text" name="nama" required placeholder=" " />
                    <label>Nama Lengkap</label>
                </div>

                <div class="input-group">
                    <input type="email" name="email" required placeholder=" " />
                    <label>Email (Gmail)</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required placeholder=" " />
                    <label>Password</label>
                </div>

                <div class="input-group">
                    <input type="text" name="no_hp" required placeholder=" " />
                    <label>Nomor HP</label>
                </div>

                <div class="input-group">
  <textarea name="alamat" rows="3" required placeholder=" "></textarea>
  <label>Alamat</label>
</div>


                <button type="submit" class="btn-login"><span>Daftar</span></button>

                <p style="font-size: 14px; margin-top: 8px;">
                    Sudah punya akun? 
                    <a href="login.php" style="color: red; text-decoration: none;">Login di sini</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
