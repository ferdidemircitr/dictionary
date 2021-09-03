<!-- Button trigger modal -->

<!-- Modal -->

<?php
require_once("config.php");

if (isset($_SESSION['admin'])) { ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead style="background-color: #3c40c6;">
                    <tr>
                        <th>ID</th>
                        <th>Türkçe</th>
                        <th>İngilizce</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sayfa = $_GET['sayfa'];
                    if (empty($sayfa) || !is_numeric($sayfa)) {
                        $sayfa = 1;
                    }
                    $kacar = 5;
                    $kSayisi = mysqli_num_rows(mysqli_query($baglan, "SELECT id FROM dil"));
                    $sSayisi = ceil($kSayisi / $kacar);
                    $nereden = ($sayfa * $kacar) - $kacar;

                    $bul = mysqli_query($baglan, "SELECT * FROM dil ORDER BY id DESC limit $nereden, $kacar");
                    while ($gelen = mysqli_fetch_array($bul)) {
                        extract($gelen);
                        $ID = $gelen['id'];
                        $turkce = $gelen['turkce'];
                        $ingilizce = $gelen['ingilizce'];

                        echo "<tr>";
                        echo "<td>$ID</td>";
                        echo "<td>$turkce</td>";
                        echo "<td>$ingilizce</td>";
                        echo "<td> 
                                    <a class='btn btn-success' href='duzenle.php?id=$ID'>Düzenle</a>
                                    <a  id='btnModal' class='btn btn-danger' href='$ID' data-toggle='modal' data-target='#exampleModal'>Sil</a>
                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Silme İşlemi</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                Sil işlemine devam etmek istiyor musunuz?
                                            </div>
                                            <div class='modal-footer'>
                                                <a class='btn btn-secondary' data-dismiss='modal'>Vazgeç</a>
                                                <form action='silPost.php' method='POST'>
                                                    <input type='hidden' name='id' class='btn btn-danger' value='$ID'>
                                                    <input type='submit' value='Sil' class='btn btn-danger'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="page d-flex justify-content-center">
                <?php

                for ($i = 1; $i <= $sSayisi; $i++) {
                    echo "<a href='admin.php?sayfa=$i' ";
                    if ($i == $sayfa) {
                        echo "class='active'";
                    }
                    echo ">$i</a>";
                }
                ?>
            </div>
        </div>
    </div>
<?php } else { 
    include 'includes/header.php';
    ?>
    <div class="main-container">
        <?php
        echo "Giriş yapmadan erişemezsiniz.";
        header("Refresh:2; url=admin-giris.php");
        ?>
    </div>
<?php
    include 'includes/footer.php';
}
?>
<script>
    document.getElementById('sil').value = document.getElementById('btnModal').href;
</script>