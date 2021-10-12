<?php
    include '../Config/session.php';
    include "../Database/daftar_transaksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/daftar_transaksi.css">

    <title>Daftar Transaksi</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="form-popup form-container" id="formRekap">
                    <form action="rekap_transaksi.php" method="POST">
                        <div class="form-group">
                            <label>Pilih Tanggal</label> <br>
                            <input type="month" class="form-control date" style="text-align: center;" name="tanggalRekap" id="tanggalRekap">
                        </div>

                        <div class="form-group" style="text-align: center;">
                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #FF3A31;" name="btn-submit" value="Tutup">Tutup</button>
                            <button type="submit" class="btn btn-success btn-sm" style="background-color: #4ED964;" name="btn-submit" value="Pilih">Pilih</button>
                        </div>
                    </form>
                </div>

                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>DAFTAR TRANSAKSI</span>

                <button class="btn add-button" onclick="openForm()">Rekap Transaksi Bulanan</button>

                <table class="table-data">
                    <tr>
                        <th style="width: 22%;">Tanggal</th>
                        <th style="width: 18%;">Nama Admin</th>
                        <th style="width: 45%;">Aktivitas</th>
                        <th style="width: 15%;">Profit/Defisit</th>
                    </tr>
                    <?php
                        if ($resultTransaksi) {
                            while ($row = mysqli_fetch_array($resultTransaksi)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["tanggal"] ?></td>
                                    <td><?php echo $row["admin"] ?></td>
                                    <td><?php echo $row["aktivitas"] ?></td>
                                    <td style="<?php 
                                    if ($row["jenis_transaksi"] == "Pembelian") {
                                        echo "color: #FF3A31;";
                                    } else {
                                        echo "color: #4ED964;";
                                    } ?> font-weight: bold;" ><?php echo $row["profit_defisit"] ?></td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </table>

                <table style="float: right; border: none; width: 10%;">
                    <tr>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=1">First</a></td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=<?php echo $page - 1 ?>">Prev</a></td>
                        <td style="<?php if ($page < 3) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></td>
                        <td ><a class="pagination" href="daftar_transaksi.php?page=<?php echo $page?>"><?php echo $page?></a></td>
                        <td style="<?php if ($page > $totalPages - 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></td>
                        <td style="<?php if ($totalPages < 4 || $page > $totalPages - 2) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=<?php echo $page + 1 ?>">Next</a></td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="daftar_transaksi.php?page=<?php echo $totalPages ?>">Last</a></td>
                    </tr>
                </table>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>

<script type="text/javascript">
jQuery(function($) {
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });

    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });
});

function openForm() {
    document.getElementById("formRekap").style.display = "block";

    <?php unset($_SESSION["tanggalRekap"]); ?>
}
</script>

</html>