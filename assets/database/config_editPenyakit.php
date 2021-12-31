<?php
    include './connection.php';

    $kode_penyakit = $_POST['kode_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $deskripsi_penyakit = $_POST['deskripsi_penyakit'];
    $solusi = $_POST['solusi'];
    $sumber = $_POST['sumber'];

    mysqli_query ($connect, "UPDATE penyakit SET nama_penyakit = '$nama_penyakit', deskripsi_penyakit = '$deskripsi_penyakit', solusi = '$solusi', sumber = '$sumber' WHERE kode_penyakit = '$kode_penyakit'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=edit");
?>