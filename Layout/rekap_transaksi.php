<?php
    include '../Config/session.php';
    include "../Database/selected_transaksi.php";
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

    <title>Rekap Transaksi</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>REKAP TRANSAKSI</span>

                <table class="table-data">
                    <tr>
                        <th style="width: 22%;">Tanggal</th>
                        <th style="width: 18%;">Nama Admin</th>
                        <th style="width: 45%;">Aktivitas</th>
                        <th style="width: 15%;">Profit/Defisit</th>
                    </tr>
                    <?php
                        if ($resultRekap) {
                            while ($row = mysqli_fetch_array($resultRekap)) {
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
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=1">First</a></td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=<?php echo $page - 1 ?>">Prev</a></td>
                        <td style="<?php if ($page < 3) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></td>
                        <td ><a class="pagination" href="rekap_transaksi.php?page=<?php echo $page?>"><?php echo $page?></a></td>
                        <td style="<?php if ($page > $totalPages - 1) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></td>
                        <td style="<?php if ($totalPages < 4 || $page > $totalPages - 2) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=<?php echo $page + 1 ?>">Next</a></td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="rekap_transaksi.php?page=<?php echo $totalPages ?>">Last</a></td>
                    </tr>
                </table>

                <br>

                <button class="btn btn-primary" onclick="CetakRekap()" target="_BLANK">Cetak</button>
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

function CetakRekap() {
    location.href = "cetak_rekap.php";
}
</script>

</html>