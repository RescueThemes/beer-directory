<?php

/**
* Register shortcode
*/
class Beer_Post_Type_Shortcode {

    public function __construct() {
        add_shortcode( 'beer', array( $this, 'beer_list_shortcode' ) );
    }
     
    public function beer_list_shortcode( $atts ) {

        ob_start();

        /**
        * Define attributes defaults
        *
        */
        extract( shortcode_atts( array (
            'count'     => -1,
            'id'        => '',
            'orderby'   => 'post_date',
            'category'  => '',

        ), $atts ) );

        /**
        * Define WP_Query parameters based on shortcode_atts
        *
        */
        $args = array(
            'post_type'      => 'beer',
            'posts_per_page' => $count,
            'page_id'        => $id,
            'orderby'        => $orderby,
            'order'          => 'ASC',
        );

        /**
        * Check if the user wants to display by category/term and
        * if so, get the custom posts term/category
        *
        */
        if ( !empty( $category ) ) {
            $tax_args = array(
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'beer-category',
                        'field'     => 'slug',
                        'terms'     => $category
                    ),
                ),
            );
            $args = array_merge( $args, $tax_args );
        }

        $query = new WP_Query( $args );

        /**
        * Run the loop based on the parameters
        *
        */
        if ( $query->have_posts() ) { 

        ?>

        <?php
            /**
            * Our output
            *
            */
        ?>
        <ul class="beer_post_list">

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="beer-title">', '</h2>' ); ?></a>

                <?php if ( has_post_thumbnail() ) { ?>

                <div class="beer_image_wrap">
                    
                    <div class="beer_image">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                        </a>
                    </div><!-- .beer_image -->
                    
                </div><!-- .beer_image -->

                <?php } ?>

                <div class="beer_profile_wrap" <?php if ( !has_post_thumbnail() ) { ?> style="width:100%;"<?php } ?>>

                   <div id="ribbon-container">
                        <span id="ribbon">
                            <a href="<?php the_permalink(); ?>"><?php _e('Beer Details','beer-directory'); ?></a>
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

                            <li class="beer_link">
                                <span class="beer_profile_heading"><a href="<?php the_permalink(); ?>"><?php _e('More Information','beer-directory'); ?></a></span>
                            </li>

                            </div><!-- .minor-meta -->

                        </ul>

                    </div><!-- .beer_profile -->

                    <div class="beer_notes">

                        <?php the_excerpt(); ?>

                    </div><!-- .beer_notes -->               

                </div><!-- .beer_profile_wrap -->

            </li>

            <?php endwhile;
            wp_reset_postdata(); ?>

        </ul><!-- .beer_post_list -->

        <?php $beerlist = ob_get_clean();

        return $beerlist;

        }

    }

}

$Beer_Post_Type_Shortcode = new Beer_Post_Type_Shortcode();