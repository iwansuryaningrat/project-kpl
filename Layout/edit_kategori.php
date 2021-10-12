<?php
    include '../Config/session.php';
    include "../Database/selected_kategori.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/edit_kategori.css">

    <title>Edit Kategori</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>EDIT KATEGORI</span>

                <table>
                    <td>
                        <form class="form-inline" action="../Database/edit_kategori.php" method="POST">
                            <div class="form-group">
                                <label>Nama Kategori</label> <br>
                                <?php
                                    if ($resultSelectedKategori) {
                                        while($row = mysqli_fetch_array($resultSelectedKategori)) {
                                            ?>
                                                <input type="text" class="form-control" style="display: none;" name="idEditKategori" value="<?php echo $row["id"]; ?>"></input>
                                                <input type="text" class="form-control" name="namaEditKategori" id="inputNamaKategori" value="<?php echo $row["nama"]; ?>">
                                            <?php
                                        }
                                    }
                                ?>
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

var itemID;

jQuery(function($) {
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });

    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });
});

function editKategori(id) {       
    $.post("../Database/edit_kategori.php", {
        id: itemID

        }, function(data, status) {
            alert("Data Berhasil Dihapus");
            window.location.reload(true);
        }
    );
}
</script>

</html>