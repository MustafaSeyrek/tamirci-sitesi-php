<?php
include 'header.php';

$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$sayfaSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from sayfalar where sayfa_id = '" . $_GET['sayfa_id'] . "'");
$sayfaCek = mysqli_fetch_assoc($sayfaSorgu)

?>


<!--==============================aside================================-->

    <div class="wrapper">

        <div class="column-6">
            <div class="box">
                <div class="aligncenter">
                    <h4><?php echo $sayfaCek['sayfa_ad'] ?></h4>
                </div>
                <div class="box-bg maxheight">
                    <div class="padding">
                        <p><?php echo $sayfaCek['sayfa_icerik'] ?></p>
                    </div>

                </div>
            </div>
        </div>


    </div>


<section id="content">
    <div class="wrapper">
    </div>
    <div class="block"></div>
</section>

</div>
</div>




<?php include 'footer.php' ?>