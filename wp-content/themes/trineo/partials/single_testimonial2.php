<section class="margin-lg-bottom">
    <div class="container wow fadeIn new-effect">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                $section6_testimonial = get_sub_field('testimonial');
                $quote = get_field("quote", $section6_testimonial);
                $name = get_field("name", $section6_testimonial);
                $job_title = get_field("job_title", $section6_testimonial);

                ?>
                <div class="padding-md-top padding-lg-bottom single-testimonial">

                    <div class="quote h3 fix-size"><?php echo $quote; ?></div>
                    <div class="name"><?php echo $name; ?></div>
                    <div class="job-title"><?php echo $job_title; ?></div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
