<?php
/**
 * Register post types and taxonomies.
 *
 */
class Beer_Post_Type_Registrations {

	public $post_type = 'beer';

	public $taxonomies = array( 'beer-category' );

	public function init() {
		// Add the beer post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Beer_Post_Type_Registrations::register_post_type()
	 * @uses Beer_Post_Type_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Beer', 'beer-post-type' ),
			'singular_name'      => __( 'Beer', 'beer-post-type' ),
			'add_new'            => __( 'Add Beer', 'beer-post-type' ),
			'add_new_item'       => __( 'Add Beer', 'beer-post-type' ),
			'edit_item'          => __( 'Edit Beer', 'beer-post-type' ),
			'new_item'           => __( 'New Beer', 'beer-post-type' ),
			'view_item'          => __( 'View Beer', 'beer-post-type' ),
			'search_items'       => __( 'Search Beer', 'beer-post-type' ),
			'not_found'          => __( 'No beer found', 'beer-post-type' ),
			'not_found_in_trash' => __( 'No beer in the trash', 'beer-post-type' ),
		);

		$supports = array(
			'title',
			'editor',
			'thumbnail',
			//'custom-fields',
			'revisions',
			'tags',
			'excerpt',
			'comments'
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'beer', ), // Permalinks format
			'menu_position'   => 30,
			'menu_icon'       => 'dashicons-awards',
		);

		$args = apply_filters( 'beer_post_type_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for beer Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Beer Categories', 'beer-post-type' ),
			'singular_name'              => __( 'Beer Category', 'beer-post-type' ),
			'menu_name'                  => __( 'Beer Categories', 'beer-post-type' ),
			'edit_item'                  => __( 'Edit Beer Category', 'beer-post-type' ),
			'update_item'                => __( 'Update Beer Category', 'beer-post-type' ),
			'add_new_item'               => __( 'Add New Beer Category', 'beer-post-type' ),
			'new_item_name'              => __( 'New Beer Category Name', 'beer-post-type' ),
			'parent_item'                => __( 'Parent Beer Category', 'beer-post-type' ),
			'parent_item_colon'          => __( 'Parent Beer Category:', 'beer-post-type' ),
			'all_items'                  => __( 'All Beer Categories', 'beer-post-type' ),
			'search_items'               => __( 'Search Beer Categories', 'beer-post-type' ),
			'popular_items'              => __( 'Popular Beer Categories', 'beer-post-type' ),
			'separate_items_with_commas' => __( 'Separate Beer categories with commas', 'beer-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove Beer categories', 'beer-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used beer categories', 'beer-post-type' ),
			'not_found'                  => __( 'No Beer categories found.', 'beer-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'beer-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'beer_post_type_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}