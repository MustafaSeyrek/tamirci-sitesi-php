<div class="wrapper">
    <div class="slider">
        <ul class="items">
            <?php
            while ($sliderCek = mysqli_fetch_assoc($sliderSorgu)) {
            ?>
                <li><img src="admin/<?php echo $sliderCek['slider_resim'] ?>" alt=""></img></li>

            <?php } ?>

        </ul>
    </div>
    <a class="prev">prev</a> <a class="next">next</a>
    <div class="banner1-bg"></div>
    <div class="banner-1"></div>
</div>