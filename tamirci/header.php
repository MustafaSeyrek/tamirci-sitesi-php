<?php

$sunucu = "localhost";
$database = "tamirci";
$username = "root";
$password = "";

$ayarSorgu = mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from ayarlar");
$ayarCek = mysqli_fetch_assoc($ayarSorgu);

$menuSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from menuler");
$sliderSorgu =  mysqli_query(mysqli_connect($sunucu, $username, $password, $database), "select * from slider order by slider_sira ASC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title><?php echo $ayarCek['ayar_title'] ?></title>

    <meta name="description" content=<?php echo $ayarCek['ayar_description'] ?>>
    <meta name="keywords" content=<?php echo $ayarCek['ayar_keywords'] ?>>
    <meta name="author" content="Yazar">

    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
    <script src="js/jquery-1.6.3.min.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/cufon-replace.js"></script>
    <!-- <script src="js/NewsGoth_BT_400.font.js"></script> -->
    <script src="js/FF-cash.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.3.js"></script>
    <script src="js/tms_presets.js"></script>
    <script src="js/easyTooltip.js"></script>
    <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>

<body id="page1">
    <div class="extra">
        <div class="main">
            <!--==============================header=================================-->
            <header>
                <div class="indent">
                    <div class="row-top">
                        <div class="wrapper">

                            <img style="margin-top:30px; margin-left: 20px;" src=<?php echo $ayarCek['ayar_logo'] ?> alt="">

                            <strong class="support"><?php echo $ayarCek['ayar_telefon'] ?></strong>
                        </div>
                    </div>
                    <nav>
                        <ul class="menu" style="margin-top:1px">
                            <li><a class="active" href="index.php">Home</a></li>
                            <?php
                            $menuSayisi = mysqli_num_rows($menuSorgu);
                            $count = 0;
                            while ($menuCek = mysqli_fetch_assoc($menuSorgu)) {
                                $count++;
                            ?>
                                <li class="<?php
                                            if ($menuSayisi == $count) {
                                                echo "last";
                                            } ?>">


                                    <a href=<?php echo $menuCek['menu_link'] ?>> <?php echo $menuCek['menu_ad'] ?> </a>
                                </li>


                            <?php } ?>







                        </ul>
                    </nav>
                </div>

            </header>