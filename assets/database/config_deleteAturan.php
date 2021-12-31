<?php
    include './connection.php';

    $kode_aturan = $_GET['kode_aturan'];

    mysqli_query ($connect, "DELETE FROM aturan WHERE kode_aturan = '$kode_aturan'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>