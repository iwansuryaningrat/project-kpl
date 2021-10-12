<?php
    include "connector.php";

    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };

    $offset = 7;
    
    $start_from = ($page-1) * $offset;

    $query = "SELECT * FROM daftar_barang ORDER BY nama ASC LIMIT $start_from, $offset";
    $queryTotal = "SELECT * FROM daftar_barang";

    $resultBarang = mysqli_query($connect, $query);

    $resultJumlahBarang = mysqli_num_rows(mysqli_query($connect, $queryTotal));

    $totalPages = ceil($resultJumlahBarang / 7);
?>