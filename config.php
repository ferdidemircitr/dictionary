<?php 
    $vt_sunucu = "localhost";
    $vt_kullanici = "root";
    $vt_sifre = "";
    $vt_adi= "sozluk";
    $baglan = mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi);

    if(!$baglan){
        die("Veritabanı baglanti islemi başarısız.".mysqli_connect_error());
    }
    else{
    }
    session_start();
?>