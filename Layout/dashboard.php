<?php
    include '../Config/session.php';
    include "../Database/daftar_barang.php";
    include "../Database/daftar_kategori.php";
    include "../Database/daftar_transaksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/side_nav.css">

    <title>Dashboard</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <i class="fa fa-tachometer-alt fa-2x" aria-hidden="true"></i>
                <span>DASHBOARD</span>

                <table>
                    <tr>
                        <td class="statistik">
                            <div class="container">
                                <h4>Jumlah Barang</h4>
                                <table>
                                    <tr>
                                        <td>
                                            <h2><?php echo $resultJumlahBarang ?></h2>
                                            <h6><a href="daftar_barang.php" style="text-decoration: none; color: black;">Lihat detail >></a></h6>
                                        </td>
                                        <td>
                                            <i class="fas fa-boxes fa-5x" style="opacity: 0.5;" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td></td>
                        <td class="statistik">
                            <div class="container">
                                <h4>Jumlah Kategori</h4>
                                <table>
                                    <tr>
                                        <td>
                                            <h2><?php echo $resultJumlahKategori ?></h2>
                                            <h6><a href="daftar_kategori.php" style="text-decoration: none; color: black;">Lihat detail >></a></h6>
                                        </td>
                                        <td>
                                            <i class="fas fa-clipboard-list fa-5x" style="opacity: 0.5;" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td></td>
                        <td class="statistik">
                            <div class="container">
                                <h4>Jumlah Transaksi</h4>
                                <table>
                                    <tr>
                                        <td>
                                            <h2><?php echo $resultJumlahTransaksi ?></h2>
                                            <h6><a href="daftar_transaksi.php" style="text-decoration: none; color: black;">Lihat detail >></a></h6>
                                        </td>
                                        <td>
                                            <i class="fas fa-file-alt fa-5x" style="opacity: 0.5;" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
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