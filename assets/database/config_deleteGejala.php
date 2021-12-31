<?php
    include './connection.php';

    $kode_gejala = $_GET['kode_gejala'];

    mysqli_query ($connect, "DELETE FROM gejala WHERE kode_gejala = '$kode_gejala'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>