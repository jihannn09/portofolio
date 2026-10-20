
<?php
require_once __DIR__ . '/config/database.php';

$errors = [];
$judul = '';
$deskripsi = '';
$teknologi = '';
$tautan = '';
$dibuatPada = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $teknologi = trim($_POST['teknologi'] ?? '');
    $tautan = trim($_POST['tautan'] ?? '');
    $dibuatPada = trim($_POST['dibuat_pada'] ?? '');

    if ($judul === '') {
        $errors[] = 'judul';
    }

    if ($dibuatPada === '') {
        $errors[] = 'dibuat_pada';
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                'INSERT INTO projects
                (judul, deskripsi, teknologi, tautan, dibuat_pada)
                VALUES
                (:judul, :deskripsi, :teknologi, :tautan, :dibuat_pada)'
            );

            $stmt->execute([
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'teknologi' => $teknologi,
                'tautan' => $tautan,
                'dibuat_pada' => $dibuatPada
            ]);

            header('Location: karya.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = 'database';
        }
    }
}

include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<main class="content tambah-project">

    <div class="tambah-heading">
        <h1>Tambah Project Barul✦</h1>
        <p>Tambahkan project baru ke daftar karyamu.</p>
    </div>

    <div class="form-project">

        <?php if (in_array('database', $errors)): ?>
            <p class="pesan-error">
                Gagal menyimpan project. Periksa kembali database kamu.
            </p>
        <?php endif; ?>

        <form method="post">

            <div class="form-group">
                <label for="judul">Judul Project</label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    class="<?= in_array('judul', $errors) ? 'input-error' : '' ?>"
                    value="<?= htmlspecialchars($judul) ?>"
                >
                <?php if (in_array('judul', $errors)): ?>
                    <small class="pesan-error">⚠ Judul wajib diisi.</small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="4"
                ><?= htmlspecialchars($deskripsi) ?></textarea>
            </div>

            <div class="form-group">
                <label for="teknologi">Teknologi</label>
                <input
                    type="text"
                    id="teknologi"
                    name="teknologi"
                    value="<?= htmlspecialchars($teknologi) ?>"
                >
            </div>

            <div class="form-group">
                <label for="tautan">Tautan (Link)</label>
                <input
                    type="url"
                    id="tautan"
                    name="tautan"
                    value="<?= htmlspecialchars($tautan) ?>"
                >
            </div>

            <div class="form-group">
                <label for="dibuat_pada">Tanggal Dibuat</label>
                <input
                    type="date"
                    id="dibuat_pada"
                    name="dibuat_pada"
                    class="<?= in_array('dibuat_pada', $errors) ? 'input-error' : '' ?>"
                    value="<?= htmlspecialchars($dibuatPada) ?>"
                >
                <?php if (in_array('dibuat_pada', $errors)): ?>
                    <small class="pesan-error">
                        ⚠ Tanggal dibuat wajib diisi.
                    </small>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <a href="karya.php" class="btn-batal">Kembali</a>
                <button type="submit" class="btn-simpan">
                    ♡ Simpan Project
                </button>
            </div>

        </form>
    </div>

</main>

<?php include 'layouts/footer.php'; ?>



<style>

/* Halaman tambah project */
.tambah-project {
    flex: 1;
    min-width: 0;
    padding: 18px;
    color: #514b4b;
}

/* Judul halaman */
.tambah-heading {
    padding: 22px 25px;
    margin-bottom: 16px;
    background: #fff;
    border-radius: 18px;
}

.tambah-heading h1 {
    margin-bottom: 6px;
    color: #514b4b;
    font-size: 22px;
}

.tambah-heading p {
    color: #918889;
    font-size: 12px;
}

/* Kotak form */
.form-project {
    width: 100%;
    max-width: 600px;
    padding: 22px;
    background: #fff;
    border: 1px solid #f3dddd;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(217, 130, 155, 0.05);
}

/* Kolom form */
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
    display: block;
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #f0dce1;
    border-radius: 9px;
    background: #fffaf8;
    color: #514b4b;
    font-family: Arial, sans-serif;
    font-size: 12px;
    box-sizing: border-box;
    outline: none;
}

.form-group textarea {
    min-height: 85px;
    resize: vertical;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #d9829b;
    box-shadow: 0 0 0 3px rgba(217, 130, 155, 0.10);
}

/* Pesan error */
.pesan-error {
    display: block;
    margin-top: 6px;
    color: #e34b68;
    font-size: 11px;
}

.form-group .input-error {
    border-color: #e88a9d !important;
    background: #fff8f9 !important;
}

/* Tombol */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid #f5e6e8;
}

.btn-batal,
.btn-simpan {
    display: inline-block;
    padding: 9px 13px;
    border: none;
    border-radius: 8px;
    font-family: Arial, sans-serif;
    font-size: 11px;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
}

.btn-batal {
    background: #fff1f4;
    color: #a65e76;
    border: 1px solid #f3dddd;
}

.btn-simpan {
    background: #d9829b;
    color: #fff;
}

.btn-batal:hover {
    background: #fce4eb;
}

.btn-simpan:hover {
    background: #c86f8b;
}

.btn-batal:active,
.btn-simpan:active {
    transform: scale(0.98);
}

/* Tampilan HP */
@media (max-width: 768px) {
    .tambah-project {
        padding: 12px;
    }

    .tambah-heading {
        padding: 18px;
    }

    .tambah-heading h1 {
        font-size: 20px;
    }

    .form-project {
        padding: 17px;
    }

    .form-actions {
        flex-direction: row;
    }
}

</style>



