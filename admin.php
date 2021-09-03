<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "Admin Sayfam";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;
?>
<div class="main-container ">
    <?php 
    if(isset($_SESSION['admin'])){
        include 'ekle.php';
         
        include 'listele.php';
    }else{   
        echo "Giriş yapmadan erişemezsiniz.";
        header("Refresh:2; url=admin-giris.php");
    }
        
    ?>
    
</div>
<?php include 'includes/footer.php'; ?>