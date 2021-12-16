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

$haberSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from haberler");

?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABERLER</h1>
                <h1 class="page-subhead-line">Haber yönetimi sayfası. </h1>

            </div>

            <div class="col-md-12">
                <a href="haber-ekle.php"> <button class="btn btn-success">Haber Ekle</button></a>
                <hr>
                </hr>

            </div>


            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mevcut Haberler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Eklenme tarihi</th>
                                        <th>Haber adı</th>
                                        <th>Haber resim</th>
                                        <th>Haber hit</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($haberCek = mysqli_fetch_assoc($haberSorgu)) { ?>

                                        <tr>
                                            <td><?php echo $haberCek['haber_id'] ?></td>
                                            <td><?php echo $haberCek['haber_zaman'] ?></td>
                                            <td><?php echo $haberCek['haber_ad'] ?></td>
                                            <td>
                                                <img src="<?php echo $haberCek['haber_resim'] ?>" height="50px" width="50px"> </img>

                                            </td>
                                            <td><?php echo $haberCek['haber_hit'] ?></td>

                                            <th> <a href="haber-duzenle.php?haber_id=<?php echo $haberCek['haber_id']; ?>"> <input class="btn btn-primary" type="submit" name="sayfa_duzenle" value="Düzenle"> </a></th>

                                            <th> <a href="islem.php?haber_id=<?php echo $haberCek['haber_id']; ?>&habersil=ok&haber_resim=<?php echo $haberCek['haber_resim']; ?>"> <input class="btn btn-danger" type="submit" name="sayfa_sil" value="Sil"></a></th>
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