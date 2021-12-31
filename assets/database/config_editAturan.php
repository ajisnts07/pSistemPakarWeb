<?php
    include './connection.php';

    $kode_aturan = $_POST['kode_aturan'];
    $jika = $_POST['jika'];
    $maka = $_POST['maka'];

    mysqli_query ($connect, "UPDATE aturan SET jika = '$jika', maka = '$maka' WHERE kode_aturan = '$kode_aturan'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=edit");
?>