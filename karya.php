
<?php
session_start();
require_once "config/database.php";
include 'cek_session.php';

include 'layouts/header.php';
include 'layouts/sidebar.php';

// Mengambil data project dari database
$stmt = $pdo->query(
    'SELECT * FROM projects ORDER BY dibuat_pada DESC'
);
$projects = $stmt->fetchAll();
?>

<style>
/* Area project */
.project-content {
    flex: 1;
    min-width: 0;
    padding: 25px;
}

/* Judul halaman */
.project-heading {
    margin-bottom: 18px;
}

.project-heading h1 {
    margin-bottom: 6px;
    color: #514b4b;
    font-size: 23px;
}

.project-heading p {
    color: #918889;
    font-size: 12px;
}

/* Tombol tambah */
.project-tambah {
    display: inline-block;
    margin-bottom: 18px;
    padding: 9px 13px;
    background: #f7c8d6;
    color: #9d536b;
    border-radius: 8px;
    font-size: 12px;
    font-weight: bold;
    text-decoration: none;
}

.project-tambah:hover {
    background: #f2b8ca;
}

/* Kotak tabel */
.project-table-wrapper {
    width: 100%;
    max-width: 900px;
    overflow-x: auto;
    background: #fff;
    border: 1px solid #f3dddd;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(217, 130, 155, 0.07);
}

/* Tabel project */
.project-table {
    width: 100%;
    min-width: 680px;
    border-collapse: collapse;
    font-size: 12px;
}

/* Judul kolom */
.project-table th {
    padding: 11px 12px;
    background: #fff1f4;
    color: #a65e76;
    text-align: left;
    white-space: nowrap;
    border-bottom: 1px solid #f3dddd;
}

/* Isi tabel */
.project-table td {
    padding: 12px;
    color: #514b4b;
    line-height: 1.5;
    vertical-align: top;
    border-bottom: 1px solid #f5e6e8;
}

/* Lebar kolom */
.project-table th:nth-child(1),
.project-table td:nth-child(1) {
    min-width: 150px;
}

.project-table th:nth-child(2),
.project-table td:nth-child(2) {
    min-width: 210px;
}

.project-table th:nth-child(3),
.project-table td:nth-child(3) {
    min-width: 130px;
}

.project-table th:nth-child(4),
.project-table td:nth-child(4) {
    min-width: 75px;
}

.project-table th:nth-child(5),
.project-table td:nth-child(5) {
    min-width: 115px;
    white-space: nowrap;
}

/* Efek hover */
.project-table tbody tr:hover {
    background: #fff7f9;
}

.project-table tbody tr:last-child td {
    border-bottom: none;
}

/* Tombol lihat */
.project-table td a {
    display: inline-block;
    padding: 5px 9px;
    color: #bd7189;
    background: #fff1f4;
    border-radius: 6px;
    font-size: 11px;
    font-weight: bold;
    text-decoration: none;
}

.project-table td a:hover {
    background: #f7c8d6;
}

/* Pesan kosong */
.project-kosong {
    padding: 15px;
    color: #918889;
    font-size: 12px;
}

/* Tampilan HP */
@media (max-width: 768px) {
    .project-content {
        padding: 18px;
    }

    .project-heading h1 {
        font-size: 21px;
    }
}
</style>

<main class="content project-content">

    <div class="project-heading">
        <h1>Daftar Project</h1>
        <p>Berikut daftar project yang sudah kamu buat.</p>
    </div>

    <!-- Tombol selalu muncul -->
    <a href="tambahkarya.php" class="project-tambah">
        ＋ Tambah Project
    </a>

    <!-- READ: menampilkan data database -->
    <?php if (count($projects) > 0): ?>

        <div class="project-table-wrapper">
            <table class="project-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Teknologi</th>
                        <th>Tautan</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($projects as $project): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($project['judul'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($project['deskripsi'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($project['teknologi'] ?? '') ?>
                            </td>

                            <td>
                                <?php if (!empty($project['tautan'])): ?>
                                    <a
                                        href="<?= htmlspecialchars($project['tautan']) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >Lihat</a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($project['dibuat_pada'] ?? '') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>

        <p class="project-kosong">
            Belum ada project. Klik tombol Tambah Project untuk memulai.
        </p>

    <?php endif; ?>

</main>

<?php include 'layouts/footer.php'; ?>
