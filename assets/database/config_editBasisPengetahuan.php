<?php
    include './connection.php';

    $kode_pengetahuan = $_POST['kode_pengetahuan'];
    $penyakit = $_POST['penyakit'];
    $gejala = $_POST['gejala'];

    mysqli_query ($connect, "UPDATE basis_pengetahuan SET penyakit = '$penyakit', gejala = '$gejala' WHERE kode_pengetahuan = '$kode_pengetahuan'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=edit");
?>