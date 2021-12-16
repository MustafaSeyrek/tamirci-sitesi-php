<?php include "header.php";
$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$haberSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from haberler");
?>
<!--==============================content================================-->
<section id="content">
  <div class="wrapper">
    <article class="col-1">
      <?php
      while ($haberCek = mysqli_fetch_assoc($haberSorgu)) { ?>
        <div class="indent-left">
          <h3 class="prev-indent-bot"></h3>
          <div class="wrapper prev-indent-bot">


            <figure class="img-indent"><img height="200px" width="200px" src="admin/<?php echo $haberCek['haber_resim'] ?>" alt=""></img></figure>
            <div class="extra-wrap">
              <h6 class="prev-indent-bot"><?php echo $haberCek['haber_ad'] ?></h6>
              <?php echo substr($haberCek['haber_detay'], 0, 300) . "..." ?>
            </div>
          </div>
          <a class="button-2" href="haber-detay.php?haber_id=<?php echo $haberCek['haber_id'] ?>">Devamını oku</a>
        </div>

        <hr>

      <?php } ?>




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