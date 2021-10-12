<?php
    include '../Config/session.php';
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
    <link rel="stylesheet" href="../CSS/daftar_kategori.css">

    <title>Daftar Barang</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include 'side_nav.php'; ?>

        <?php include 'header.php'; ?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="form-popup" id="formHapus">
                    <form action="daftar_kategori.php" class="form-container">
                        <label>Hapus Kategori?</label> <br>

                        <div style="text-align: center;">
                            <button class="btn btn-danger btn-sm" style="background-color: #FF3A31;"
                                onclick="closeForm()">Tidak</button>
                            <button type="submit" class="btn btn-success btn-sm"
                                style="background-color: #4ED964;" onclick="hapusKategori()">Ya</button>
                        </div>
                    </form>
                </div>

                <i class="fas fa-clipboard-list fa-2x" aria-hidden="true"></i>
                <span>DAFTAR KATEGORI</span>

                <button onclick="location.href='tambah_kategori.php'" class="btn add-button">Tambah Kategori</button>

                <table class="table-data">
                    <tr>
                        <th style="width: 2%">No</th>
                        <th class="nama">Nama Kategori</th>
                        <th style="width: 10%">Edit</th>
                        <th style="width: 10%">Hapus</th>
                    </tr>

                    <?php 
                        if ($resultKategori) {
                            $i = 1 + $offset * ($page - 1);
                            while ($row = mysqli_fetch_array($resultKategori)) {
                                ?>
                                <tr>
                                    <form action="edit_kategori.php" method="POST">
                                        <div class="form-group" style="display: none;">
                                            <input type="text" name="idKategori" value="<?php echo $row['id'] ?>">
                                        </div>
                                        <td><?php echo $i; ?></td>
                                        <td class="nama" style="padding-left: 12px;"><?php echo $row["nama"]; ?></td>
                                        <td><button type="submit" class="button btn-sm"><i class='fas fa-edit fa-lg'></i></button></td>
                                    </form>
                                    <td><button type="submit" class="button btn-sm"><i class='fas fa-trash fa-lg' onclick="openForm(this.id)" id=<?php echo $row["id"] ?>></i></button></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                    ?>
                </table>

                <table style="float: right; border: none; width: 10%;">
                    <tr>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=1">First</a></td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=<?php echo $page - 1 ?>">Prev</a></td>
                        <td style="<?php if ($page < 3) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page <= 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></td>
                        <td ><a class="pagination" href="daftar_kategori.php?page=<?php echo $page?>"><?php echo $page?></a></td>
                        <td style="<?php if ($page > $totalPages - 1) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></td>
                        <td style="<?php if ($totalPages < 4 || $page > $totalPages - 2) {echo "display: none;";}?> ">...</td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=<?php echo $page + 1 ?>">Next</a></td>
                        <td style="<?php if ($page >= $totalPages) {echo "display: none;";}?> "><a class="pagination" href="daftar_kategori.php?page=<?php echo $totalPages ?>">Last</a></td>
                    </tr>
                </table>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript">

        var itemID;

        jQuery(function($) {
            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });

            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });

        function openForm(id) {
            document.getElementById("formHapus").style.display = "block";

            itemID = id;
        }

        function closeForm() {
            document.getElementById("formHapus").style.display = "none";
        }

        function hapusKategori() {   
            $.post("../Database/hapus_kategori.php", {
                id: itemID

                }, function(data, status) {
                    alert("Data Berhasil Dihapus");
                    window.location.reload(true);
                }
            );
        }
    </script>
</body>

</html>