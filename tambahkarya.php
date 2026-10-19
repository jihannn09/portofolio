<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
require_once __DIR__ . '/config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $teknologi = $_POST['teknologi'];
    $tautan = $_POST['tautan'];
    $dibuatPada = $_POST['dibuat_pada'];
    $stmt = $pdo->prepare(
        'INSERT INTO projects (judul, deskripsi, teknologi, tautan, dibuat_pada)
        VALUES (:judul, :deskripsi, :teknologi, :tautan, :dibuat_pada)'
    );
    $stmt->execute([
        'judul' => $judul,
        'deskripsi' => $deskripsi,
        'teknologi' => $teknologi,
        'tautan' => $tautan,
        'dibuat_pada' => $dibuatPada,
    ]);
    header('Location: karya.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Project</title>
    <link rel="stylesheet" href="tambahkarya.css">
</head>

<body>

    <main class="content tambah-project">
        <div class="tambah-heading">
            <h1>Tambah Project Baru</h1>
            <p>Tambahkan project baru ke daftar karyamu.</p>
        </div>

        <div class="form-project">
            <form method="post">
                <div class="form-group">
                    <label>Judul Project</label>
                    <input type="text" name="judul" placeholder="Masukkan judul project" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4" placeholder="Ceritakan tentang project kamu"></textarea>
                </div>

                <div class="form-group">
                    <label>Teknologi</label>
                    <input type="text" name="teknologi" placeholder="Contoh: PHP, MySQL">
                </div>

                <div class="form-group">
                    <label>Tautan Project</label>
                    <input type="url" name="tautan" placeholder="https://contoh.com">
                </div>

                <div class="form-group">
                    <label>Tanggal Dibuat</label>
                    <input type="date" name="dibuat_pada" required>
                </div>

                <div class="form-actions">
                    <a href="karya.php" class="btn-batal">
                        Batal
                    </a>
                
                    <button type="submit" class="btn-simpan">
                        ♡ Simpan Project
                    </button>
                </div>
            </form>
        </div>
    </main>



</body>

</html>

<style>
    /* Halaman tambah project */
    .tambah-project {
        flex: 1;
        min-width: 0;
        padding: 25px;
    }

    .tambah-heading {
        margin-bottom: 20px;
    }

    .tambah-heading h1 {
        margin-bottom: 6px;
        color: #514b4b;
        font-size: 23px;
    }

    .tambah-heading p {
        color: #918889;
        font-size: 12px;
    }

    /* Kotak form */
    .form-project {
        max-width: 600px;
        padding: 24px;
        background: #fff;
        border: 1px solid #f3dddd;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(217, 130, 155, 0.07);
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #514b4b;
        font-size: 12px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #f0dce1;
        border-radius: 9px;
        background: #fffaf8;
        color: #514b4b;
        font-family: Arial, sans-serif;
        font-size: 12px;
        outline: none;
    }

    .form-group textarea {
        min-height: 90px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #d9829b;
    }

    /* Tombol */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 22px;
    }

    .btn-batal,
    .btn-simpan {
        display: inline-block;
        padding: 10px 14px;
        border: none;
        border-radius: 8px;
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-batal {
        background: #fff1f4;
        color: #a65e76;
    }

    .btn-simpan {
        background: #f7c8d6;
        color: #8e4d63;
    }

    .btn-batal:hover,
    .btn-simpan:hover {
        opacity: 0.8;
    }

    /* Tampilan HP */
    @media (max-width: 768px) {
        .tambah-project {
            padding: 18px;
        }

        .form-project {
            padding: 18px;
        }

        .tambah-heading h1 {
            font-size: 21px;
        }
    }
</style>



<?php
include 'layouts/footer.php'
    ?>