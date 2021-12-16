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
$menu_id = $_GET['menu_id'];
$menuSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from menuler where menu_id='$menu_id'");
$menuCek = mysqli_fetch_assoc($menuSorgu);
?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Menü DÜZENLİYORSUNUZ</h1>
                <?php
                if (isset($_GET['durum'])) {
                    if ($_GET['durum'] == "ok") {
                ?>
                        <h1 style="color:green" class="page-subhead-line">Menü düzenleme işlemi başarılı. </h1>
                    <?php } else if ($_GET['durum'] == "no") {
                    ?>
                        <h1 style="color:red" class="page-subhead-line">Menü düzenleme işlemi başarısız. </h1>
                    <?php }
                } else {
                    ?>
                    <h1 class="page-subhead-line">Buradan menü düzenleyebilirsiniz. </h1>
                <?php }
                ?>


            </div>
        </div>


        <form action="islem.php" method="POST">


            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="menu_duzenle" value="Menü Düzenle">
                </div>
            </div>



            <input type="hidden" name="menu_id" value="<?php echo $menuCek['menu_id']; ?>">


            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Adı</label>
                    <input class="form-control" type="text" name="menu_ad" value="<?php echo $menuCek['menu_ad']; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Link</label>
                    <input class="form-control" type="text" name="menu_link" value="<?php echo $menuCek['menu_link']; ?>">
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