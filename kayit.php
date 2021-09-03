<?php require_once("config.php");
ob_start();
include("includes/header.php");
$buffer = ob_get_contents();
ob_end_clean();
$bas = "Kayıt ol";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
echo $buffer;
?>

<div class="main-container ">
    <div class="giris-box">

        <?php
        if (isset($_SESSION['admin'])) {
            echo "HOŞGELDİNİZ ";
        } else {
        ?>
            <h1>Admin Kayıt ol</h1>

            <form action="admin-islem.php" method="POST">
                <input class="giris-input" type="text" name="kullanici_adi" placeholder="Kullanıcı Adı">
                <input class="giris-input" type="email" name="email" placeholder="Email">
                <input class="giris-input" type="password" name="sifre" placeholder="Şifre">
                <input class="giris-btn" type="submit" value="Kaydol">
            </form>
        <?php } ?>

        <a href="admin-giris.php">Zaten hesabın var mı? Giris Yap </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>