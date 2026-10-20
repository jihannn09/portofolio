
<?php
session_start();
require_once __DIR__ . '/config/database.php';
include 'cek_session.php';

// Mengambil data project dari database
$stmt = $pdo->query(
    'SELECT * FROM projects ORDER BY dibuat_pada DESC'
);
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<link rel="stylesheet" href="dashboard-project.css">

<main class="content project-content">

    <!-- Judul halaman -->
    <section class="project-heading">
        <div class="project-icon">✦</div>
        <div>
            <h1>ini, menu project ✦</h1>
            <p>Senang melihat kamu kembali.</p>
        </div>
    </section>

    <!-- Daftar project -->
    <section class="project-card">

        <div class="project-card-top">
            <h2>Daftar Project</h2>

            <a href="tambahkarya.php" class="project-tambah">
                <span>＋</span> Tambah Project
            </a>
        </div>

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
                                <td class="project-judul">
                                    <?= htmlspecialchars($project['judul'] ?? '') ?>
                                </td>

                                <td class="project-deskripsi">
                                    <?= htmlspecialchars($project['deskripsi'] ?? '') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($project['teknologi'] ?? '') ?>
                                </td>

                                <td>
                                    <?php if (!empty($project['tautan'])): ?>
                                        <a
                                            href="<?= htmlspecialchars($project['tautan'], ENT_QUOTES, 'UTF-8') ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="project-lihat"
                                        >
                                            ↗ Lihat
                                        </a>
                                    <?php else: ?>
                                        <span class="project-tidak-ada">-</span>
                                    <?php endif; ?>
                                </td>

                                <td class="project-tanggal">
                                    <?= htmlspecialchars($project['dibuat_pada'] ?? '') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>

            <div class="project-kosong">
                <span>♡</span>
                <p>Belum ada project. Klik tombol Tambah Project untuk memulai.</p>
            </div>

        <?php endif; ?>

    </section>

</main>

<?php include 'layouts/footer.php'; ?>

<style>
    
/* Area utama project */
.project-content {
    flex: 1;
    min-width: 0;
    padding: 14px;
    background: #fffaf6;
    color: #514b4b;
}

/* Kotak judul */
.project-heading {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 30px 36px;
    margin-bottom: 18px;
    background: #ffffff;
    border-radius: 25px;
}

.project-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 55px;
    height: 55px;
    background: #ffe5ec;
    color: #d9829b;
    border-radius: 16px;
    font-size: 28px;
}

.project-heading h1 {
    margin: 0 0 7px;
    color: #514b4b;
    font-size: 30px;
}

.project-heading p {
    margin: 0;
    color: #918889;
    font-size: 16px;
}

/* Kotak daftar project */
.project-card {
    padding: 25px;
    background: #ffffff;
    border: 1px solid #f9e6e9;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(217, 130, 155, 0.04);
}

.project-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    margin-bottom: 20px;
}

.project-card-top h2 {
    margin: 0;
    color: #514b4b;
    font-size: 19px;
}

/* Tombol tambah */
.project-tambah {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 12px 17px;
    background: #ffe5ec;
    color: #ce6687;
    border: 1px solid #fbd8e2;
    border-radius: 12px;
    font-size: 13px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.2s;
}

.project-tambah span {
    font-size: 19px;
}

.project-tambah:hover {
    background: #f7c8d6;
    transform: translateY(-1px);
}

/* Tabel */
.project-table-wrapper {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #f8e5e9;
    border-radius: 14px;
}

.project-table {
    width: 100%;
    min-width: 720px;
    border-collapse: collapse;
    font-size: 12px;
}

.project-table th {
    padding: 16px 15px;
    background: #fff0f4;
    color: #cf6888;
    text-align: left;
    font-size: 12px;
    white-space: nowrap;
    border-bottom: 1px solid #f8e5e9;
}

.project-table td {
    padding: 17px 15px;
    color: #827981;
    line-height: 1.7;
    vertical-align: middle;
    border-bottom: 1px solid #faedf0;
}

.project-table tbody tr {
    transition: background 0.2s;
}

.project-table tbody tr:hover {
    background: #fff9fb;
}

.project-table tbody tr:last-child td {
    border-bottom: none;
}

.project-judul {
    min-width: 155px;
    color: #514b4b !important;
    font-weight: bold;
}

.project-deskripsi {
    min-width: 200px;
}

.project-tanggal {
    min-width: 115px;
    white-space: nowrap;
}

/* Tombol lihat */
.project-lihat {
    display: inline-block;
    padding: 7px 11px;
    background: #fff0f4;
    color: #d36c8c;
    border: 1px solid #f9dfe7;
    border-radius: 9px;
    font-size: 11px;
    font-weight: bold;
    text-decoration: none;
    white-space: nowrap;
}

.project-lihat:hover {
    background: #f7c8d6;
}

.project-tidak-ada {
    color: #b6a9ad;
}

/* Tampilan saat data kosong */
.project-kosong {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 18px;
    background: #fff8fa;
    border: 1px solid #f9e5eb;
    border-radius: 13px;
}

.project-kosong span {
    color: #d9829b;
    font-size: 23px;
}

.project-kosong p {
    margin: 0;
    color: #918889;
    font-size: 12px;
}

/* Tampilan HP */
@media (max-width: 768px) {
    .project-content {
        padding: 12px;
    }

    .project-heading {
        gap: 13px;
        padding: 23px 18px;
        border-radius: 20px;
    }

    .project-icon {
        width: 43px;
        height: 43px;
        font-size: 23px;
        border-radius: 12px;
    }

    .project-heading h1 {
        font-size: 21px;
    }

    .project-heading p {
        font-size: 12px;
    }

    .project-card {
        padding: 15px;
        border-radius: 16px;
    }

    .project-card-top {
        align-items: flex-start;
    }

    .project-card-top h2 {
        font-size: 17px;
    }

    .project-tambah {
        padding: 10px 12px;
        font-size: 12px;
    }

    .project-kosong {
        align-items: flex-start;
    }
}

</style>