<?php
    $conn = mysqli_connect("localhost", "root", "", "sql");
    $query ="SELECT * FROM mahasiswa";
    $data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah data</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>NIM</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Email</td>
            <td>Aksi</td>
        </tr>
        <!-- print data from result -->
        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="button">Hapus</a>
            </td>
            <?php $i++; ?>
        </tr>
        <?php endwhile; ?>
</body>

</html>