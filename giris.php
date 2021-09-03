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
        $kullanici_adi = $_POST['kullanici_adi'];
        $sifre = md5($_POST['sifre']);
        $sql = mysqli_query($baglan, "SELECT * FROM kullanici WHERE kullanici_adi='$kullanici_adi' AND sifre='$sifre'");
        if(mysqli_num_rows($sql) > 0){
            $admin = $_SESSION['admin'] = $kullanici_adi;
            echo "Hoşgeldiniz Sayın <b>".$admin."</b>Giriş yapıldı yönlendiriliyorsunuz.";
            header("Refresh:1; url=admin.php");
        }else{
            echo "Kullanıcı adı veya şifre yanlış!";
            header("Refresh:1; url=admin-giris.php");
        }
    ?>
</div>
<?php include 'includes/footer.php'; ?>