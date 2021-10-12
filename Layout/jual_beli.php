<?php
    include '../Config/session.php';
    include "../Database/daftar_jual_beli.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/side_nav.css">
    <link rel="stylesheet" href="../CSS/jual_beli.css">

    <title>Jual Beli</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="form-popup form-container" id="formJual">
                    <label>Jumlah Barang</label> <br>
                    <input type="number" class="form-control" style="text-align: center;" name="jumlahJualBarang" id="inputJumlahJualBarang" onchange="formTotalHarga('Jual')">

                    <label>Total Harga:</label>
                    <label id="totalHargaJual">0</label>

                    <div style="text-align: center;">
                        <button class="btn btn-danger btn-sm" style="background-color: #FF3A31;"
                            onclick="closeForm('Jual')">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm"
                            style="background-color: #4ED964;" onclick="jualBarang()">Jual</button>
                    </div>
                </div>

                <div class="form-popup form-container" id="formBeli">
                    <label>Jumlah Barang</label> <br>
                    <input type="number" class="form-control" style="text-align: center;" name="jumlahBeliBarang" id="inputJumlahBeliBarang"  onchange="formTotalHarga('Beli')">

                    <label>Total Harga:</label>
                    <label id="totalHargaBeli">0</label>

                    <div style="text-align: center;">
                        <button class="btn btn-danger btn-sm" style="background-color: #FF3A31;"
                            onclick="closeForm('Beli')">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm"
                            style="background-color: #4ED964;" onclick="beliBarang()">Beli</button>
                    </div>
                </div>

                <i class="fas fa-boxes fa-2x" aria-hidden="true"></i>
                <span>JUAL BELI</span>

                <table class="table-data">
                    <tr>
                        <th style="width: 2%;">No</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Jumlah Barang</th>
                        <th style="width: 10%;">Jual</th>
                        <th style="width: 10%;">Beli</th>
                    </tr>
                        <?php
                        if ($resultBarang) {
                            $i = 1 + $offset * ($page - 1);

                            while ($row = mysqli_fetch_array($resultBarang)) {
                                ?>
                                <tr>
                                    <td style="display: none;"><input type="text" name="idBarang" value="<?php echo $row['id'] ?>"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["kategori"]; ?></td>
                                    <td><?php echo $row["jumlah"]; ?></td>

                                    <td style="width: 10%"><button class="btn btn-jual btn-sm" style="width: 80%" onclick="openForm(this.id, 'Jual', '<?php echo $row['nama']; ?>', '<?php echo $row['jumlah']; ?>', '<?php echo $row['harga_jual']; ?>')" id="<?php echo $row["id"]; ?>">Jual</button></td>
                                    <td style="width: 10%"><button class="btn btn-beli btn-sm" style="width: 80%" onclick="openForm(this.id, 'Beli', '<?php echo $row['nama']; ?>', '<?php echo $row['jumlah']; ?>', '<?php echo $row['harga_beli']; ?>')" id="<?php echo $row["id"]; ?>">Beli</button></td>
                                </tr>
                        <?php
                        $i++;
                            }
                        }
                        ?>
                </table>

                <table style="float: right; border: none; width: 10%;">
                    <tr>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a href="jual_beli.php?page=1">First</a></td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a href="jual_beli.php?page=<?php echo $page - 1 ?>">Prev</a></td>
                        <td style="<?php if ($page < 3) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a href="jual_beli.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></td>
                        <td ><a href="jual_beli.php?page=<?php echo $page?>"><?php echo $page?></a></td>
                        <td style="<?php if ($page > $totalPages - 1) {echo "display: none;";}?> "><a href="jual_beli.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></td>
                        <td style="<?php if ($totalPages < 4 || $page > $totalPages - 2) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a href="jual_beli.php?page=<?php echo $page + 1 ?>">Next</a></td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a href="jual_beli.php?page=<?php echo $totalPages ?>">Last</a></td>
                    </tr>
                </table>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>

<script>

var itemID;
var itemHarga;
var itemNama;
var itemTotal;
var totalHarga;

jQuery(function($) {
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });

    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });
});

function beliBarang() {       
    var jumlahBarang = $('#inputJumlahBeliBarang').val();

    $.post("../Database/jual_beli.php", {
        id: itemID,
        barang: itemNama,
        jumlah: jumlahBarang,
        jenisTransaksi: 'Pembelian',
        total: totalHarga

        }, function(data, status) {
            if (data.status == 'failed') {
                alert("Pembelian Barang Gagal");
            } else {
                alert("Pembelian Barang Berhasil");
            }
            window.location.reload(true);
        }
    );
}

function jualBarang() {       
    var jumlahBarang = $('#inputJumlahJualBarang').val();

    $.post("../Database/jual_beli.php", {
        id: itemID,
        barang: itemNama,
        jumlah: jumlahBarang,
        jenisTransaksi: 'Penjualan',
        total: totalHarga

        }, function(data, status) {
            if (data.status == 'failed') {
                alert("Penjualan Barang Gagal");
            } else {
                alert("Penjualan Barang Berhasil");
            }
            window.location.reload(true);
        }
    );
}

function openForm(id, typeForm, namaItem, totalItem, hargaItem) {
    if (typeForm == "Jual") {
        document.getElementById("formJual").style.display = "block";
    } else {
        document.getElementById("formBeli").style.display = "block";
    }

    itemID = id;
    itemHarga = hargaItem;
    itemNama = namaItem;
    itemTotal = totalItem;
}

function closeForm(typeForm) {
    if (typeForm == "Jual") {
        document.getElementById("formJual").style.display = "none";
    } else {
        document.getElementById("formBeli").style.display = "none";
    }

    itemHarga = 0;
    itemNama = "";
    itemTotal = 0;
    totalHarga = 0;

    document.getElementById('inputJumlahJualBarang').value = 0;
    document.getElementById('inputJumlahBeliBarang').value = 0;

    document.getElementById('totalHargaJual').innerHTML = 0;
    document.getElementById('totalHargaBeli').innerHTML = 0;
}

function formTotalHarga(jenisTransaksi) {
    var jumlahJualBarang = document.getElementById('inputJumlahJualBarang');
    var jumlahBeliBarang = document.getElementById('inputJumlahBeliBarang');

    if (jenisTransaksi == "Jual") {
        if (parseInt(jumlahJualBarang.value) > itemTotal) {
            alert("Persediaan Barang Tidak Mencukupi");
            jumlahJualBarang.value = itemTotal;
        } 

        if (parseInt(jumlahJualBarang.value) < 0) {
            jumlahJualBarang.value = 0;
        }

        totalHarga = itemHarga * jumlahJualBarang.value;
        document.getElementById('totalHargaJual').innerHTML = totalHarga;
    } else {
        if (parseInt(jumlahBeliBarang.value) < 0) {
            jumlahBeliBarang.value = 0;
        }
        
        totalHarga = itemHarga * jumlahBeliBarang.value;
        document.getElementById('totalHargaBeli').innerHTML = totalHarga;
    }
}
</script>

</html>