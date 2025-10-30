<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 class="title">LAUNDRY SERVICE</h1>
            <img src="assets/logo.png" alt="Logo" class="logo" />

            <form action="login_process.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" required placeholder=" " />
                    <label>Email</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required placeholder=" " />
                    <label>Password</label>
                </div>

                <div class="options">
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login"><span>Login</span></button>

                <p style="font-size:14px; margin-bottom: 8px;">
                    Don't have an account yet? 
                    <a href="register.php" style="color: red; text-decoration: none; cursor: pointer;">Create Account</a>
                </p>
            </form>
        </div>

        <div class="image-box">
            <img src="assets/ibu.png" alt="Ibu Menyetrika" />
            <ul class="notes">
              <li><i class="fa-solid fa-truck"></i> Antar jemput</li>
              <li><i class="fa-solid fa-lock"></i> Aman terpercaya</li>
              <li><i class="fa-solid fa-wind"></i> Parfum premium</li>
              <li><i class="fa-solid fa-clock"></i> Selesai dalam 24 jam</li>
            </ul>
        </div>
    </div>
</body>
</html>
