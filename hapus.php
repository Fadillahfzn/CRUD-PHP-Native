<?php
    include 'koneksi.php';

    $kode = $_GET['kode'];
    $sqlDelete = "DELETE FROM kendaraan WHERE kode='$kode'";
    mysqli_query($conn, $sqlDelete);

    header("location: index.php");
?>