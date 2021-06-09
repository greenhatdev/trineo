<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area ">
		<main id="main" class="site-main">
            <section class="purple-background">
                <div class="basic-heading vertically-middle header-menu-padding">
                    <div class="row vertically-middle ">
                        <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect" data-wow-delay="0.0s">
                            <div class="padding-left-col-1 padding-right-col-1 max-width-750px">
                                <h1 class="white-text">Search results for: </h1>
                                <div class="h5 white-text max-width-430"><?php echo get_search_query(); ?></div>

                            </div>
                        </div>
                        <div class="col-sm-5 background-image-cover rounded-edge-bottom-left"
                             style="background-image: url('<?php echo get_site_url();?>/wp-content/themes/trineo/assets/images/getintouchheader.jpg'); min-height: 350px;">
                        </div>
                    </div>
                </div>
            </section>
		<?php if ( have_posts() ) : ?>

            <section class="">
                <div class="container">
            <div class="row margin-xl-top  padding-xl-bottom border-bottom">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that
				 * will be used instead.
				 */
            ?>
            <div class="col-md-3"></div>
                <div class="col-md-6">
                                   <?php  get_template_part('partials/search-results', get_post_format()); ?>

                </div>
                <div class="col-md-3"></div>
            <?php
				// End the loop.
			endwhile;

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
//			get_template_part( 'template-parts/content/content', 'none' );
                echo "<section class='margin-md-top margin-md-bottom'><div class='container'><div class='row'><div class='col-md-12 h4'>Sorry, no results found.</div></div></div></section>";

            endif;
		?>
            </div>
                </div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
