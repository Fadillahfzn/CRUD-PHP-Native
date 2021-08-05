<?php
    include'koneksi.php';
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
    
    <div class="container mt-3">
    <h1 class="text-center">Showroom Kendaraan</h1>
    <a href="tambah.php" class="btn btn-primary btn-md mb-3">+ Tambah Data</a>

    <table class="table table-strip table-hover table-bordered">
        <thead class="table-dark text-center">
            <th>Kode</th>
            <th>Nama Kendaraan</th>
            <th>Jenis</th>
            <th>Warna</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </thead>

        <?php 
        $query = mysqli_query($conn, 'SELECT * FROM kendaraan');
        while($data = mysqli_fetch_array($query)) {
            echo "
            <tbody>
            <tr>
                <td class='text-center'>$data[kode]</td>
                <td>$data[nama]</td>
                <td>$data[jenis]</td>
                <td>$data[warna]</td>
                <td>$data[tahun]</td>
                <td>
                    <div class='row'>
                        <div class='col d-flex justify-content-center'>
                        <a href='ubah.php?kode=$data[kode]' class='btn btn-sm btn-warning'>Update</a>
                        </div>
                        <div class='col d-flex justify-content-center'>
                        <a href='hapus.php?kode=$data[kode]' class='btn btn-sm btn-danger'>Delete</a>  
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
                ";
        }
        ?>
    </table>
    </div>
</body>
</html>