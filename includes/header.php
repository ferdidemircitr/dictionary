<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FD Sözlük</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="logo-container">
            <a href="index.php">
                <h1>Sözlük</h1>
            </a>
        </div>
        <div class="admin">
            <?php
            $admin = $_SESSION['admin'];
            if ($admin) {
                echo '<a class="cikis" href="admin-cikis.php">Çıkış Yap</a>';
            }
            ?>
            <div class="admin-login">
                <a href="admin.php"><i class="fas fa-user"></i></a>
            </div>
        </div>

    </header>