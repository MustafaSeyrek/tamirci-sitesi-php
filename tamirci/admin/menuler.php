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

$menuSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from menuler");

?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MENÜLER</h1>
                <h1 class="page-subhead-line">Menü yönetimi sayfası. </h1>

            </div>

            <div class="col-md-12">
                <a href="menu-ekle.php"> <button class="btn btn-success">Menü Ekle</button></a>
                <hr>
                </hr>

            </div>


            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mevcut menüler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menü adı</th>
                                        <th>Menü link</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($menuCek = mysqli_fetch_assoc($menuSorgu)) { ?>

                                        <tr>
                                            <td><?php echo $menuCek['menu_id'] ?></td>
                                            <td><?php echo $menuCek['menu_ad'] ?></td>
                                            <td><?php echo $menuCek['menu_link'] ?></td>

                                            <th> <a href="menu-duzenle.php?menu_id=<?php echo $menuCek['menu_id']; ?>"> <input class="btn btn-primary" type="submit" name="menu_duzenle" value="Düzenle"> </a></th>

                                            <th> <a href="islem.php?menu_id=<?php echo $menuCek['menu_id']; ?>&menusil=ok"> <input class="btn btn-danger" type="submit" name="menu_sil" value="Sil"></a></th>
                                        </tr>
                                    <?php  } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Hover Rows  -->
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>



<?php
include 'footer.php';
?>