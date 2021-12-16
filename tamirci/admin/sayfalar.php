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

$sayfaSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from sayfalar");

?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SAYFALAR</h1>
                <h1 class="page-subhead-line">Sayfa yönetimi sayfası. </h1>

            </div>

            <div class="col-md-12">
                <a href="sayfa-ekle.php"> <button class="btn btn-success">Sayfa Ekle</button></a>
                <hr>
                </hr>

            </div>


            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mevcut sayfalar
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Eklenme tarihi</th>
                                        <th>Sayfa adı</th>
                                        <th>Sayfa sıra</th>
                                        <th>Sayfa anasayfa</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($sayfaCek = mysqli_fetch_assoc($sayfaSorgu)) { ?>

                                        <tr>
                                            <td><?php echo $sayfaCek['sayfa_id'] ?></td>
                                            <td><?php echo $sayfaCek['sayfa_tarih'] ?></td>
                                            <td><?php echo $sayfaCek['sayfa_ad'] ?></td>
                                            <td><?php echo $sayfaCek['sayfa_sira'] ?></td>
                                            <td><?php if ($sayfaCek['sayfa_anasayfa'] == "0") {
                                                    echo "HAYIR";
                                                } elseif ($sayfaCek['sayfa_anasayfa'] == "1") {
                                                    echo "EVET";
                                                } ?></td>

                                            <th> <a href="sayfa-duzenle.php?sayfa_id=<?php echo $sayfaCek['sayfa_id']; ?>"> <input class="btn btn-primary" type="submit" name="sayfa_duzenle" value="Düzenle"> </a></th>

                                            <th> <a href="islem.php?sayfa_id=<?php echo $sayfaCek['sayfa_id']; ?>&sayfasil=ok"> <input class="btn btn-danger" type="submit" name="sayfa_sil" value="Sil"></a></th>
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