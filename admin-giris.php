<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "Admin Giriş";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;
?>
<div class="main-container ">
    <div class="giris-box">
        <h1>Admin Giriş</h1>
        <?php
        if (isset($_SESSION['admin'])) {
            echo "Hoşgeldiniz Sayın " . $_SESSION['admin'];
        } else {

            echo '
            <form action="giris.php" method="POST">
                <input class="giris-input"  type="text" required name="kullanici_adi" placeholder="Kullanıcı Adı">
                <input class="giris-input" type="password" required name="sifre" placeholder="Şifre">
                <input class="giris-btn"  type="submit" value="Giriş">
            </form>';
        } ?>
        <a href="kayit.php">Yeni Hesap oluştur </a>
    </div>
</div>
<?php include 'includes/footer.php'; ?>