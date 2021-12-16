<?php
include 'header.php';

$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$ayarSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from ayarlar");
$ayarCek = mysqli_fetch_assoc($ayarSorgu)


?>
<!--==============================content================================-->
<section id="content">
  <div class="wrapper">
    <article class="col-1">
      <div class="indent-left">
        <h3 class="p1">İletişim</h3>
        <form id="contact-form" action="admin/islem.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <label><span class="text-form">Ad Soyad:</span>
              <input type="text" name="mesaj_ad">
            </label>
            <label><span class="text-form">E-mail:</span>
              <input type="text" name="mesaj_mail">
            </label>
            <label><span class="text-form">Telefon:</span>
              <input type="text" name="mesaj_telefon">
            </label>
            <label><span class="text-form">Konu:</span>
              <input type="text" name="mesaj_konu">
            </label>
            <div class="wrapper">
              <div class="text-form">Mesaj:</div>
              <div class="extra-wrap">
                <textarea  name="mesaj_mesaj"></textarea>
              </div>
            </div>
            
            <div class="buttons"> <input type="submit" name="mesaj_gonder" value="Gönder"> </div>
          </fieldset>
        </form>
      </div>
    </article>
    <article class="col-2">
      <h3 class="p1">Bizim Bilgilerimiz</h3>
      <h6></h6>
      <dl class="img-indent-bot">
        <dt><?php echo $ayarCek['ayar_adres'] ?></dt>
        <dd><span>Telefon:</span><strong><?php echo $ayarCek['ayar_telefon'] ?></strong></dd>
        <dd><span>Fax:</span><strong><?php echo $ayarCek['ayar_fax'] ?></strong></dd>
        <dd><span>Email:</span><strong><a href="#"><?php echo $ayarCek['ayar_mail'] ?></a></strong></dd>
      </dl>

    </article>
  </div>
  <div class="block"></div>
</section>
</div>
</div>
<!--==============================footer=================================-->
<?php include 'footer.php' ?>