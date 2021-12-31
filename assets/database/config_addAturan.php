<?php 
    include './connection.php';

    $kode_aturan = $_POST['kode_aturan'];
    $jika = $_POST['jika'];
    $maka = $_POST['maka'];

    mysqli_query ($connect, "INSERT INTO aturan VALUE ('$kode_aturan','$jika','$maka')") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=success");
?>