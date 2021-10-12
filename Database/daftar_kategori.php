<?php
    include "connector.php";

    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };

    $offset = 7;

    $start_from = ($page-1) * $offset;

    $query = "SELECT * FROM daftar_kategori ORDER BY nama ASC LIMIT $start_from, $offset";
    $queryTotal = "SELECT * FROM daftar_kategori ORDER BY nama ASC";

    $resultKategori = mysqli_query($connect, $query);
    $resultAllKategori = mysqli_query($connect, $queryTotal);

    $resultJumlahKategori = mysqli_num_rows(mysqli_query($connect, $queryTotal));

    $totalPages = ceil($resultJumlahKategori / 7);
?>