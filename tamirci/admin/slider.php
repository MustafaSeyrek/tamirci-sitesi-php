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

$sliderSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from slider");

?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SLİDER</h1>
                <h1 class="page-subhead-line">Slider yönetimi sayfası. </h1>

            </div>

            <div class="col-md-12">
                <a href="slider-ekle.php"> <button class="btn btn-success">Slider Ekle</button></a>
                <hr>
                </hr>

            </div>


            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mevcut sliderler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Slider adı</th>
                                        <th>Slider Resim</th>
                                        <th>Slider url</th>
                                        <th>Slider Sıra</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($sliderCek = mysqli_fetch_assoc($sliderSorgu)) { ?>

                                        <tr>
                                            <td><?php echo $sliderCek['slider_id'] ?></td>
                                            <td><?php echo $sliderCek['slider_ad'] ?></td>

                                            <td>
                                                <img src="<?php echo $sliderCek['slider_resim'] ?>" width="200px"> </img>

                                            </td>

                                            <td><?php echo $sliderCek['slider_url'] ?></td>

                                            <td>
                                                <form action="islem.php?slider_id=<?php echo $sliderCek['slider_id']; ?>&sliderguncelle=ok" method="POST">
                                                    <input class="form-control" type="number" name="slider_sira" value="<?php echo $sliderCek['slider_sira'] ?>">
                                            <th> <input class="btn btn-primary" type="submit" name="slider_guncelle" value="Sırayı Güncelle"></a></th>
                                            </form>

                                            </td>
                                            <th> <a href="islem.php?slider_id=<?php echo $sliderCek['slider_id']; ?>&slidersil=ok"> <input class="btn btn-danger" type="submit" name="slider_sil" value="Sil"></a></th>
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