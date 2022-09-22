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

					<?php get_template_part( 'loop-templates/content', 'businessneed' ); ?>

					<?php //understrap_post_nav(); ?>

					<?php $postid = get_the_ID();
						  $klados_epixeirisis = get_field('field_5f06caaaff9d9',$postid);
						  $edra_epixeirisis = get_field('field_5f06f79bad33a',$postid);
						  $arithmos_ergazomenon = get_field('field_5f06f9574811e',$postid);
						  $perigrafi_epixeirisis = get_field('field_5f06d1041bc6a',$postid);
						  $parousia_epixeirisis = get_field('field_5f06f7f4d1dd2',$postid);
						  $anagkes = get_field('field_5f06e1cbbff10',$postid);
						  $tipos_anagis = get_field('field_5f06e22dbff11',$postid);
						  ?>

				<?php endwhile; // end of the loop. ?>


	



</div><!-- #single-wrapper -->

<?php get_footer(); 
