<?php
    include 'connector.php';

    if ($_POST["btnSubmit"] == "cancel") {
        header("location:../Layout/daftar_barang.php");
    } else {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_POST['idEditBarang'];
            $nama = $_POST['namaEditBarang'];
            $jumlah = $_POST['jumlahEditBarang'];
            $kategori = $_POST['kategoriEditBarang'];
            $hargaJual = $_POST['hargaJualEditBarang'];
            $hargaBeli = $_POST['hargaPokokEditBarang'];
        
            $query = "UPDATE daftar_barang SET nama='$nama', kategori='$kategori', jumlah='$jumlah', harga_beli='$hargaBeli', harga_jual='$hargaJual' WHERE id='$id'";
    
            $resultEditBarang = mysqli_query($connect, $query);

            if ($resultEditBarang) {
                header("location:../Layout/daftar_barang.php");
            } else {
                echo '<script type="text/javascript">'; 
                echo "alert('Gagal Ubah Barang');";
                echo 'window.location.href = "../Layout/daftar_barang.php";';
                echo '</script>';
            }
    
        }
    }

    mysqli_close($connect);
?>