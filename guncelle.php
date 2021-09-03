<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "FD SÖZLÜK - Duzenle";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;
?>
<?php
$id = $_GET['id'];
$getir = mysqli_query($baglan, "SELECT * FROM dil WHERE id = '$id'");
$yazdir = mysqli_fetch_array($getir);

?>
<div class="main-container">
    <?php 
    $id = $_POST['id'];
    $turkce = $_POST['turkce'];
    $ingilizce = $_POST['ingilizce'];
    $guncelle = mysqli_query($baglan, "UPDATE dil SET turkce='$turkce', ingilizce='$ingilizce' WHERE id='$id'");
    if($guncelle){
        header('Location:admin.php?status=isUpdate');

    }else{
        header('Location:admin.php?status=isntUptate');
    }
   ?>
</div>

<?php
include 'includes/footer.php';
?>