<!--==============================footer=================================-->
<footer>
    <div class="main">
        <div class="footer-bg">
            <?php echo $ayarCek['ayar_footer'] ?>
            <ul class="list-services">
                <li><a class="tooltips" href=<?php echo $ayarCek['ayar_facebook'] ?>></a></li>
                <li class="item-1"><a class="tooltips" href=<?php echo $ayarCek['ayar_twitter'] ?>></a></li>

            </ul>
        </div>
    </div>
</footer>
<script>
    Cufon.now();
</script>
<script>
    $(window).load(function() {
        $('.slider')._TMS({
            duration: 800,
            easing: 'easeOutQuart',
            preset: 'simpleFade',
            slideshow: 7000,
            banners: false,
            pauseOnHover: true,
            waitBannerAnimation: false,
            prevBu: '.prev',
            nextBu: '.next'
        });
    });
</script>
</body>

</html>