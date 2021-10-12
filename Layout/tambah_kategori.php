<?php
    include '../Config/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/tambah_kategori.css">

    <title>Tambah Kategori</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>TAMBAH KATEGORI</span>

                <table>
                    <td>
                        <form method="POST" action="../Database/tambah_kategori.php" class="form-inline">
                            <div class="form-group">
                                <label>Nama Kategori</label> <br>
                                <input type="text" class="form-control" name="namaKategori" id="inputNamaKategori">
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