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
    <link rel="stylesheet" href="../CSS/cetak_rekap.css">

    <title>Rekap Transaksi <?php echo $tanggal ?></title>
</head>

<body>
    <div>
        <main>
            <div>
                <h3 style="text-align: center; padding: 12px;">Rekap Koperasi Bulan <?php 
                setlocale(LC_ALL, 'id'); 
                echo strftime('%B %Y', strtotime($tanggal)); 
                ?></h3>
                <table class="table-data">
                    <tr>
                        <th style="width: 22%;">Tanggal</th>
                        <th style="width: 18%;">Nama Admin</th>
                        <th style="width: 45%;">Aktivitas</th>
                        <th style="width: 15%;">Profit/Defisit</th>
                    </tr>
                    <?php
                        if ($resultCetak) {
                            while ($row = mysqli_fetch_array($resultCetak)) {
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

                <br>

                <table class="table-rekap">
                    <tr>
                        <td style="width: 70%"><b>Total Pendapatan</b></td>
                        <td style="width: 2%">:</td>
                        <td style="width: 28%">Rp <?php echo $rowPendapatan ?></td>
                    </tr>
                    <tr>
                        <td style="width: 70%"><b>Total Pengeluaran</b></td>
                        <td style="width: 2%">:</td>
                        <td style="width: 28%">Rp <?php echo $rowPengeluaran ?></td>
                    </tr>
                </table>
                
                <hr style="width: 40%; border: 1px solid;">

                <table class="table-rekap">
                    <tr>
                        <td style="width: 70%"><b>Total</b></td>
                        <td style="width: 2%">:</td>
                        <td style="width: 28%">Rp <?php echo $rowTotal; ?></td>
                    </tr>
                </table>
            </div>
            
            <br>
            <br>
            <br>

            <table>
                <tr>
                    <th style="width: 50px;"></th>
                    <th style="width: 200px; text-align: center;">Petugas Koperasi</th>
                </tr>
                <tr><td><br></td></tr>
                <tr><td><br></td></tr>
                <tr>
                    <td></td>
                    <td><hr style="border: 1px solid;"></td>
                </tr>
            </table>
        </main>
    </div>
</body>

<script type="text/javascript">
window.print();
</script>

</html>