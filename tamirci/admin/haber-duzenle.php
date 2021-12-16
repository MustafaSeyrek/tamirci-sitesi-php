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
$haber_id = $_GET['haber_id'];
$haberSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from haberler where haber_id='$haber_id'");
$haberCek = mysqli_fetch_assoc($haberSorgu);

?>

<head>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABER DÜZENLİYORSUNUZ</h1>
                <?php
                if (isset($_GET['durum'])) {
                    if ($_GET['durum'] == "ok") {
                ?>
                        <h1 style="color:green" class="page-subhead-line">Haber düzenleme işlemi başarılı. </h1>
                    <?php } else if ($_GET['durum'] == "no") {
                    ?>
                        <h1 style="color:red" class="page-subhead-line">Haber düzenleme işlemi başarısız. </h1>
                    <?php }
                } else {
                    ?>
                    <h1 class="page-subhead-line">Buradan Haber düzenleyebilirsiniz. </h1>
                <?php }
                ?>


            </div>
        </div>


        <form action="islem.php" method="POST" enctype="multipart/form-data">

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="haber_duzenle" value="Haber Düzenle">
                </div>
            </div>
            <input type="hidden" name="haber_id" value="<?php echo $haberCek['haber_id']; ?>">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Haber Adı</label>
                    <input class="form-control" type="text" name="haber_ad" value="<?php echo $haberCek['haber_ad'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Haber Detay</label>
                    <textarea name="haber_detay" class="ckeditor"><?php echo $haberCek['haber_detay'] ?></textarea>

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