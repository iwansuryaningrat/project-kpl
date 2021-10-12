<?php
    include "connector.php";

    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };

    $offset = 10;

    $start_from = ($page-1) * $offset;

    $query = "SELECT * FROM daftar_transaksi ORDER BY tanggal DESC LIMIT $start_from, $offset";
    $queryTotal = "SELECT * FROM daftar_transaksi";

    $resultTransaksi = mysqli_query($connect, $query);

    $resultJumlahTransaksi = mysqli_num_rows(mysqli_query($connect, $queryTotal));

    $totalPages = ceil($resultJumlahTransaksi / 10);
?>