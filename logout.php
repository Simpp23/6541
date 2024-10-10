<?php
    session_start();
    unset($_SESSION['admin_login']);
    unset($_SESSION['user_login']);

    header("Location:login.php");

?>