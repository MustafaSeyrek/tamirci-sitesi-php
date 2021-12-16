<!-- /. NAV TOP  -->
<?php session_start(); ?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="assets/img/user.png" class="img-thumbnail" />

                    <div class="inner-text">
                        <?php echo "Hoşgeldiniz ". $_SESSION['admin_kadi']; ?>
                        <br />
                        
                    </div>
                </div>

            </li>


            <li>
                <a href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
            </li>
            <li>
                <a href="ayarlar.php"><i class="fa fa-dashboard "></i>Ayarlar</a>
            </li>
            <li>
                <a href="menuler.php"><i class="fa fa-dashboard "></i>Menuler</a>
            </li>
            <li>
                <a href="slider.php"><i class="fa fa-dashboard "></i>Slider</a>
            </li>
            <li>
                <a href="sayfalar.php"><i class="fa fa-dashboard "></i>Sayfalar</a>
            </li>
            <li>
                <a href="haberler.php"><i class="fa fa-dashboard "></i>Haberler</a>
            </li>
            <li>
                <a href="mesajlar.php"><i class="fa fa-dashboard "></i>Mesajlar</a>
            </li>

        </ul>

    </div>

</nav>