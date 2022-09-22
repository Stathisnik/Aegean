<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('inner');
$container = get_theme_mod( 'understrap_container_type' );
?>





			<!-- Do the left sidebar check -->


				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'thematiki' ); ?>
					
					<?php //understrap_post_nav(); ?>


				<?php endwhile; // end of the loop. ?>


	



</div><!-- #single-wrapper -->

<?php get_footer(); 
