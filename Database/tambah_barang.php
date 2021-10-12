<?php 
    include "../Database/connector.php";

    if ($_POST["btnSubmit"] == "cancel") {
        header("location:../Layout/daftar_barang.php");
    } else {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama = $_POST["namaBarang"];
            $kategori = $_POST["kategoriBarang"];
            $jumlah = $_POST["jumlahBarang"];
            $hargaPokok = $_POST["hargaPokok"];
            $hargaJual = $_POST["hargaJual"];
    
            if ($nama != "" && $nama != null && $kategori != "" && $jumlah != "" && $hargaPokok != "" && $hargaJual != "") {
                $query = "INSERT INTO daftar_barang (nama, kategori, jumlah, harga_beli, harga_jual) VALUES ('$nama', '$kategori', '$jumlah', '$hargaPokok', '$hargaJual')";
    
                $result = mysqli_query($connect, $query);
        
                if ($result) {
                    header("location:../Layout/daftar_barang.php");
                } else {
                    echo '<script type="text/javascript">'; 
                    echo "alert('Gagal Tambah Barang');";
                    echo 'window.location.href = "../Layout/tambah_barang.php";';
                    echo '</script>';
                }
            } else {
                echo '<script type="text/javascript">'; 
                echo "alert('Isi Data Dengan Benar');";
                echo 'window.location.href = "../Layout/tambah_barang.php";';
                echo '</script>';
            }
        }
    }

    mysqli_close($connect);
?>