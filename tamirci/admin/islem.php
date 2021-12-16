<?php

$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$conn = mysqli_connect($sunucu, $username, $password, $database);
session_start();

if (isset($_POST['ayar_kaydet'])) {
    $id = 1;

    $sql = "update ayarlar set ayar_title='" . $_POST['ayar_title'] . "', ayar_description='" . $_POST['ayar_description'] . "', ayar_keywords='" . $_POST['ayar_keywords'] . "',
    ayar_telefon='" . $_POST['ayar_telefon'] . "', ayar_facebook='" . $_POST['ayar_facebook'] . "', ayar_twitter='" . $_POST['ayar_twitter'] . "',
    ayar_footer='" . $_POST['ayar_footer'] . "',ayar_adres='" . $_POST['ayar_adres'] . "',ayar_mail='" . $_POST['ayar_mail'] . "',
    ayar_fax='" . $_POST['ayar_fax'] . "' where ayar_id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location:ayarlar.php?durum=ok");
    } else {
        header("Location:ayarlar.php?durum=no");
    }
}

if (isset($_POST['btnLogin'])) {
    $admin_kadi = $_POST['admin_kadi'];
    $admin_sifre = md5($_POST['admin_sifre']);

    if ($admin_kadi && $admin_sifre) {
        $sorgu = mysqli_query($conn, "select * from admin where admin_kadi='$admin_kadi' and admin_sifre='$admin_sifre'");
        $veriSay = mysqli_num_rows($sorgu);
        if ($veriSay > 0) {
            $_SESSION['admin_kadi'] = $admin_kadi;
            header('Location:index.php');
        } else {
            header('Location:login.php?login=no');
        }
    }
}

if (isset($_POST['menu_kaydet'])) {
    $menuKaydet = mysqli_query($conn, "insert into menuler (menu_ad, menu_link) values('" . $_POST['menu_ad'] . "',
    '" . $_POST['menu_link'] . "')");
    if (mysqli_affected_rows($conn)) {
        header("Location: menu-ekle.php?durum=ok");
    } else {
        header("Location: menu-ekle.php?durum=no");
    }
}

if (isset($_POST['menu_duzenle'])) {
    $menu_id = $_POST['menu_id'];

    $menuDuzenle = mysqli_query($conn, "update menuler set menu_ad='" . $_POST['menu_ad'] . "', menu_link='" . $_POST['menu_link'] . "' where menu_id='$menu_id' ");
    if (mysqli_affected_rows($conn)) {
        header("Location: menu-duzenle.php?durum=ok&menu_id=$menu_id");
    } else {
        header("Location: menu-duzenle.php?durum=no&menu_id=$menu_id");
    }
}

if ($_GET['menusil'] == "ok") {

    $menuSilSorgu = mysqli_query($conn, "delete from menuler where menu_id='" . $_GET['menu_id'] . "'");
    if (mysqli_affected_rows($conn)) {
        header("Location: menuler.php?durum=ok");
    } else {
        header("Location: menuler.php?durum=no");
    }
}

if (isset($_POST['slider_kaydet'])) {
    $uploads_dir = 'uploads';
    @$tmp_name = $_FILES['slideGorsel']["tmp_name"];
    @$name = $_FILES['slideGorsel']["name"];

    $rnd1 = rand(20000, 32000);
    $rnd2 = rand(20000, 32000);
    $rnd3 = rand(20000, 32000);

    $resimAd =  $rnd1 . $rnd2 . $rnd3;
    $resimYol = $uploads_dir . "/" . $resimAd . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$resimAd$name");
    $sliderEkle = mysqli_query($conn, "insert into slider (slider_resim, slider_url,slider_sira, slider_ad) values('" . $resimYol . "',
    '" . $_POST['slider_url'] . "', '" . $_POST['slider_sira'] . "', '" . $_POST['slider_ad'] . "')");

    if (mysqli_affected_rows($conn)) {
        header("Location: slider-ekle.php?durum=ok");
    } else {
        header("Location: slider-ekle.php?durum=no");
    }
}

if ($_GET['slidersil'] == "ok") {
    $sliderSorgu = mysqli_query($conn, "select * from slider where slider_id='" . $_GET['slider_id'] . "'");
    $sliderResim = mysqli_fetch_assoc($sliderSorgu);
    $sliderSilSorgu = mysqli_query($conn, "delete from slider where slider_id='" . $_GET['slider_id'] . "'");

    if (mysqli_affected_rows($conn)) {
        unlink($sliderResim['slider_resim']);
        header("Location: slider.php?durum=ok");
    } else {
        header("Location: slider.php?durum=no");
    }
}

if ($_GET['sliderguncelle'] == "ok") {
    echo $_POST['slider_sira'];
    $sliderGuncelleSorgu = mysqli_query($conn, "update slider  set slider_sira = '" . $_POST['slider_sira'] . "' where slider_id='" . $_GET['slider_id'] . "'");
    if (mysqli_affected_rows($conn)) {
        header("Location: slider.php?durum=ok");
    } else {
        header("Location: slider.php?durum=no");
    }
}

if (isset($_POST['sayfa_kaydet'])) {

    $tarih = date('Y-m-d H:i');

    $sayfaKaydet = mysqli_query($conn, "insert into sayfalar (sayfa_ad, sayfa_icerik, sayfa_sira, sayfa_anasayfa, sayfa_tarih) values('" . $_POST['sayfa_ad'] . "',
    '" . $_POST['sayfa_icerik'] . "', '" . $_POST['sayfa_sira'] . "', '" . $_POST['sayfa_anasayfa'] . "', '" . $tarih . "')");
    if (mysqli_affected_rows($conn)) {
        header("Location: sayfa-ekle.php?durum=ok");
    } else {
        header("Location: sayfa-ekle.php?durum=no");
    }
}
if ($_GET['sayfasil'] == "ok") {
    $sayfaSilSorgu = mysqli_query($conn, "delete from sayfalar where sayfa_id='" . $_GET['sayfa_id'] . "'");
    if (mysqli_affected_rows($conn)) {
        header("Location: sayfalar.php?durum=ok");
    } else {
        header("Location: sayfalar.php?durum=no");
    }
}

if (isset($_POST['sayfa_duzenle'])) {
    $sayfa_id = $_POST['sayfa_id'];
    $tarih = date('Y-m-d H:i');
    $sayfaDuzenle = mysqli_query($conn, "update sayfalar set sayfa_ad='" . $_POST['sayfa_ad'] . "', sayfa_icerik='" . $_POST['sayfa_icerik'] . "'
    , sayfa_sira='" . $_POST['sayfa_sira'] . "' , sayfa_tarih='" . $tarih . "' , sayfa_anasayfa='" .  $_POST['sayfa_anasayfa'] . "' where sayfa_id='$sayfa_id' ");
    if (mysqli_affected_rows($conn)) {
        header("Location: sayfa-duzenle.php?durum=ok&sayfa_id=$sayfa_id");
    } else {
        header("Location: sayfa-duzenle.php?durum=no&sayfa_id=$sayfa_id");
    }
}

if (isset($_POST['haber_kaydet'])) {
    $uploads_dir = 'uploads';
    @$tmp_name = $_FILES['haber_resim']["tmp_name"];
    @$name = $_FILES['haber_resim']["name"];

    $rnd1 = rand(20000, 32000);
    $rnd2 = rand(20000, 32000);
    $rnd3 = rand(20000, 32000);

    $resimAd =  $rnd1 . $rnd2 . $rnd3;
    $resimYol = $uploads_dir . "/" . $resimAd . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$resimAd$name");

    $tarih2 = date('Y-m-d H:i');

    $haberKaydet = mysqli_query($conn, "insert into haberler (haber_zaman, haber_ad, haber_detay, haber_resim) values('" .  $tarih2 . "',
    '" . $_POST['haber_ad'] . "', '" . $_POST['haber_detay'] . "', '" . $resimYol . "')");
    if (mysqli_affected_rows($conn)) {
        header("Location: haber-ekle.php?durum=ok");
    } else {
        header("Location: haber-ekle.php?durum=no");
    }
}

if ($_GET['habersil'] == "ok") {
    // $sliderSorgu = mysqli_query($conn, "select * from slider where slider_id='" . $_GET['slider_id'] . "'");
    // $sliderResim = mysqli_fetch_assoc($sliderSorgu);
    $haberSilSorgu = mysqli_query($conn, "delete from haberler where haber_id='" . $_GET['haber_id'] . "'");

    if (mysqli_affected_rows($conn)) {
        unlink($_GET['haber_resim']);
        header("Location: haberler.php?durum=ok");
    } else {
        header("Location: haberler.php?durum=no");
    }
}
if (isset($_POST['mesaj_gonder'])) {
    $mesajEkle = mysqli_query($conn, "insert into mesajlar (mesaj_ad, mesaj_mail,mesaj_telefon,mesaj_konu,mesaj_mesaj) values('" . $_POST['mesaj_ad'] . "',
    '" . $_POST['mesaj_mail'] . "',
    '" . $_POST['mesaj_telefon'] . "',
    '" . $_POST['mesaj_konu'] . "',
    '" . $_POST['mesaj_mesaj'] . "')");
    if (mysqli_affected_rows($conn)) {
        header("Location: ../iletisim.php?durum=ok");
    } else {
        header("Location: ../iletisim.php?durum=no");
    }
}

if (isset($_POST['haber_duzenle'])) {
    $haber_id = $_POST['haber_id'];

    $haberDuzenle = mysqli_query($conn, "update haberler set haber_ad='" . $_POST['haber_ad'] . "', haber_detay='" . $_POST['haber_detay'] . "' where haber_id='$haber_id' ");
    if (mysqli_affected_rows($conn)) {
        header("Location: haberler.php?durum=ok");
    } else {
        header("Location: haberler.php?durum=no");
    }
}
if ($_GET['mesajsil'] == "ok") {
    $mesajSilSorgu = mysqli_query($conn, "delete from mesajlar where mesaj_id='" . $_GET['mesaj_id'] . "'");
    if (mysqli_affected_rows($conn)) {
        header("Location: mesajlar.php?durum=ok");
    } else {
        header("Location: mesajlar.php?durum=no");
    }
}
