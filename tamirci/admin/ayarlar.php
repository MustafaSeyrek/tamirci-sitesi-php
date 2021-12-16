<?php
include 'header.php';
include 'sidebar.php';

//session_start();

if (!isset($_SESSION['admin_kadi'])) {
    header('Location:login.php');
}

$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$ayarSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from ayarlar");
$ayarCek = mysqli_fetch_assoc($ayarSorgu);
?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SİTE GENEL AYARLARI</h1>
                <?php
                if (isset($_GET['durum'])) {
                    if ($_GET['durum'] == "ok") {
                ?>
                        <h1 style="color:green" class="page-subhead-line">Güncelleme işlemi başarılı. </h1>
                    <?php } else if ($_GET['durum'] == "no") {
                    ?>
                        <h1 style="color:red" class="page-subhead-line">Güncelleme işlemi başarısız. </h1>
                    <?php }
                } else {
                    ?>
                    <h1 class="page-subhead-line">Sitenizin ayarlarını buradan güncelleyebilirsiiz. </h1>
                <?php }
                ?>


            </div>
        </div>


        <form action="islem.php" method="POST">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Başlığı</label>
                    <input class="form-control" type="text" name="ayar_title" value="<?php echo $ayarCek['ayar_title'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Açıklaması</label>
                    <input class="form-control" type="text" name="ayar_description" value="<?php echo $ayarCek['ayar_description'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Site Anahtar Kelimeler</label>
                    <input class="form-control" type="text" name="ayar_keywords" value="<?php echo $ayarCek['ayar_keywords'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-4">
                    <label>Telefon Numaranız</label>
                    <input class="form-control" type="text" name="ayar_telefon" value="<?php echo $ayarCek['ayar_telefon'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Facebook Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_facebook" value="<?php echo $ayarCek['ayar_facebook'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Twitter Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_twitter" value="<?php echo $ayarCek['ayar_twitter'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Site Footer</label>
                    <input class="form-control" type="text" name="ayar_footer" value="<?php echo $ayarCek['ayar_footer'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_adres" value="<?php echo $ayarCek['ayar_adres'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Mail Adresiniz</label>
                    <input class="form-control" type="text" name="ayar_mail" value="<?php echo $ayarCek['ayar_mail'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Fax Numaranız</label>
                    <input class="form-control" type="text" name="ayar_fax" value="<?php echo $ayarCek['ayar_fax'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="ayar_kaydet" value="Ayarları Kaydet">
                </div>
            </div>
        </form>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>



<?php
include 'footer.php';
?>