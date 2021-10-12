<?php
    include '../Config/session.php';
    include "../Database/selected_barang.php";
    include "../Database/daftar_kategori.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/edit_barang.css">

    <title>Edit Barang</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>EDIT BARANG</span>

                <table>
                    <td>
                        <form class="form-inline" action="../Database/edit_barang.php" method="POST">
                            <?php 
                            if ($resultSelectedBarang) {
                                while ($row = mysqli_fetch_array($resultSelectedBarang)) {
                                    ?>
                                    <div class="form-group" style="display: none;">
                                        <label>ID</label> <br>
                                        <input type="text" class="form-control" name="idEditBarang" value="<?php echo $row["id"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label> <br>
                                        <input type="text" class="form-control" name="namaEditBarang" value="<?php echo $row["nama"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kategori Barang</label> <br>
                                        <select class="form-control custom-select my-1 mr-sm-2" name="kategoriEditBarang">
                                            <?php
                                                if ($resultKategori) {
                                                    while ($rowKategori = mysqli_fetch_array($resultKategori)) {
                                                        ?>
                                                        <option value="<?php echo $rowKategori["nama"] ?>"><?php echo $rowKategori["nama"] ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Barang</label> <br>
                                        <input type="number" class="form-control" name="jumlahEditBarang" value="<?php echo $row["jumlah"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Pokok</label> <br>
                                        <input type="number" class="form-control" name="hargaPokokEditBarang" value="<?php echo $row["harga_beli"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual</label> <br>
                                        <input type="number" class="form-control" name="hargaJualEditBarang" value="<?php echo $row["harga_jual"]; ?>">
                                    </div>
                                    <?php
                                }
                            }
                        ?>

                            <br>
                            <div style="float: right;">
                                <button class="btn btn-danger" style="background-color: #FF3A31;">Batal</button>
                                <button class="btn btn-primary" style="background-color: #0094FF;">Simpan</button>
                            </div>
                        </form>
                    </td>
                </table>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>

<script>
jQuery(function($) {
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });

    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });
});
</script>

</html>