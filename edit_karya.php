<?php
require_once __DIR__ . '/config/database.php';

// 1. Pastikan id ada dan berupa angka
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: karya.php');
    exit;
}

// 2. Ambil data lama dengan prepared statement
$stmt = $pdo->prepare('SELECT * FROM projects WHERE id = :id');
$stmt->execute(['id' => $_GET['id']]);

$project = $stmt->fetch(PDO::FETCH_ASSOC);
// 3. Jika id tidak ditemukan, kembali ke dashboard
if (!$project) {
    header('Location: karya.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
</head>

<body>
    <h1>Edit Project</h1>
    <form method="post" action="update_karya.php">
        <input type="hidden" name="id" value="<?= $project['id'] ?>">
        <p>
            <label>Judul<br>
                <input type="text" name="judul"
                    value="<?= htmlspecialchars($project['judul']) ?>"></label> 
        </p>
        <p>
            <label>Teknologi<br>
                <input type="text" name="teknologi"
                    value="<?= htmlspecialchars($project['teknologi']) ?>"></label>
        </p>
        <button type="submit">Simpan Perubahan</button>
        <a href="karya.php">Batal</a>
    </form>
</body>

</html>

<style>
    
/* Tampilan halaman */
body {
    margin: 0;
    padding: 25px;
    background: #fffaf6;
    color: #514b4b;
    font-family: Arial, sans-serif;
}

/* Judul */
h1 {
    margin: 25px 0;
    color: #d9829b;
    font-size: 24px;
    text-align: center;
}

/* Form */
form {
    max-width: 450px;
    margin: 0 auto;
    padding: 25px;
    background: #ffffff;
    border: 1px solid #f3dddd;
    border-radius: 18px;
    box-shadow: 0 4px 15px rgba(217, 130, 155, 0.08);
}

/* Jarak form */
form p {
    margin-bottom: 18px;
}

/* Label */
label {
    color: #65595c;
    font-size: 13px;
    font-weight: bold;
}

/* Input */
input[type="text"] {
    width: 100%;
    margin-top: 8px;
    padding: 11px;
    background: #fffaf8;
    border: 1px solid #f3dddd;
    border-radius: 9px;
    color: #514b4b;
    font-size: 13px;
    outline: none;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #d9829b;
}

/* Tombol simpan */
button {
    padding: 10px 14px;
    background: #f7c8d6;
    color: #98546b;
    border: 1px solid #f3b9cb;
    border-radius: 9px;
    font-size: 12px;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background: #efb2c5;
}

/* Tombol batal */
form a {
    display: inline-block;
    margin-left: 7px;
    padding: 10px 14px;
    background: #fff0f4;
    color: #ce6687;
    border: 1px solid #f9dfe7;
    border-radius: 9px;
    font-size: 12px;
    font-weight: bold;
    text-decoration: none;
}

form a:hover {
    background: #f7dce5;
}

/* Tampilan HP */
@media (max-width: 600px) {
    body {
        padding: 12px;
    }

    form {
        padding: 18px;
    }

    h1 {
        font-size: 21px;
    }
}

</style>