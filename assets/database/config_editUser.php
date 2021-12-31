<?php
    include './connection.php';

    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query ($connect, "UPDATE user SET nama = '$nama', alamat = '$alamat', no_telepon = '$no_telepon', role = '$role', username = '$username', password = '$password' WHERE id_user = '$id_user'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=edit");
?>
