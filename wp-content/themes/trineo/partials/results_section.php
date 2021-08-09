<?php
$repeater = get_sub_field('column');
if ($repeater) {
    ?>
    <section class="section section-5 padding-xl-top padding-sm-bottom purple-background margin-md-bottom ">
        <div class="container wow fadeIn new-effect">
            <?php if (get_sub_field('heading')) { ?>
                <div class="row vertically-middle ">
                    <div class="col-md-12 padding-lg-bottom">
                        <div class="h3 white-text fix-size"><?php echo get_sub_field('heading'); ?></div>
                        <p class="white-text max-width-600"><?php echo get_sub_field('content'); ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="row vertically-middle2 ">
                <?php
                foreach ($repeater as $row) {
                    ?>
                    <div class="col-md-3 col-icon-text padding-md-bottom  white-text">
                        <?php if ($row['icon']) { ?>
                            <div class="image-background"
                                 style="background-image:url('<?php echo $row['icon']; ?>'); "></div>
                        <?php } ?>
                        <?php if ($row['big_text']) { ?>
                            <div class="big_text"><?php echo $row['big_text']; ?></div>
                        <?php } ?>
                        <div class="margin-sm-top heading">
                            <p class="white-text  ">
                                <?php echo $row['description']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <?php
                }
                ?>

            </div>
        </div>
    </section>
    <?php
}

?>