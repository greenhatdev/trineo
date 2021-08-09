
    <?php
    $values = get_field('values',634);
    $repeater = $values['value'];
    ?>
    <section class="section padding-xl-top  padding-lg-bottom purple-background">
        <div class="container wow fadeIn new-effect">
            <div class="row vertically-middle">
                <div class="col-md-12 ">
                    <div class="h3 white-text">Our Values</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 hidden-md "
                     data-wow-delay="0.1s">
                    <div id="scene">
                        <div id="left-zone">
                            <ul class="list">
                                <?php
                                $index = 0;
                                foreach ($repeater as $row) {
                                    $index++;
                                    ?>
                                    <li class="item">
                                        <input type="radio" id="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>" name="basic_carousel" value="" <?php if($index==1){echo 'checked="checked"';} ?>/>
                                        <label class="label_value<?php echo $index; ?>" for="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>"><?php echo $row['title']; ?></label>
                                        <div class="content content_value<?php echo $index; ?>">
                                            <div class="row vertically-middle">
                                                <div class="col-md-12">
                                                    <div class="image-background"
                                                         style="background-image:url('<?php echo $row['image']; ?>')"></div>

                                                    <div class="h4"><?php echo $row['title']; ?></div>
                                                    <p><?php echo $row['text']; ?></p>
                                                </div>

                                            </div>

                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="middle-border"></div>
                        <div id="right-zone"></div>
                    </div>

                </div>
                <div class="col-md-12 visible-md">

                    <?php
                    $index = 0;
                    foreach ($repeater as $row) {
                        $index++;
                        ?>
                        <div class="row vertically-middle margin-md-top">
                            <div class="col-md-12">
                                <img src="<?php echo $row['image']; ?>" class="margin-sm-bottom" style="max-width: 60px; max-height: 48px;">

                                <div class="h4 white-text"><?php echo $row['title']; ?></div>
                                <p class=" white-text"><?php echo $row['text']; ?></p>
                            </div>

                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>

        </div>
    </section>

