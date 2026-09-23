


<?php 
session_start();
include 'cek_session.php'; // proteksi halaman (dibahas di bagian 5)


include 'layouts/header.php';
include 'layouts/sidebar.php';
?>


  <main class="content">

            <section class="welcome">
                <h1>Selamat datang, <?php $_SESSION['username'] ?></h1>

                <p>
                    Senang melihat kamu kembali.
                </p>
            </section>

        </main>


<?php
include 'layouts/footer.php'
?>