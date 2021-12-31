<?php
    ob_start();
    session_start();
    header_remove();

    include './connection.php';

    $username = mysqli_real_escape_string ($connect, $_POST['username']);

    $status = $_GET['status'];

    if ($status = 'forgotPassword') {
        $forgotPassword = mysqli_query ($connect, "SELECT * FROM user WHERE username = '$username'") or die (mysqli_error ($connect));

        if (mysqli_num_rows ($forgotPassword) > 0) {
            $forgotPassword = mysqli_fetch_assoc ($forgotPassword);

            $_SESSION['username'] = $forgotPassword['username'];
            header("location: ../../signin/forgot_password.php?message=success");
        } else {
            header ("location: ../../signin/forgot_password.php?message=failed");
        }
    }
?>