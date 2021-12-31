<?php
    ob_start();
    session_start();

    include './connection.php';

    $id_user = mysqli_real_escape_string($connect, $_POST['id_user']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $status = $_GET['status'];

    if ($status = 'signIn') {
        $signin = mysqli_query ($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'") or die (mysqli_error ($connect));

        if (mysqli_num_rows ($signin) > 0) {
            $signin = mysqli_fetch_assoc ($signin);

            if ($signin['role'] == 'user') {
                $_SESSION['id_user'] = $signin['id_user'];
                $_SESSION['username'] = $signin['username'];
                $_SESSION['role'] = $signin['role'];

                header ("location: ../../dashboard/dashboard.php");
            } else if ($signin['role'] == 'admin') {
                $_SESSION['id_user'] = $signin['id_user'];
                $_SESSION['username'] = $signin['username'];
                $_SESSION['role'] = $signin['role'];

                header ("location: ../../dashboard/dashboard_admin.php");
            }
        } else {
            header ("location: ../../signin/signin.php?message=failed");
        }
    }
?>