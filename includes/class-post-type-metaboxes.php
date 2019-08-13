<?php
/**
 * Register metaboxes.
 */
class Beer_Post_Type_Metaboxes {

	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'beer_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ),  10, 2 );
	}

	/**
	 * Register the metaboxes to be used for the beer post type
	 *
	 */
	public function beer_meta_boxes() {
		add_meta_box(
			'profile_fields',
			'Beer Profile',
			array( $this, 'render_meta_boxes' ),
			'beer',
			'normal',
			'high'
		);
	}

   /**
	* The HTML for the fields
	*/
	function render_meta_boxes( $post ) {

		$meta = get_post_custom( $post->ID );
		$beer_abv = ! isset( $meta['beer_abv'][0] ) ? '' : $meta['beer_abv'][0];
		$beer_ibu = ! isset( $meta['beer_ibu'][0] ) ? '' : $meta['beer_ibu'][0];
		$beer_og = ! isset( $meta['beer_og'][0] ) ? '' : $meta['beer_og'][0];
		$beer_fg = ! isset( $meta['beer_fg'][0] ) ? '' : $meta['beer_fg'][0];
		$beer_color = ! isset( $meta['beer_color'][0] ) ? '' : $meta['beer_color'][0];
		$beer_grains = ! isset( $meta['beer_grains'][0] ) ? '' : $meta['beer_grains'][0];
		$beer_yeast = ! isset( $meta['beer_yeast'][0] ) ? '' : $meta['beer_yeast'][0];
		$beer_hops = ! isset( $meta['beer_hops'][0] ) ? '' : $meta['beer_hops'][0];
		$beer_avail = ! isset( $meta['beer_avail'][0] ) ? '' : $meta['beer_avail'][0];

		wp_nonce_field( basename( __FILE__ ), 'profile_fields' ); ?>

		<table class="form-table">

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_abv" style="font-weight: bold;"><?php _e( 'Alcohol by volume (ABV)', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_abv" class="regular-text" value="<?php echo esc_textarea( $beer_abv ); ?>">
					<p class="description"><?php _e( 'Example: 4.5%', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_ibu" style="font-weight: bold;"><?php _e( 'International Bitterness Units (IBU)', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_ibu" class="regular-text" value="<?php echo esc_textarea( $beer_ibu ); ?>">
					<p class="description"><?php _e( 'Example: 40', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_og" style="font-weight: bold;"><?php _e( 'Original Gravity (OG)', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_og" class="regular-text" value="<?php echo esc_textarea( $beer_og ); ?>">
					<p class="description"><?php _e( 'Example: 1.046', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_fg" style="font-weight: bold;"><?php _e( 'Final Gravity (FG)', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_fg" class="regular-text" value="<?php echo esc_textarea( $beer_fg ); ?>">
					<p class="description"><?php _e( 'Example: 1.020', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_color" style="font-weight: bold;"><?php _e( 'Color/SRM', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_color" class="regular-text" value="<?php echo esc_textarea( $beer_color ); ?>">
					<p class="description"><?php _e( 'Example: 24 or Black', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_grains" style="font-weight: bold;"><?php _e( 'Grains', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_grains" class="regular-text" value="<?php echo esc_textarea( $beer_grains ); ?>">
					<p class="description"><?php _e( 'Example: Pale, Caramel, Roasted Barley, Oat Flake', 'beer-directory' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_yeast" style="font-weight: bold;"><?php _e( 'Yeast', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_yeast" class="regular-text" value="<?php echo esc_textarea( $beer_yeast ); ?>">
					<p class="description"><?php _e( 'Example: American Ale' ); ?></p>
				</td>
			</tr>

			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_hops" style="font-weight: bold;"><?php _e( 'Hops', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_hops" class="regular-text" value="<?php echo esc_textarea( $beer_hops ); ?>">
					<p class="description"><?php _e( 'Example: East Kent Goldings, Northdown' ); ?></p>
				</td>
			</tr>
			
			<tr>
				<td class="beer_meta_box_td" colspan="1">
					<label for="beer_avail" style="font-weight: bold;"><?php _e( 'Availability', 'beer-directory' ); ?>
					</label>
				</td>
				<td colspan="4">
					<input type="text" name="beer_avail" class="regular-text" value="<?php echo esc_textarea( $beer_avail ); ?>">
					<p class="description"><?php _e( 'Example: Bottle, Can, On Tap, Seasonal' ); ?></p>
				</td>
			</tr>

		</table>

	<?php }

   /**
	* Save metaboxes
	*
	*/
	function save_meta_boxes( $post_id ) {

		global $post;

		// Verify nonce
		if ( !isset( $_POST['profile_fields'] ) || !wp_verify_nonce( $_POST['profile_fields'], basename(__FILE__) ) ) {
			return $post_id;
		}

		// Check Autosave
		if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || ( defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']) ) {
			return $post_id;
		}

		// Don't save if only a revision
		if ( isset( $post->post_type ) && $post->post_type == 'revision' ) {
			return $post_id;
		}

		// Check permissions
		if ( !current_user_can( 'edit_post', $post->ID ) ) {
			return $post_id;
		}

		$meta['beer_abv'] = ( isset( $_POST['beer_abv'] ) ? sanitize_textarea_field( $_POST['beer_abv'] ) : '' );

		$meta['beer_og'] = ( isset( $_POST['beer_og'] ) ? sanitize_textarea_field( $_POST['beer_og'] ) : '' );

		$meta['beer_ibu'] = ( isset( $_POST['beer_ibu'] ) ? sanitize_textarea_field( $_POST['beer_ibu'] ) : '' );

		$meta['beer_fg'] = ( isset( $_POST['beer_fg'] ) ? sanitize_textarea_field( $_POST['beer_fg'] ) : '' );

		$meta['beer_color'] = ( isset( $_POST['beer_color'] ) ? sanitize_textarea_field( $_POST['beer_color'] ) : '' );

		$meta['beer_grains'] = ( isset( $_POST['beer_grains'] ) ? sanitize_textarea_field( $_POST['beer_grains'] ) : '' );

		$meta['beer_yeast'] = ( isset( $_POST['beer_yeast'] ) ? sanitize_textarea_field( $_POST['beer_yeast'] ) : '' );

		$meta['beer_hops'] = ( isset( $_POST['beer_hops'] ) ? sanitize_textarea_field( $_POST['beer_hops'] ) : '' );
		
		$meta['beer_avail'] = ( isset( $_POST['beer_avail'] ) ? sanitize_textarea_field( $_POST['beer_avail'] ) : '' );

		foreach ( $meta as $key => $value ) {
			update_post_meta( $post->ID, $key, $value );
		}
	}

}