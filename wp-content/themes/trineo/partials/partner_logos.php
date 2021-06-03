<?php
$heading = get_sub_field('heading');
?>
<section class="section padding-md-bottom">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 align-center equal">
                <div class="partner-logos-heading  margin-sm-bottom primary-color "><?php echo $heading; ?></div>
            </div>
        </div>
        <div class="row">
            <?php
            if( have_rows('partner') ):
                while( have_rows('partner') ) : the_row();
                    $sub_value = get_sub_field('logo');
                    ?>
                    <div class="col-md partner-logo" style="background-image: url(<?php echo $sub_value; ?>)">

                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
</section>