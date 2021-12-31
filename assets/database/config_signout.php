<?php
    session_start();

    unset ($_SESSION['id_user']);
    unset ($_SESSION['role']);
    unset ($_SESSION['username']);

    session_destroy();
    ?>
    <script language="Javascript">
        alert('Anda akan keluar dari laman, terimakasih...');
        document.location = '../../signin/signin.php';
    </script>
    <?php
?>