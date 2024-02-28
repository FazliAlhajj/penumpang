<?php

session_start();
require '../admin/jadwal/functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

    $jadwal = query("SELECT * FROM jadwal_penerbangan 
    INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
    INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi, waktu_berangkat");


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../layouts/navbar_penumpang.php'; ?>

        <h1>Halo, <?= $_SESSION["username"]; ?></h1>
        <h1>Berikut Adalah Jadwal Penerbangan </h1>
        <?php
        query("SELECT * FROM jadwal_penerbangan 
        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi, waktu_berangkat");
        ?>
        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th>Kapasitas</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Waktu Berangkat</th>
            <th>Waktu Tiba</th>
            <th>Harga</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach($jadwal as $data) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data["nama_maskapai"]; ?></td>
            <td><?= $data["kapasitas"]; ?></td>
            <td><?= $data["rute_asal"]; ?></td>
            <td><?= $data["rute_tujuan"]; ?></td>
            <td><?= $data["tanggal_pergi"]; ?></td>
            <td><?= $data["waktu_berangkat"]; ?></td>
            <td><?= $data["waktu_tiba"]; ?></td>
            <td>Rp <?= number_format($data["harga"]); ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>