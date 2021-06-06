<section class="section padding-xl-top  padding-lg-bottom ">
        <div class="image-carousel wow fadeIn new-effect" data-wow-delay="0.3s">
            <div class="vertically-top image-owl-carousel owl-carousel  owl-theme">
                <?php
                if( have_rows('imagesrep') ):
                while( have_rows('imagesrep') ) : the_row();
                $i = get_sub_field('images');
                        ?>
                  <img src="<?php echo $i; ?>" class="rounded-edges">
                <?php
                endwhile;
                endif;
                ?>
            </div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav"></div>
                </div>
            </div>
        </div>
    </div>
</section>
