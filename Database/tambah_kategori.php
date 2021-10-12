<?php 
    include "../Database/connector.php";

    if ($_POST["btnSubmit"] == "cancel") {
        header("location:../Layout/daftar_kategori.php");
    } else {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama = $_POST["namaKategori"];
    
            if ($nama != "" && $nama != null) {
                $query = "INSERT INTO daftar_kategori (nama) VALUES ('$nama')";    

                $result = mysqli_query($connect, $query);
        
                if ($result) {
                    header("location:../Layout/daftar_kategori.php");
                } else {
                    echo '<script type="text/javascript">'; 
                    echo "alert('Gagal Tambah Kategori');";
                    echo 'window.location.href = "../Layout/tambah_kategori.php";';
                    echo '</script>';
                }
            } else {
                echo '<script type="text/javascript">'; 
                echo "alert('Isi Data Dengan Benar');";
                echo 'window.location.href = "../Layout/tambah_kategori.php";';
                echo '</script>';
            }
        }
    }

    mysqli_close($connect);
?>