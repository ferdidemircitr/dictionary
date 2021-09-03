<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "FD SÖZLÜK - Duzenle";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;


$id = $_REQUEST['id'];
$getir = mysqli_query($baglan, "SELECT * FROM dil WHERE id = '$id'");
$yazdir = mysqli_fetch_array($getir);

?>
<div class="main-container">
    <?php if(isset($_SESSION['admin'])){?>
    <div class="new-word-box">
        <h3>Kaydınızı düzenleyibilirsiniz:</h3>
        <form method="post" name="guncelle" action="guncelle.php">
            <input type="hidden" name="id" class="new-text" value="<?php echo $yazdir["id"]; ?>">
            Turkçesi<input type="text" name="turkce" class="new-text" value="<?php echo $yazdir["turkce"]; ?>">
            İngilizcesi<input type="text" name="ingilizce" class="new-text" value="<?php echo $yazdir["ingilizce"]; ?>">
            <input type="submit" value="Duzenle" class="new-submit">
        </form>
    </div>
    <?php }else{   
        echo "Giriş yapmadan erişemezsiniz.";
        header("Refresh:2; url=admin-giris.php");
    } ?>
</div>
<?php
include 'includes/footer.php';
?>