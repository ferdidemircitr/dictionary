<?php require_once("config.php");?>
    <?php 
        $turkce = $_POST['turkce'];
        $ingilizce = $_POST['ingilizce'];
        $kayitlar = mysqli_query($baglan, "SELECT * FROM dil WHERE turkce='$turkce'");
        if(mysqli_num_rows($kayitlar)){
            header('Location:admin.php?status=available');
        }else{
            $add = mysqli_query($baglan, "INSERT INTO dil (turkce,ingilizce) VALUES ('$turkce','$ingilizce')");
            if($add){
                header('Location:admin.php?status=success');
            }else{
                header('Location:admin.php?status=error');
            }
        }
    ?>