
<?php
session_start();
include 'cek_session.php';
include 'layouts/header.php';
include 'layouts/sidebar.php';

// Data dummy sesuai kolom tabel pengguna
$biodata = [
    'id' => 1,
    'nama_lengkap' => 'Jihann',
    'nama_pengguna' => '@qnitajhn',
    'label_status' => 'SISWA • KREATIF',
    'status' => 'Belajar Web, Desain & Pemrograman',
    'bio' => 'Haii! Saya Jihan. Saya lumayan tertarik dengan dunia teknologi, desain, dan hal-hal kreatif. Saya lumayan suka mencoba hal baru dan membuat project kecil.',
    'lokasi' => 'Indonesia',
    'tautan_instagram' => 'https://www.instagram.com/qnitajhan_?igsi=MTdiYzd1cXJsczhiNA==',
    'foto_profil' => 'LoopyCurrentOutfit.webp'
];
?>

<main class="content">

    <div class="judul-halaman">
        <div>
            <span class="label-kecil">♡ PROFIL</span>
            <h1>Data Biodata</h1>
            <p>Kelola informasi yang tampil di profil publik kamu.</p>
        </div>

    </div>

    <!-- Data biodata -->
    <section class="admin-card biodata-card">

        <div class="foto-admin">
            <img
                src="<?php echo htmlspecialchars($biodata['foto_profil']); ?>"
                alt="Foto profil"
            >
        </div>

        <div class="data-biodata">

            <div class="data-item">
                <span>Nama Lengkap</span>
                <strong>
                    <?php echo htmlspecialchars($biodata['nama_lengkap']); ?> ♡
                </strong>
            </div>

            <div class="data-item">
                <span>Username</span>
                <strong>
                    <?php echo htmlspecialchars($biodata['nama_pengguna']); ?>
                </strong>
            </div>

            <div class="data-item">
                <span>Label Status</span>
                <strong class="label-profil">
                    <?php echo htmlspecialchars($biodata['label_status']); ?>
                </strong>
            </div>

            <div class="data-item">
                <span>Yang Sedang Ditekuni</span>
                <strong>
                    <?php echo htmlspecialchars($biodata['status']); ?>
                </strong>
            </div>

            <div class="data-item">
                <span>Lokasi</span>
                <strong>
                    📍 <?php echo htmlspecialchars($biodata['lokasi']); ?>
                </strong>
            </div>

            <div class="data-item full">
                <span>Bio</span>
                <p>
                    <?php echo nl2br(htmlspecialchars($biodata['bio'])); ?>
                </p>
            </div>

            <div class="data-item full">
                <span>Instagram</span>
                <a
                    href="<?php echo htmlspecialchars($biodata['tautan_instagram']); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Instagram ↗
                </a>
            </div>

        </div>

        <div class="aksi">
            <button type="button" class="btn-edit">
                ✎ Edit
            </button>

            <button type="button" class="btn-hapus">
                ♡ Hapus
            </button>

            <button type="button" class="btn-tambah">
                ＋ Tambah Konten
            </button>
        </div>

    </section>

</main>

<?php include 'layouts/footer.php'; ?>



<style>  
/* Biodata admin */
.biodata-card {
    display: grid;
    grid-template-columns: 150px minmax(0, 1fr);
    gap: 24px;
    padding: 28px;
    background: #fffaf7;
    border: 1px solid #f4ded7;
    border-radius: 22px;
    box-shadow: 0 8px 24px rgba(190, 135, 120, 0.08);
}

.foto-admin {
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.foto-admin img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 24px;
    border: 4px solid #f8dcd3;
    background: #fff0e9;
}

.data-biodata {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.data-item {
    min-width: 0;
    padding: 14px 16px;
    background: #fff;
    border: 1px solid #f5e7e1;
    border-radius: 15px;
    overflow-wrap: anywhere;
}

.data-item span {
    display: block;
    margin-bottom: 7px;
    color: #a17e73;
    font-size: 12px;
    font-weight: 600;
}

.data-item strong {
    color: #674c43;
    font-size: 14px;
    line-height: 1.6;
}

.data-item p {
    margin: 0;
    color: #80675e;
    font-size: 14px;
    line-height: 1.8;
}

.data-item a {
    color: #bf786d;
    text-decoration: none;
    font-size: 14px;
    overflow-wrap: anywhere;
}

.data-item a:hover {
    text-decoration: underline;
}

.data-item.full {
    grid-column: 1 / -1;
}

.aksi {
    grid-column: 1 / -1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    padding-top: 8px;
}

.aksi form {
    margin: 0;
}

.btn-edit,
.btn-hapus,
.btn-tambah {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 10px 16px;
    border: none;
    border-radius: 12px;
    font: inherit;
    font-size: 13px;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s ease;
}

.btn-edit {
    background: #fce6bd;
    color: #87622d;
}

.btn-edit:hover {
    background: #f8d99c;
}

.btn-hapus {
    background: #f9d9dc;
    color: #a34e5b;
}

.btn-hapus:hover {
    background: #f4c2c9;
}

.btn-tambah {
    background: #f4d8cf;
    color: #80574c;
}

.btn-tambah:hover {
    background: #edc4b8;
}

.data-kosong {
    grid-column: 1 / -1;
    padding: 30px 15px;
    text-align: center;
    color: #80675e;
}

.data-kosong .btn-tambah {
    margin-top: 10px;
}

@media (max-width: 768px) {
    .biodata-card {
        grid-template-columns: 1fr;
        padding: 20px;
    }

    .foto-admin {
        justify-content: flex-start;
    }

    .foto-admin img {
        width: 110px;
        height: 110px;
    }

    .data-biodata {
        grid-template-columns: 1fr;
    }

    .data-item.full {
        grid-column: auto;
    }

    .aksi {
        flex-wrap: wrap;
        justify-content: flex-start;
    }

</style>