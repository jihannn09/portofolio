<!--  
    <div class="layout">

        <aside class="sidebar">
            <h3>Menu ♡</h3>

            <a href="dashboard.php">⌂ Beranda</a>
            <a href="biodata.php">♡ Profil</a>
            <a href="keahlian.php">✿ Keahlian</a>
            <a href="pendidikan.php">❀ Pendidikan</a>
            <a href="karya.php" >✦ Karya</a>
        </aside>
-->


<?php
// Tentukan halaman sekarang
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar -->
<div class="layout">

    <aside class="sidebar">

        <h3>Menu ♡</h3>

        <a href="dashboard.php"
           <?php if ($current_page == 'dashboard.php') echo 'class="aktif"'; ?>>
            ⌂ Beranda
        </a>

        <a href="biodata.php"
           <?php if ($current_page == 'biodata.php') echo 'class="aktif"'; ?>>
            ♡ Profil
        </a>

        <a href="keahlian.php"
           <?php if ($current_page == 'keahlian.php') echo 'class="aktif"'; ?>>
            ✿ Keahlian
        </a>

        <a href="pendidikan.php"
           <?php if ($current_page == 'pendidikan.php') echo 'class="aktif"'; ?>>
            ❀ Pendidikan
        </a>

        <a href="karya.php"
           <?php if ($current_page == 'karya.php') echo 'class="aktif"'; ?>>
            ✦ Project
        </a>

    </aside>

         