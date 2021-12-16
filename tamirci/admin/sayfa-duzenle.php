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
$sayfa_id = $_GET['sayfa_id'];
$sayfaSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from sayfalar where sayfa_id='$sayfa_id'");
$sayfaCek = mysqli_fetch_assoc($sayfaSorgu);
?>

<head>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SAYFA DÜZENLİYORSUNUZ</h1>
                <?php
                if (isset($_GET['durum'])) {
                    if ($_GET['durum'] == "ok") {
                ?>
                        <h1 style="color:green" class="page-subhead-line">Sayfa düzeleme işlemi başarılı. </h1>
                    <?php } else if ($_GET['durum'] == "no") {
                    ?>
                        <h1 style="color:red" class="page-subhead-line">Sayfa düzeleme işlemi başarısız. </h1>
                    <?php }
                } else {
                    ?>
                    <h1 class="page-subhead-line">Buradan Sayfa düzenleyebilirsiniz. </h1>
                <?php }
                ?>


            </div>
        </div>


        <form action="islem.php" method="POST">

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="sayfa_duzenle" value="Sayfa Düzenle">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Adı</label>
                    <input class="form-control" type="text" name="sayfa_ad" value="<?php echo $sayfaCek['sayfa_ad'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="hidden" type="text" name="sayfa_id" value="<?php echo $sayfaCek['sayfa_id'] ?>">
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Sayfa İçerik</label>
                    <textarea name="sayfa_icerik" class="ckeditor"><?php echo $sayfaCek['sayfa_icerik'] ?></textarea>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Sıra</label>
                    <input class="form-control" type="text" name="sayfa_sira" value="<?php echo $sayfaCek['sayfa_sira'] ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Anasayfada Göster</label>
                    <select class="form-control" name="sayfa_anasayfa">
                        <?php if ($sayfaCek['sayfa_anasayfa'] == "0") { ?>
                            <option value="0">HAYIR</option>
                            <option value="1">EVET</option>
                        <?php  } elseif ($sayfaCek['sayfa_anasayfa'] == "1") { ?>
                            <option value="1">EVET</option>
                            <option value="0">HAYIR</option>
                        <?php } ?>

                    </select>
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