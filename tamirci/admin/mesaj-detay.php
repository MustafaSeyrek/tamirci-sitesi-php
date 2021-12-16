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
$mesaj_id = $_GET['mesaj_id'];
$mesajSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from mesajlar where mesaj_id='$mesaj_id'");
$mesajCek = mysqli_fetch_assoc($mesajSorgu);
?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MESAJ DETAY</h1>
            </div>
        </div>


        <form>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Gönderici Adı</label>
                    <input readonly class="form-control" type="text" value="<?php echo $mesajCek['mesaj_ad'] ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Gönderici Mail</label>
                    <input readonly class="form-control" type="text" value="<?php echo $mesajCek['mesaj_mail'] ?>">
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Gönderici Telefon</label>
                    <input readonly class="form-control" type="text" value="<?php echo $mesajCek['mesaj_telefon'] ?>">

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Konu</label>
                    <input readonly class="form-control" type="text" value="<?php echo $mesajCek['mesaj_konu'] ?>">

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>Mesaj</label>
                    <textarea readonly rows="10" cols="150"><?php echo $mesajCek['mesaj_mesaj'] ?></textarea>

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