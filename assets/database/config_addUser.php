<?php
    include './connection.php';

    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query ($connect, "INSERT INTO user VALUE ('$id_user','$nama','$alamat','$no_telepon','$role','$username','$password')") or die (mysqli_error ($connect));
    header("location: ../../dashboard/dashboard_admin.php?message=success");
?>