<?php
session_start();
include 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Cek password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nama'] = $user['nama'];
            $_SESSION['user_email'] = $user['email'];

            // Cek jika email adalah Gmail dan nama ada "_adm" di belakang
            $isGmail = preg_match('/@gmail\.com$/i', $email);
            $isAdmin = substr($user['nama'], -4) === '_adm';

            if ($isGmail && $isAdmin) {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: home.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Password salah.";
        }
    } else {
        $_SESSION['error'] = "Email tidak ditemukan.";
    }
    header("Location: login.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>
