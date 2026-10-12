<?php
require_once "config/database.php";
session_start();
include 'cek_session.php';
include 'layouts/header.php';
include 'layouts/sidebar.php';

$stmt = $pdo->query('SELECT * FROM projects ORDER BY dibuat_pada DESC');
$projects = $stmt->fetchAll(); // mengambil semua data 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Daftar Project</h1>
    <?php if (count($projects)===0) : ?>
        <p>Belum ada Project.</p>
    <?php else : ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Dibuat pada</th>
                </tr>
            </thead>
                
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= htmlspecialchars($project['judul']) ?></td>
                        <td><?= htmlspecialchars($project['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($project['dibuat_pada']) ?></td>
                    </tr>
                <?php endforeach; ?>   
            </tbody>
        
        </table>    
    <?php endif; ?>
<?php include 'layouts/footer.php'; ?>
            
<style>
    ```css
body {
    font-family: Arial, sans-serif;
    background: #fff8f5;
    color: #66504f;
    padding: 15px;
    font-size: 13px;
}

h1 {
    color: #c77d86;
    font-size: 19px;
    margin-bottom: 10px;
}

table {
    width: auto;
    max-width: 100%;
    border-collapse: collapse;
    background: white;
}

th {
    background: #f6dfe0;
    color: #8f5c63;
    text-align: left;
}

th, td {
    padding: 6px 9px;
    border: 1px solid #f1dcd8;
    font-size: 12px;
}

tbody tr:nth-child(even) {
    background: #fff4f0;
}

tbody tr:hover {
    background: #fce9e7;
}

p {
    font-size: 12px;
    color: #9b7272;
}

@media (max-width: 600px) {
    body {
        padding: 10px;
    }

    table {
        width: 100%;
    }

    th, td {
        padding: 5px;
        font-size: 10px;
    }
}
```
</style>

</body>
</html>