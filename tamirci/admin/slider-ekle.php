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
                <h1 class="page-head-line">SLİDER EKLİYORSUNUZ</h1>
                <?php
                if (isset($_GET['durum'])) {
                    if ($_GET['durum'] == "ok") {
                ?>
                        <h1 style="color:green" class="page-subhead-line">Slider ekleme işlemi başarılı. </h1>
                    <?php } else if ($_GET['durum'] == "no") {
                    ?>
                        <h1 style="color:red" class="page-subhead-line">Slider ekleme işlemi başarısız. </h1>
                    <?php }
                } else {
                    ?>
                    <h1 class="page-subhead-line">Buradan Slider ekleyebilirsiniz. </h1>
                <?php }
                ?>


            </div>
        </div>


        <form action="islem.php" method="POST" enctype="multipart/form-data">



            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="slider_kaydet" value="Slider Kaydet">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-4">Slider Resim</label>
                <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn btn-file btn-default">
                            <span class="fileupload-new">Resim Seç</span>
                            <span class="fileupload-exists">Değiştir</span>
                            <input type="file" name="slideGorsel">
                        </span>
                        <span class="fileupload-preview"></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Adı</label>
                    <input class="form-control" type="text" name="slider_ad" placeholder="Slider adı giriniz.">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Url</label>
                    <input class="form-control" type="text" name="slider_url" placeholder="Slider url giriniz.">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Sıra</label>
                    <input class="form-control" type="number" name="slider_sira" placeholder="Slider sırasını giriniz.">
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