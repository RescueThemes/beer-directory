<?php
/**
 * Plugin Name: Beer Directory
 * Plugin URI:  https://rescuethemes.com/beer-directory
 * Description: Enables a beer post type and beer list shortcode.
 * Version:     1.1
 * Author:      Rescue Themes
 * Author URI:  https://rescuethemes.com
 * Text Domain: beer-directory
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

/*  Copyright 2015  Rescue Themes  ( email : hello@rescuethemes.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required files for registering the post type, taxonomies and shortcode
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-registrations.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-metaboxes.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-post-shortcodes.php';
require plugin_dir_path( __FILE__ ) . 'includes/scripts.php';

// Instantiate registration class, so we can add it as a dependency to main plugin class.
$post_type_registrations = new Beer_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$post_type = new Beer_Post_Type( $post_type_registrations );

// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $post_type, 'activate' ) );

// Initialize registrations for post-activation requests.
$post_type_registrations->init();

// Initialize metaboxes
$post_type_metaboxes = new Beer_Post_Type_Metaboxes;
$post_type_metaboxes->init();


/**
 * Adds styling to the dashboard for the post type and adds beer posts
 * to the "At a Glance" metabox.
 */
if ( is_admin() ) {

	// Loads for users viewing the WordPress dashboard
	if ( ! class_exists( 'Dashboard_Glancer' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/class-dashboard-glancer.php';  // WP 3.8
	}

	require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-admin.php';

	$post_type_admin = new Beer_Post_Type_Admin( $post_type_registrations );
	$post_type_admin->init();

}

/**
 * Include post and page templates
 */
add_filter( 'template_include', 'beer_directory_plugin_templates' );

function beer_directory_plugin_templates( $template ) {
    $post_types = array( 'beer' );

    if ( is_singular( $post_types ) && ! file_exists( get_stylesheet_directory() . '/single-beer.php' ) )
        $template = plugin_dir_path( __FILE__ ) . 'includes/single-beer.php';

    // TODO: Add a category page template
    // if ( is_post_type_archive( $post_types ) && ! file_exists( get_stylesheet_directory() . '/archive-beer.php' ) )
    //     $template = plugin_dir_path( __FILE__ ) . 'includes/archive-beer.php';

    return $template;
}

