<?php
    session_start();

    if (!($_SESSION["login"] == "isLogin")) {
        header("location:../Layout/login.php");
        exit;
    }
?>