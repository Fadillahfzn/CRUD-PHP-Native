<?php
    include'koneksi.php';

    $kode = $_GET['kode'];
    $sqlGet = "SELECT * FROM kendaraan WHERE kode='$kode'";
    $queryGet = mysqli_query($conn, $sqlGet);
    $data = mysqli_fetch_array($queryGet);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Aplikasi CRUD</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
        <h3 class="text-center">Update Data</h3>
        <a href="index.php">Kembali ke home</a>
        <form action="ubah.php" method="post">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" value="<?php echo "$data[kode]";?>" autocomplete="off" class="form-control" readonly>

            <label for="nama">Nama Kendaraan</label>
            <input type="text" id="nama" name="nama" value="<?php echo "$data[nama]";?>" autocomplete="off" class="form-control" required>

            <label for="jenis">Jenis</label>
            <select name="jenis" id="jenis" class="form-select" required>
                <option ><?php echo "$data[jenis]";?></option>
                <option value="motor">Motor</option>
                <option value="mobil">Mobil</option>
                <option value="sepeda">Sepeda</option>
            </select>

            <label for="warna">Warna</label>
            <input type="text" id="warna" name="warna" value="<?php echo "$data[warna]";?>" class="form-control" required>

            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo "$data[tahun]";?>" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>

    <?php

        if(isset($_POST['tambah'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $warna = $_POST['warna'];
        $tahun = $_POST['tahun'];

        $jenisSelect = $_POST['jenis'];
        if ($jenisSelect == 'motor') {
            $jenis = 'Motor';
        } if ($jenisSelect == 'mobil') {
            $jenis = 'Mobil';
        } if ($jenisSelect == 'sepeda') {
            $jenis = 'Sepeda';
        }

        $sqlUpdate = "UPDATE kendaraan 
                    SET nama='$nama', jenis='$jenis', warna='$warna', tahun='$tahun'
                    WHERE kode='$kode'";
        $queryUpdate = mysqli_query($conn, $sqlUpdate);
        
        header("location: index.php");
    }
    ?>
</body>
</html>