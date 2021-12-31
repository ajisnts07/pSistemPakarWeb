<?php
    include './connection.php';

    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = $_POST['nama_gejala'];
    $pertanyaan = $_POST['pertanyaan'];

    mysqli_query ($connect, "UPDATE gejala SET nama_gejala = '$nama_gejala', pertanyaan = '$pertanyaan' WHERE kode_gejala = '$kode_gejala'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=edit");  
?>