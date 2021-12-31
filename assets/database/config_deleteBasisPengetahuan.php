<?php
    include './connection.php';

    $kode_pengetahuan = $_GET['kode_pengetahuan'];

    mysqli_query ($connect, "DELETE FROM basis_pengetahuan WHERE kode_pengetahuan = '$kode_pengetahuan'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>