<?php
/**
 * Plugin Name:     Workable API Wrapper
 * Plugin URI:      https://workable.readme.io/v3/docs
 * Description:     WordPress accessible wrapper for the Workable API.
 * Author:          Katherine White and Miriam Goldman
 * Author URI:      https://kanopi.com/
 * Text Domain:     workable-api
 * Domain Path:     /languages
 * Version:         1.0.3
 *
 * @package         Workable_Api
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.3' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and API hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/classes/class-workable-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_workable_api() {

	$plugin = new Workable_Api();
	$plugin->run();

}
run_workable_api();

// expose some methods for easier theming.

/**
 * Get Featured Job Listings
 * Retrieve the listings to feature on the public-facing site.
 *
 * @see Workable_Api_Wrapper::get_job()
 * @return object JSON object of featured job listings in display order.
 */
function workable_api_get_featured_jobs() {
	$plugin   = new Workable_Api();
	$workable = new Workable_Api_Wrapper( $plugin->get_plugin_name(), PLUGIN_NAME_VERSION );
	$options  = array();
	return $workable->get_featured_jobs();
}

/**
 * A basic shortcode to return the job listings.
 *
 * @return string $output The shortcode output.
 */
function workable_api_shortcode() {
	$job_listing = workable_api_get_featured_jobs();
	if ( $job_listing ) :
		$output = '<div class="featured__jobs-listing>';
		foreach ( $job_listing as $featured_job ) :
			$output .= '<div class="featured__job">';
			$output .= '<h2>' . $featured_job->title . '</h2>';
			$output .= '<h3>' . $featured_job->department . '</h3>';
			$output .= '<p><a href="' . $featured_job->shortlink . '">Apply Now</a></p>';
			$output .= '</div>';
	endforeach;
		$output .= '</div>';
	endif;

	return $output;
}
add_shortcode( 'workable_job_listing', 'workable_api_shortcode' );
