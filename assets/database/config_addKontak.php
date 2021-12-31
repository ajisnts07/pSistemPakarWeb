<?php 
    include './connection.php';

    $kode_kontak = $_POST['kode_kontak'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    mysqli_query ($connect, "INSERT INTO kontak VALUE ('$kode_kontak','$nama','$email','$subject')") or die (mysqli_error ($connect));
    header ("location: ../../index.php?message=success");
?>