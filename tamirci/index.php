<?php
include 'header.php';
include 'slider-site.php';
$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$sayfaSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from sayfalar where sayfa_anasayfa= '1' order by sayfa_sira ASC ");
$ayarSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from ayarlar");
$ayarCek = mysqli_fetch_assoc($ayarSorgu)

?>


<!--==============================aside================================-->
<aside>
    <div class="wrapper">



        <?php while ($sayfaCek = mysqli_fetch_assoc($sayfaSorgu)) { ?>


            <div class="column-2" style="padding-right: 14px; padding-bottom: 10px">
                <div class="box">
                    <div class="aligncenter">
                        <h4><?php echo $sayfaCek['sayfa_ad'] ?></h4>
                    </div>
                    <div class="box-bg maxheight">
                        <div class="padding">
                            <p><?php echo substr($sayfaCek['sayfa_icerik'], 0, 200) . "..." ?></p>
                        </div>
                        <div class="aligncenter"> <a class="button" href="sayfa-detay.php?sayfa_id=<?php echo $sayfaCek['sayfa_id'] ?>">Devamını Oku...</a> </div>
                    </div>
                </div>
            </div>

        <?php  } ?>

    </div>
</aside>
<!--==============================content================================-->
<section id="content">
    <div class="wrapper">
        <article class="col-1">
            <div class="indent-left">
                <h2>Hoşgeldiniz!</h2>
                <h6 class="prev-indent-bot"><?php echo $ayarCek['ayar_title'] ?></h6>
                <p class="prev-indent-bot"><?php echo $ayarCek['ayar_description'] ?></p>
            </div>
        </article>
        <article class="col-2">
            <h3>Testimonials</h3>
            <div class="wrapper indent-bot">
                <figure class="img-indent"><img src="images/page1-img1.jpg" alt=""></figure>
                <div class="extra-wrap text-1">
                    <div class="margin-top">
                        <h6><a class="link color-2" href="#">James Williams</a></h6>
                        Lorem ipsum dolor sitmet consectetur adipisicing elit sed do eiusmod.
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img2.jpg" alt=""></figure>
                <div class="extra-wrap text-1">
                    <div class="margin-top">
                        <h6><a class="link color-2" href="#">Thomas Seether</a></h6>
                        Tempor incididunt utlabore et dolore magna aliqua ut enim ad minim veniam.
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="block"></div>
</section>
</div>
</div>




<?php include 'footer.php' ?>