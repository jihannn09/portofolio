<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // asumsi sudah ada proses cek ke database
    if ($username == 'admin' && $password == '12345') {

        // simpan data ke session
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        
    
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah';

    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">

  <!-- Agar tampilan menyesuaikan ukuran HP/laptop -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>

  <!-- Menghubungkan HTML dengan CSS -->
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <!-- Tempat bunga jatuh -->
  <div id="hiasan-login"></div>

  <!-- Halaman utama login -->
  <main class="login-page">

    <!-- Kotak form login -->
    <div class="login-card">

      <!-- Logo -->
      <div class="logo">
        ♡
      </div>

      <!-- Tulisan kecil -->
      <p class="eyebrow">
        PROFIL PUBLIK
      </p>

      <!-- Judul login -->
      <h1>
        Selamat datang ♡
      </h1>

      <!-- Keterangan -->
      <p class="subtitle">
        Silakan masuk untuk melanjutkan.
      </p>

      <!-- Form email dan password -->
      <form id="loginForm" action="login.php" method="POST">
        
    
        <!-- Pesan error -->
        <?php if (!empty($error)): ?>
            <p style="
                color: #c56b82;
                background: #fff0f4;
                border: 1px solid #f3c6d2;
                padding: 10px 14px;
                border-radius: 12px;
                margin-bottom: 15px;
                text-align: center;
                font-size: 14px;
            ">
                ♡ <?php echo $error; ?>
            </p>
        <?php endif; ?>



        <!-- Input email -->
        <div class="input-group">
          <label for="email">Username</label>

          <input
            id="username"
            name="username"
            placeholder="Masukkan username"
            required
          >
        </div>

        <!-- Input password -->
        <div class="input-group">
          <label for="password">Password</label>

          <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            required
          >
        </div>

        <!-- Tombol login -->
        <button type="submit" id="loginButton">

          <!-- Tulisan sebelum login -->
          <span id="buttonText">
            Masuk ♡
          </span>

          <!-- Tulisan saat proses login -->
          <span id="loadingText" hidden>
            Tunggu sebentar... ✦
          </span>

        </button>

      </form>

      <!-- Tombol kembali ke profil -->
      <a href="profil.html" class="kembali">
        ← Kembali ke Profil
      </a>

    </div>

  </main>

  <!-- Menghubungkan HTML dengan JavaScript -->
  <script src="login.js"></script>


  
</body>
</html>


