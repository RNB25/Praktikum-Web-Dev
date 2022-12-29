<?php
    require 'functions.php';
    $result = query("SELECT * FROM karyawan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="form.php">Tambah data</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>id</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Address</td>
            <td>Position</td>
            <td>Gender</td>
            <td>Status</td>
        </tr>
        <!-- print data from result -->
        <?php $i = 1; ?>
        <?php 
        if($result != NULL){
            foreach($result as $row) : 
                ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["address"]; ?></td>
            <td><?= $row["position"]; ?></td>
            <td><?= $row["gender"]; ?></td>
            <td><?= $row["status"]; ?></td>
            <td>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="button">Hapus</a>
            </td>
            <td>
                <a href="formedit.php?id=<?= $row["id"]; ?>" class="button">edit</a>
            </td>
            <?php $i++; ?>
        </tr>
        <?php endforeach; } ?>
</body>

</html>