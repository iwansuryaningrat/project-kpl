<?php 
    include 'connector.php';
    
    $id = $_POST["id"];
    $barang = $_POST["barang"];
    $jumlah = $_POST["jumlah"];
    $jenisTransaksi = $_POST["jenisTransaksi"];
    $totalHarga = $_POST["total"];

    if ($jenisTransaksi == "Penjualan") {
        $queryJual = "INSERT INTO daftar_transaksi (admin, aktivitas, jenis_transaksi, profit_defisit, tanggal) VALUES ('Admin 1', 'Menjual $barang Sebanyak $jumlah Buah', '$jenisTransaksi', '$totalHarga', NOW())";

        $resultJualBarang = mysqli_query($connect, $queryJual);

        if ($resultJualBarang) {
            $queryUpdateBarang = "UPDATE daftar_barang SET jumlah=((SELECT jumlah FROM daftar_barang WHERE id='$id')-'$jumlah') WHERE id='$id'";

            $resultUpdateBarang = mysqli_query($connect, $queryUpdateBarang);

            if ($resultUpdateBarang) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = 'failed';
            }
        }
    } else {
        $queryBeli = "INSERT INTO daftar_transaksi (admin, aktivitas, jenis_transaksi, profit_defisit, tanggal) VALUES ('Admin 1', 'Membeli $barang Sebanyak $jumlah Buah', '$jenisTransaksi', '$totalHarga', NOW())";

        $resultBeliBarang = mysqli_query($connect, $queryBeli);

        if ($resultBeliBarang) {
            $queryUpdateBarang = "UPDATE daftar_barang SET jumlah=((SELECT jumlah FROM daftar_barang WHERE id='$id')+'$jumlah') WHERE id='$id'";

            $resultUpdateBarang = mysqli_query($connect, $queryUpdateBarang);

            if ($resultUpdateBarang) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = 'failed';
            }
        }
    }

    header('Content-type: application/json');
    echo json_encode($response_array);

    mysqli_close($connect);
?>