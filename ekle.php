<div class="new-word-box">
    <h3>Yeni kelime ekle</h3>
    <?php
    if ($_GET['status'] == 'success') { ?>
        <div class="alert alert-success" role="alert">
            <strong> Harika! </strong>Yeni kelime eklendi!

        </div> <?php
            } elseif ($_GET['status'] == 'available') { ?>
        <div class="alert alert-warning" role="alert">
            <strong> Uyarı! </strong>Bu kayıt mevcut.
        </div>
    <?php } elseif ($_GET['status'] == 'error'){ ?>
        <div class="alert alert-danger" role="alert">
            <strong> Hata! </strong> Kayıt edilemedi.
        </div>
    <?php } elseif ($_GET['status'] == 'isUpdate'){ ?>
        <div class="alert alert-success" role="alert">
            <strong> Harika! </strong> Düzenleme işlemi başarılı.
        </div>
    <?php }elseif ($_GET['status'] == 'isDelete'){ ?>
        <div class="alert alert-success" role="alert">
            <strong> Harika! </strong> Silme işlemi başarılı.
        </div>
    <?php } ?>
    <form action="kaydet.php" method="POST">

        <input type="text" placeholder="Türkçesi" name="turkce" class="new-text" required>
        <input type="text" placeholder="İngilizcesi" name="ingilizce" class="new-text" required>
        <input type="submit" value="Ekle" class="new-submit">
    </form>
</div>