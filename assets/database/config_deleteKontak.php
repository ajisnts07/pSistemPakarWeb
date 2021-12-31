<?php
    include './connection.php';

    $kode_kontak = $_GET['kode_kontak'];

    mysqli_query ($connect, "DELETE FROM kontak WHERE kode_kontak = '$kode_kontak'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>