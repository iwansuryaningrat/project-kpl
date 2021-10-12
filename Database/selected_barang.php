<?php
    include "connector.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION["idBarang"] = $_POST["idBarang"];
    }

    if (!empty($_SESSION["idBarang"]) && !is_null($_SESSION["idBarang"])) {
        $id = $_SESSION["idBarang"];

        $query = "SELECT * FROM daftar_barang WHERE id='$id'";

        $resultSelectedBarang = mysqli_query($connect, $query);
    }
?>