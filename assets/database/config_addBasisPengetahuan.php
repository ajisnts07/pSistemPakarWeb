<?php
    include './connection.php';

    $kode_pengetahuan = $_POST['kode_pengetahuan'];
    $penyakit = $_POST['penyakit'];
    $gejala = $_POST['gejala'];

    mysqli_query ($connect, "INSERT INTO basis_pengetahuan VALUE ('$kode_pengetahuan','$penyakit','$gejala')") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=success");
?>