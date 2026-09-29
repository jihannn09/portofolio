 <?php
session_start();

// Proteksi halaman
include 'cek_session.php';

// Header
include 'layouts/header.php';

// Sidebar
include 'layouts/sidebar.php';
?>

<main class="content">

    <!-- Isi dashboard -->
    <section class="welcome">
        <h1>
            Selamat datang, <?php echo $_SESSION['username']; ?> ♡
        </h1>

        <p>
            Senang melihat kamu kembali.
        </p>
    </section>

</main>

<?php
// Footer
include 'layouts/footer.php';
?>