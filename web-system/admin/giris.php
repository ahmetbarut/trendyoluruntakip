<?php
session_start();
require_once '../db.php';

if (@$_SESSION['email']) {
    header("Location: datalist.php");
    exit();
}

if ($_POST) {
    $email = trim(@$_POST['email']);
    $parola = trim(@$_POST['parola']);

    $sorgu = $db->prepare('SELECT * FROM user WHERE email=? AND parola=?');
    $sorgu->execute(array($email, $parola));
    $sorgugetir = $sorgu->fetch(PDO::FETCH_ASSOC);


    if ($sorgugetir) {
        $_SESSION['adsoyad'] = $sorgugetir['adsoyad'];
        $_SESSION['email'] = $sorgugetir['email'];
        header("Location: datalist.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<h1 class="display-5 mt-5 text-center">Trendyol Admin</h1>
<div class="container">
    <form action="giris.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-Mail</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parola</label>
            <input type="password" class="form-control" name="parola">
        </div>
        <button type="submit" class="btn btn-primary">GİRİŞ YAP</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>