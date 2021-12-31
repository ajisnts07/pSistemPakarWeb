<?php
    include './connection.php';

    $id_user = $_GET['id_user'];

    mysqli_query ($connect, "DELETE FROM user WHERE id_user = '$id_user'") or die (mysqli_error ($connect));
    header ("location: ../../dashboard/dashboard_admin.php?message=delete");
?>