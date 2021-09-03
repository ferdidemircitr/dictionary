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
        $kullanici_adi = trim($_POST['kullanici_adi']);
        $email = trim($_POST['email']);
        $sifre = trim($_POST['sifre']);
        $sifre2 = md5($sifre);
        if((empty($kullanici_adi)) or (empty($sifre)) or (empty($email))){
            echo "Boş alan bırakmayınız.";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Geçersiz email adresi girdiniz.";
        }else{
            $sql = mysqli_query($baglan, "SELECT * FROM kullanici WHERE kullanici_adi='$kullanici_adi' OR email='$email'");
            $kontrol = mysqli_num_rows($sql);
            if($kontrol > 0){
                echo "Kullanıcı adı veya email mevcut.";
                header("Refresh:2; url=kayit.php");
            }else{
                $add = mysqli_query($baglan, "INSERT INTO kullanici (kullanici_adi,email,sifre) VALUES ('$kullanici_adi','$email','$sifre2')");
                if($add){
                    echo "Kayıt başarılı bir şekilde yapıldı.";
                header("Refresh:2; url=admin-giris.php");
                }else{
                    echo "<h1>Hata!</h1>";
                    echo "<p>Kayıt yapılmadı!</p>";
                    header("Refresh:2; url=giris-kayit.php");
                }              
            }
        }
    ?>
</div>
<?php include 'includes/footer.php'; ?>