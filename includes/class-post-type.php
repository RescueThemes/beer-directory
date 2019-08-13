<?php

/**
 * Registration of CPT and related taxonomies.
 */
class Beer_Post_Type {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 */
	const VERSION = '1.1';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 */
	const PLUGIN_SLUG = 'beer-directory';

	protected $registration_handler;

	/**
	 * Initialize the plugin by setting localization and new site activation hooks.
	 *
	 */
	public function __construct( $registration_handler ) {

		$this->registration_handler = $registration_handler;

		// Load plugin text domain
		add_action( 'init', array( $this, 'beer_directory_load_plugin_textdomain' ) );;

	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 */
	public function activate() {
		$this->registration_handler->register();
		flush_rewrite_rules();
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 */
	public function deactivate() {
		flush_rewrite_rules();
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function beer_directory_load_plugin_textdomain() {

		load_plugin_textdomain( 'beer-directory' , FALSE, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages' );
	}

}
