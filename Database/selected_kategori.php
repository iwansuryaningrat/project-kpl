<?php
    include "connector.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION["idKategori"] = $_POST["idKategori"];
    }

    if (!empty($_SESSION["idKategori"]) && !is_null($_SESSION["idKategori"])) {
        $id = $_SESSION["idKategori"];

        $query = "SELECT * FROM daftar_kategori WHERE id='$id'";

        $resultSelectedKategori = mysqli_query($connect, $query);
    }
?>