
<?php
session_start();
include 'cek_session.php';
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<!-- Hubungkan CSS --> 
<link rel="stylesheet" href="layouts/admin.css">

<main class="content">

    <div class="judul-halaman">
        <div>
            <span class="label-kecil">♡ PROFIL</span>
            <h1>Data Biodata</h1>
            <p>Kelola informasi yang tampil di profil publik kamu.</p>
        </div>

        <button class="btn-tambah">＋ Tambah Konten</button>
    </div>

    <!-- Data biodata -->
    <section class="admin-card biodata-card">

        <div class="foto-admin">
            <img src="LoopyCurrentOutfit.webp" alt="Foto profil">
        </div>

        <div class="data-biodata">

            <div class="data-item">
                <span>Nama</span>
                <strong>Jihann ♡</strong>
            </div>

            <div class="data-item">
                <span>Username</span>
                <strong>@qnitajhn</strong>
            </div>

            <div class="data-item">
                <span>Status</span>
                <strong>Sedang belajar dan berkarya</strong>
            </div>

            <div class="data-item">
                <span>Lokasi</span>
                <strong>📍 Indonesia</strong>
            </div>

            <div class="data-item full">
                <span>Deskripsi</span>
                <p>
                    Suka belajar hal baru, membuat sesuatu yang kreatif,
                    dan mencoba mengubah ide kecil menjadi sebuah karya.
                </p>
            </div>

            <div class="data-item full">
                <span>Instagram</span>
                <a href="https://www.instagram.com/qnitajhan_?igsi=MTdiYzd1cXJsczhiNA==">
                    @qnitajhan_ ↗
                </a>
            </div>

        </div>

        <div class="aksi">
            <button class="btn-edit">✎ Edit</button>
            <button class="btn-hapus">♡ Hapus</button>
        </div>

    </section>

</main>

<?php include 'layouts/footer.php'; ?>