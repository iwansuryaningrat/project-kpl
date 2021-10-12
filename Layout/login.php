<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include '../Js/bootstrap.php'; ?>
    <?php include '../Js/jquery.php'; ?>

    <link rel="stylesheet" href="../CSS/login.css">

    <title>Login</title>
</head>

<body>
    <div class="login">
        <h2 class="judul">Masukkan Identitas Admin</h2>

        <form action="../Database/login.php" method="POST">
            <div class="form-group akun">
                <label>Username</label>
                <input type="text" class="form-control" name="inputUsername" placeholder="Masukkan Username Admin">
            </div>

            <div class="form-group akun">
                <label>Password</label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Masukkan Password Admin">
            </div>

            <div class="form-group submit">
                <input type="submit" class="btn btn-primary submit" style="background-color: #0094FF" value="Masuk">
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>