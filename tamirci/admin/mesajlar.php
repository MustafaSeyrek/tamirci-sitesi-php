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

$mesajSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from mesajlar");
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MESAJLAR</h1>
                <h1 class="page-subhead-line">Mesaj yönetimi sayfası. </h1>
            </div>
            <div class="col-md-12">
                <!--    Hover Rows  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Gelen mesajlar
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gönderici</th>
                                        <th>Gönderici Mail</th>
                                        <th>Konu</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($mesajCek = mysqli_fetch_assoc($mesajSorgu)) { ?>

                                        <tr>
                                            <td><?php echo $mesajCek['mesaj_id'] ?></td>
                                            <td><?php echo $mesajCek['mesaj_ad'] ?></td>
                                            <td><?php echo $mesajCek['mesaj_mail'] ?></td>
                                            <td><?php echo $mesajCek['mesaj_konu'] ?></td>

                                            <th> <a href="mesaj-detay.php?mesaj_id=<?php echo $mesajCek['mesaj_id']; ?>"> <input class="btn btn-primary" type="submit" name="mesaj_detay" value="Oku"> </a></th>
                                            <th> <a href="islem.php?mesaj_id=<?php echo $mesajCek['mesaj_id']; ?>&mesajsil=ok"> <input class="btn btn-danger" type="submit" name="mesaj_sil" value="Sil"></a></th>
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