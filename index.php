<?php include 'includes/header.php'; ?>
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
    </section>
<?php include 'includes/footer.php'; ?>