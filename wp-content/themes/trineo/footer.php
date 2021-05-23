<section class="section footer-main">
    <footer class="footer-section">
        <div class="container container-lg">

            <div class="row align-left">
                <div class="col-md-4">
                    <div class="nav-folderized">
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
                    <div class="nav-folderized">
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
                    <div class="nav-folderized">
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
                    <div class="nav-folderized">
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
                    <div class="nav-folderized">
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
                        <span class="full-width-mob">© <?php echo date("Y"); ?> Trineo</span>
                                                <span
                                                        class="full-width-mob"><span class="padding-sm-left padding-sm-right">|</span> <a
                                                            href="/privacy-policy"/>Terms & Conditions</a> <span
                                                            class="padding-sm-left padding-sm-right">|</span> <a
                                                            href="/terms-and-conditions"/>Privacy Policy</a></span>
                    </div>
                    <div class="col-md-4  hidden-xs align-right">
                        Made by <a href="https://www.green-hat.com.au" target=""_blank>Green Hat</a>
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