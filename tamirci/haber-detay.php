<?php include "header.php";
$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$haberSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from haberler where haber_id = '" . $_GET['haber_id'] . "'");
$haberCek = mysqli_fetch_assoc($haberSorgu);

$haber_hit =  $haberCek['haber_hit'];
$haber_hit++;
$haberHitGuncelle =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "update haberler set haber_hit='" . $haber_hit . "' where haber_id = '" . $_GET['haber_id'] . "'");

?>
<!--==============================content================================-->
<section id="content">
    <div class="wrapper">
        <article class="col-1">
            <div class="indent-left">
                <h3 class="prev-indent-bot"></h3>
                <div class="wrapper prev-indent-bot">

                    <img src="admin/<?php echo $haberCek['haber_resim'] ?>" alt=""></img>
                    <div class="extra-wrap">
                        <h3 class="prev-indent-bot"><?php echo $haberCek['haber_ad'] ?></h3>
                        <?php echo $haberCek['haber_detay'] ?>
                    </div>
                </div>

            </div>

        </article>
        <article class="col-2">

            <h4 class="p1">En Çok Okunanlar</h4>
            <ul class="list-1">
                <?php

                $haberSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from haberler order by haber_hit DESC limit 10");
                while ($haberCek = mysqli_fetch_assoc($haberSorgu)) { ?>
                    <li><a href="haber-detay.php?haber_id=<?php echo $haberCek['haber_id'] ?>"><?php echo $haberCek['haber_ad'] ?></a></li>
                <?php } ?>
            </ul>
        </article>
    </div>
</section>
<!--==============================aside================================-->
<aside>

    <div class="block"></div>
</aside>
</div>
</div>
<!--==============================footer=================================-->
<?php include "footer.php"; ?>