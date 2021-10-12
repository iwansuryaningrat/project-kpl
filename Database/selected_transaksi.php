<?php 
    include 'connector.php';

    if (!isset($_SESSION["tanggalRekap"])) {
        if ($_POST["btn-submit"] == "Tutup") {
            header("location:../Layout/daftar_transaksi.php");
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {    
                $tanggal = $_POST["tanggalRekap"];
    
                $_SESSION["tanggalRekap"] = $tanggal;
            }
        }
    } 
    
    if (isset($_SESSION["tanggalRekap"])) {
        $tanggal = $_SESSION["tanggalRekap"];

        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    
        $offset = 10;
    
        $start_from = ($page-1) * $offset;
        
        $query = "SELECT * FROM daftar_transaksi WHERE tanggal LIKE '$tanggal%' ORDER BY id ASC LIMIT $start_from, $offset";
        $queryTotal = "SELECT * FROM daftar_transaksi WHERE tanggal LIKE '$tanggal%'";
        $queryCetak = "SELECT * FROM daftar_transaksi WHERE tanggal LIKE '$tanggal%'";
        $queryPendapatan = "SELECT SUM(profit_defisit) AS pendapatan FROM daftar_transaksi WHERE jenis_transaksi='Penjualan'";
        $queryPengeluaran = "SELECT SUM(profit_defisit) AS pengeluaran FROM daftar_transaksi WHERE jenis_transaksi='Pembelian'";
    
        $resultRekap = mysqli_query($connect, $query);
        $resultCetak = mysqli_query($connect, $queryCetak);
        $resultPendapatan = mysqli_query($connect, $queryPendapatan);
        $resultPengeluaran = mysqli_query($connect, $queryPengeluaran);

        $rowPendapatan;
        $rowPengeluaran;
        $rowTotal;

        if ($resultPendapatan && $resultPengeluaran) {
            while ($row = mysqli_fetch_array($resultPendapatan)) {
                $rowPendapatan = $row["pendapatan"];
            }

            while ($row = mysqli_fetch_array($resultPengeluaran)) {
                $rowPengeluaran = $row["pengeluaran"];
            }
        }

        if ($rowPendapatan > $rowPengeluaran) {
            $rowTotal = $rowPendapatan-$rowPengeluaran;
        } else {
            $rowTotal = "-".$rowPengeluaran-$rowPendapatan;
        }
    
        $resultJumlahRekap = mysqli_num_rows(mysqli_query($connect, $queryTotal));
    
        $totalPages = ceil($resultJumlahRekap / 10);
    
        mysqli_close($connect);
    }
?>