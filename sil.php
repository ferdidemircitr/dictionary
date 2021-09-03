<?php 
require_once("config.php");

    $silinecek = $_GET['id'];
    $sil = mysqli_query($baglan, "DELETE FROM dil WHERE id='$silinecek'");
    if($sil){
        header('Refresh:5; url=admin.php?status=isDelete');
        header('Location: admin.php?status=isDelete');
    }else{
        echo 'Kelime silinemedi';
    }
?>