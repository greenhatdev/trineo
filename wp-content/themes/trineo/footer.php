<?php
$footer_cta_block = get_field('footer_cta_block', 'option');
$cta_text = $footer_cta_block['cta_text'];
$cta_link = $footer_cta_block['cta_link'];
if (!is_front_page() && !is_page_template('insights.php') && !is_single('post') && get_the_ID() != 743) {
    ?>
    <section class="section cta_block padding-md-top padding-md-bottom">
        <div class="container">
            <div class="row vertically-middle wow fadeIn new-effect">
                <div class="col-md-12 align-center">
                    <div class="h3  margin-sm-bottom primary-color "><?php echo $footer_cta_block['heading']; ?></div>
                    <?php if ($cta_text) { ?>
                        <div>
                            <a href="<?php echo $cta_link; ?>"
                               class="button"><?php echo $cta_text; ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>
<?php } ?>

<section class="section footer-main">
    <footer class="footer-section">
        <div class="container container-lg">
            <div class="row align-left">
                <div class="col-md-3">
                    <div class="nav-folderized2">
                        <div class="nav">
                            <?php if (is_active_sidebar('footer_sidebar-1')) : ?>
                                <ul id="footer1">
                                    <?php dynamic_sidebar('footer_sidebar-1'); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-folderized2">
                        <div class="nav">
                            <?php if (is_active_sidebar('footer_sidebar-2')) : ?>
                                <ul id="footer2">
                                    <?php dynamic_sidebar('footer_sidebar-2'); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-folderized2">
                        <div class="nav">
                            <?php if (is_active_sidebar('footer_sidebar-3')) : ?>
                                <ul id="footer3">
                                    <?php dynamic_sidebar('footer_sidebar-3'); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-folderized2">
                        <div class="nav">
                            <?php if (is_active_sidebar('footer_sidebar-4')) : ?>
                                <ul id="footer4">
                                    <?php dynamic_sidebar('footer_sidebar-4'); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-folderized2">
                        <div class="nav">
                            <?php if (is_active_sidebar('footer_sidebar-5')) : ?>
                                <ul id="footer5">
                                    <?php dynamic_sidebar('footer_sidebar-5'); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="copyright-footer padding-lg-bottom">
                <div class="row">
                    <div class="col-md-8">
                        <span class="full-width-mob2">© <?php echo date("Y"); ?> Trineo</span>
                        <span
                                class="full-width-mob2"><span class="padding-sm-left padding-sm-right">|</span> <a
                                    href="/terms-and-conditions"/>Terms & Conditions</a> <span
                                    class="padding-sm-left padding-sm-right">|</span> <a
                                    href="/privacy-policy"/>Privacy Policy</a></span>
                    </div>
                    <div class="col-md-4  align-right">
                        Made by <a href="https://www.green-hat.com.au" target="" _blank>Green Hat</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>

</div>
<?php wp_footer(); ?>

</body>
</html>