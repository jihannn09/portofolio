<?php
session_start();
require_once __DIR__ . '/config/database.php';
include 'cek_session.php';

// Proses hapus project
if (isset($_POST['hapus'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id) {
        $stmtHapus = $pdo->prepare(
            'DELETE FROM projects WHERE id = :id'
        );

        $stmtHapus->execute(['id' => $id]);
    }

    header('Location: project.php');
    exit;
}

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

            <a href="tambah_karya.php" class="project-tambah">
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
                            <th>Aksi</th>
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
                                            class="project-lihat">
                                            ↗ Lihat
                                        </a>
                                    <?php else: ?>
                                        <span class="project-tidak-ada">-</span>
                                    <?php endif; ?>
                                </td>

                                <td class="project-tanggal">
                                    <?= htmlspecialchars($project['dibuat_pada'] ?? '') ?>
                                </td>

                                <!-- Tombol hapus & edit -->
                                <td>
                                    <a href="edit_karya.php?id=<?= (int) $project['id'] ?>"
                                        class="project-edit">Edit</a>

                                    <form method="post" action="hapus_karya.php"
                                        style="display:inline"
                                        onsubmit="return confirm('Hapus project ini?');">

                                        <input type="hidden" name="id"
                                            value="<?= (int) $project['id'] ?>">

                                        <button type="submit" name="hapus"
                                            class="project-hapus">Hapus</button>
                                    </form>
                                </td>
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
    /* Tampilan utama */
    .project-content {
        flex: 1;
        min-width: 0;
        padding: 14px;
        background: #fffaf6;
        color: #514b4b;
    }

    /* Bagian judul */
    .project-heading {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 24px 28px;
        margin-bottom: 18px;
        background: #ffffff;
        border-radius: 20px;
    }

    .project-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background: #ffe5ec;
        color: #d9829b;
        border-radius: 14px;
        font-size: 24px;
    }

    .project-heading h1 {
        margin: 0 0 6px;
        color: #514b4b;
        font-size: 24px;
    }

    .project-heading p {
        margin: 0;
        color: #918889;
        font-size: 13px;
    }

    /* Kotak daftar project */
    .project-card {
        padding: 22px;
        background: #ffffff;
        border: 1px solid #f9e6e9;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(217, 130, 155, 0.05);
    }

    .project-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
    }

    .project-card-top h2 {
        margin: 0;
        color: #514b4b;
        font-size: 18px;
    }

    /* Tombol tambah */
    .project-tambah {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 14px;
        background: #ffe5ec;
        color: #ce6687;
        border: 1px solid #fbd8e2;
        border-radius: 10px;
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.2s;
    }

    .project-tambah:hover {
        background: #f7c8d6;
    }

    .project-tambah span {
        font-size: 17px;
    }

    /* Tabel project */
    .project-table-wrapper {
        width: 100%;
        overflow-x: auto;
        border: 1px solid #f8e5e9;
        border-radius: 12px;
    }

    .project-table {
        width: 100%;
        min-width: 720px;
        border-collapse: collapse;
        font-size: 12px;
    }

    .project-table th {
        padding: 13px;
        background: #fff0f4;
        color: #cf6888;
        text-align: left;
        font-size: 12px;
        white-space: nowrap;
        border-bottom: 1px solid #f8e5e9;
        text-align: center;
    }

    .project-table td {
        padding: 13px;
        color: #827981;
        line-height: 1.6;
        vertical-align: middle;
        border-bottom: 1px solid #faedf0;
        text-align: center;
    }
    

    .project-table tbody tr:hover {
        background: #fff9fb;
    }

    .project-table tbody tr:last-child td {
        border-bottom: none;
    }

    .project-judul {
        min-width: 130px;
        color: #514b4b !important;
        font-weight: bold;
    }

    .project-deskripsi {
        min-width: 180px;
    }

    .project-tanggal {
        min-width: 110px;
        white-space: nowrap;
    }

    /* Tombol lihat */
    .project-lihat {
        display: inline-block;
        padding: 6px 10px;
        background: #fff0f4;
        color: #d36c8c;
        border: 1px solid #f9dfe7;
        border-radius: 8px;
        font-size: 11px;
        font-weight: bold;
        text-decoration: none;
    }

    .project-lihat:hover {
        background: #f7c8d6;
    }

    .project-tidak-ada {
        color: #b6a9ad;
    }

    /* Tombol edit dan hapus */
    .project-edit,
    .project-hapus {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }



    .project-edit {
        background: #fff0f4;
        color: #ce6687;
        border: 1px solid #f9dfe7;
    }

    .project-edit:hover {
        background: #f7c8d6;
    }

    .project-hapus {
        background: #fff0f0;
        color: #d66b78;
        border: 1px solid #f5d5d9;
    }

    .project-hapus:hover {
        background: #f8d4d9;
    }

    /* Data kosong */
    .project-kosong {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px;
        background: #fff8fa;
        border: 1px solid #f9e5eb;
        border-radius: 12px;
    }

    .project-kosong span {
        color: #d9829b;
        font-size: 22px;
    }

    .project-kosong p {
        margin: 0;
        color: #918889;
        font-size: 12px;
    }

    /* Tampilan HP */
    @media (max-width: 768px) {
        .project-content {
            padding: 10px;
        }

        .project-heading {
            gap: 12px;
            padding: 20px 16px;
        }

        .project-icon {
            width: 42px;
            height: 42px;
            font-size: 21px;
        }

        .project-heading h1 {
            font-size: 20px;
        }

        .project-heading p {
            font-size: 12px;
        }

        .project-card {
            padding: 14px;
        }

        .project-card-top {
            align-items: flex-start;
        }

        .project-card-top h2 {
            font-size: 16px;
        }

        .project-tambah {
            padding: 9px 11px;
            font-size: 11px;
        }

        .project-kosong {
            align-items: flex-start;
        }
    }
</style>