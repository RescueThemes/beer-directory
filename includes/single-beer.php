<?php
/**
 * The template for displaying single beer posts.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

    	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

    		<div class="post-content-inner-wrap beer_post_list entry-content">

                <a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="beer-title">', '</h2>' ); ?></a>

                <?php if ( has_post_thumbnail() ) { ?>

                <div class="beer_image_wrap">
                    
                    <div class="beer_image">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                        </a>
                    </div><!-- .beer_image -->
                    
                </div><!-- .beer_image -->

                <?php } // end featured image check ?>

                <div class="beer_profile_wrap">

                   <div id="ribbon-container">
                        <span id="ribbon">
                            <?php _e('Beer Details','beer-directory'); ?>
                        </span>
                   </div><!-- .ribbon-container -->

                    <div class="beer_profile">

                        <ul>

                            <div class="major-meta">

                            <?php // ABV
                               $beer_abv = get_post_meta( get_the_ID(), 'beer_abv', true );
                               if ( !empty( $beer_abv ) ) {
                            ?>
                            <li class="beer_abv">
                                <span class="beer_profile_heading"><?php _e('ABV: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_abv ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // IBU
                               $beer_ibu = get_post_meta( get_the_ID(), 'beer_ibu', true );
                               if ( !empty( $beer_ibu ) ) {
                            ?>
                            <li class="beer_ibu">
                                <span class="beer_profile_heading"><?php _e('IBU: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_ibu ); ?></span>
                            </li>
                            <?php } ?>

                            </div><!-- .major-meta -->

                            <div class="minor-meta">

                            <?php // OG
                               $beer_og = get_post_meta( get_the_ID(), 'beer_og', true );
                               if ( !empty( $beer_og ) ) {
                            ?>
                            <li class="beer_og">
                                <span class="beer_profile_heading"><?php _e('OG: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_og ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // FG
                               $beer_fg = get_post_meta( get_the_ID(), 'beer_fg', true );
                               if ( !empty( $beer_fg ) ) {
                            ?>
                            <li class="beer_fg">
                                <span class="beer_profile_heading"><?php _e('FG: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_fg ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // Color
                               $beer_color = get_post_meta( get_the_ID(), 'beer_color', true );
                               if ( !empty( $beer_color ) ) {
                            ?>
                            <li class="beer_color">
                                <span class="beer_profile_heading"><?php _e('Color: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_color ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // Grains
                               $beer_grains = get_post_meta( get_the_ID(), 'beer_grains', true );
                               if ( !empty( $beer_grains ) ) {
                            ?>
                            <li class="beer_grains">
                                <span class="beer_profile_heading"><?php _e('Grains: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_grains ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // Yeast
                               $beer_yeast = get_post_meta( get_the_ID(), 'beer_yeast', true );
                               if ( !empty( $beer_yeast ) ) {
                            ?>
                            <li class="beer_yeast">
                                <span class="beer_profile_heading"><?php _e('Yeast: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_yeast ); ?></span>
                            </li>
                            <?php } ?>

                            <?php // Hops
                               $beer_hops = get_post_meta( get_the_ID(), 'beer_hops', true );
                               if ( !empty( $beer_hops ) ) {
                            ?>
                            <li class="beer_hops">
                                <span class="beer_profile_heading"><?php _e('Hops: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_hops ); ?></span>
                            </li>
                            <?php } ?>
                            
                             <?php // beer_avail
                               $beer_avail = get_post_meta( get_the_ID(), 'beer_avail', true );
                               if ( !empty( $beer_avail ) ) {
                            ?>
                            <li class="beer_avail">
                                <span class="beer_profile_heading"><?php _e('Availability: ','beer-directory'); ?></span>
                                <span class="beer_profile_meta"><?php echo esc_textarea( $beer_avail ); ?></span>
                            </li>
                            <?php } ?>

                            </div><!-- .minor-meta -->

                        </ul>

                        <div class="beer_notes">

                            <?php the_excerpt(); ?>

                        </div><!-- .beer_notes -->

                    </div><!-- .beer_profile -->

                    <div class="beer_post_content">

                        <?php the_content(); ?>

                    </div><!-- .beer_notes -->               

                </div><!-- .beer_profile_wrap -->

    		</div><!-- .post-content-inner-wrap -->

    	</article><!-- #post-## -->

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
