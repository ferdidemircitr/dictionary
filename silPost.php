<?php 
require_once("config.php");

    $silinecek = $_POST['id'];
    $sil = mysqli_query($baglan, "DELETE FROM dil WHERE id='$silinecek'");
    if($sil){
        header('Location:admin.php?status=isDelete');
    }else{
        echo 'Kelime silinemedi';
    }
?>