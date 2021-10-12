<?php
    include '../Config/session.php';
    include '../Database/daftar_kategori.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/tambah_barang.css">

    <title>Tambah Barang</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>TAMBAH BARANG</span>

                <table>
                    <td>
                        <form method="POST" action="../Database/tambah_barang.php" class="form-inline">
                            <div class="form-group">
                                <label>Nama Barang</label> <br>
                                <input type="text" class="form-control" name="namaBarang" id="inputNamaBarang">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kategori Barang</label> <br>
                                <select class="form-control custom-select my-1 mr-sm-2" name="kategoriBarang" id="inputKategoriBarang">
                                <?php
                                    if ($resultAllKategori) {
                                        while ($row = mysqli_fetch_array($resultAllKategori)) {
                                            ?>   
                                                <option value="<?php echo $row["nama"] ?>"><?php echo $row["nama"] ?></option>`
                                            <?php
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang</label> <br>
                                <input type="number" class="form-control" name="jumlahBarang" id="inputJumlahBarang">
                            </div>
                            <div class="form-group">
                                <label>Harga Pokok</label> <br>
                                <input type="number" class="form-control" name="hargaPokok" id="inputHargaPokok">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label> <br>
                                <input type="number" class="form-control" name="hargaJual" id="inputHargaJual">
                            </div>

                            <br>
                            <div style="float: right;">
                                <button type="submit" class="btn btn-danger" style="background-color: #FF3A31;" name="btnSubmit" value="cancel">Batal</button>
                                <button type="submit" class="btn btn-primary" style="background-color: #0094FF;" name="btnSubmit" value="submit">Simpan</button>
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