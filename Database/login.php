<?php
    session_start();
    include 'connector.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["inputUsername"];
        $password = $_POST["inputPassword"];

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $resultLogin = mysqli_query($connect, $query);

        if ($resultLogin) {
            if (mysqli_num_rows($resultLogin) == 1) {
                $_SESSION["login"] = "isLogin";
                $_SESSION["user"] = $username;

                header("location:../Layout/dashboard.php");
            } else {
                echo '<script type="text/javascript">'; 
                echo "alert('Username Atau Password Anda Tidak Cocok');";
                echo 'window.location.href = "../Layout/login.php";';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">'; 
            echo "alert('Login Gagal');";
            echo 'window.location.href = "../Layout/login.php";';
            echo '</script>';
        }
    }
?>