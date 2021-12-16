<?php
include 'header.php';
include 'sidebar.php';
//session_start();

if (!isset($_SESSION['admin_kadi'])) {
    header('Location:login.php');
}

?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">TAMİRCİ SİTESİ ADMİN PANELİ</h1>
                <h1 class="page-subhead-line">Sol taraftaki menülerden istediğiniz işlemleri yapabilirsiniz. </h1>

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