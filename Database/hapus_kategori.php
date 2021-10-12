<?php
    include "connector.php";

    if (isset($_POST)) {
        $id = $_POST["id"];

        $query = "DELETE FROM daftar_kategori WHERE id='$id'";

        mysqli_query($connect, $query);
        
    }

    mysqli_close($connect);
?>