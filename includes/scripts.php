<?php if( !function_exists ('beer_shortcodes_scripts') ) :

	function beer_shortcodes_scripts() {

		wp_enqueue_style( 'beer-directory-styles', plugin_dir_url( __FILE__ ) . 'css/style.css' );

	}
	add_action('wp_enqueue_scripts', 'beer_shortcodes_scripts', 99 );

endif;