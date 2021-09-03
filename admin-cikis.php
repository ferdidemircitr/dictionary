<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "FD SÖZLÜK - Ekle";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;
?>
<div class="main-container ">

    <?php
        if(isset($_SESSION['admin'])){
            session_destroy();
            header("Location:admin-giris.php");
        }else{
            header("Location:kayit.php");
        }
    ?>
</div>
<?php include 'includes/footer.php'; ?>