<div class="bg2">
    <?php
    $values = get_field('values',634);
    $repeater = $values['value'];
    ?>
    <section class="section padding-xl-top  padding-lg-bottom">
        <div class="container">
            <div class="row vertically-middle wow fadeIn new-effect">
                <div class="col-md-12 padding-sm-bottom">
                    <div class="h3 primary-color">Our Values</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="scene">
                        <div id="left-zone">
                            <ul class="list">
                                <?php
                                $index = 0;
                                foreach ($repeater as $row) {
                                    $index++;
                                    ?>
                                    <li class="item">
                                        <input type="radio" id="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>" name="basic_carousel" value="" checked="checked"/>
                                        <label class="label_value<?php echo $index; ?> green-text" for="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>"><?php echo $row['title']; ?></label>
                                        <div class="content content_value<?php echo $index; ?>">
                                            <div class="row vertically-middle">
                                                <div class="col-md-6">
                                                    <div class="h4"><?php echo $row['title']; ?></div>
                                                    <p><?php echo $row['text']; ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <img class="rounded-edges" src="<?php echo $row['image']; ?>"/>
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
            </div>

        </div>
    </section>

</div>