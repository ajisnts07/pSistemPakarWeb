<?php
    include './connection.php';

    $kode_penyakit = $_GET['kode_penyakit'];

    mysqli_query ($connect, "DELETE FROM penyakit WHERE kode_penyakit = '$kode_penyakit'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>