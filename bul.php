<?php require_once("config.php");
    ob_start();
    include("includes/header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $bas = "FD Sözlük";
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $bas . '$3', $buffer);
    echo $buffer;
?>
    <section class="main-container public" id="main">
        <div class="search-box">
            <form action="bul.php" method="POST">
                <input name="kelime" type="text" placeholder="Kelime ara.." class="search-text">
                <select name="dil" id="dil" class="search-select">
                    <option value="tr">TR-EN</option>
                    <option value="en">EN-TR</option>
                </select>
                <input type="submit" value="Çevir" class="bul-submit">
            </form>     
        </div>
        <div class="sonuc">
            <?php
            $dil = $_POST['dil'];
            $kelime = $_POST['kelime'];
            if ($dil == 'tr') {
                $sql = mysqli_query($baglan, "SELECT turkce,ingilizce FROM  dil WHERE turkce LIKE '$kelime%'");
                if (mysqli_num_rows($sql) > 0) {
                    while ($yaz = mysqli_fetch_array($sql)) {
                        extract($yaz);
                        echo "Aradığınız kelime: ".$kelime."<br>".
                        " İngilizcesi: ". $ingilizce;
                    }

                    header("Refresh: 10; url=index.php");
                }else {
                    echo "Aradığınız kelimenin karşılığı bulunamadı.";
                }
            } else {
                $sql = mysqli_query($baglan, "SELECT turkce,ingilizce FROM  dil WHERE ingilizce LIKE '$kelime%'");
                if (mysqli_num_rows($sql) > 0) {
                    while ($yaz = mysqli_fetch_array($sql)) {
                        extract($yaz);
                        echo "Aradığınız kelime: ".$kelime."<br>".
                        " İngilizcesi: ". $turkce;
                    }
                    header("Refresh:10; url:index.php");
                }else {
                    echo "Aradığınız kelimenin karşılığı bulunamadı.";
                }
            }
            ?>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>