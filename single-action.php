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

					<?php get_template_part( 'loop-templates/content', 'action' ); ?>

					<?php //understrap_post_nav(); ?>

					<?php $postid = get_the_ID();
						  $titlos_drashs = get_field('field_5f057b8a1da3e',$postid);
						  $epipleon_meli = get_field('field_5f057dbf1da42',$postid);
						  $tipos_drashs = get_field('field_5f059a9f49ca1',$postid);
						  $ypoboli_se_diagonismo = get_field('field_5f059ecbb31f3',$postid);
						  $perigrafi_drashs = get_field('field_5f0599aab60d8',$postid);
						  $tha_exete_esoda = get_field('field_5f059c4127f12',$postid);
						  ?>

				<?php endwhile; // end of the loop. ?>


	



</div><!-- #single-wrapper -->

<?php get_footer(); 
