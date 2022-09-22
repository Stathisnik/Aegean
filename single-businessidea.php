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

					<?php get_template_part( 'loop-templates/content', 'businessidea' ); ?>

					<?php //understrap_post_nav(); ?>

					<?php $postid = get_the_ID();
						  $perigrafi_tis_ideas = get_field('field_5ef9add15ce6c',$postid);
						  $titlos_epixirimatikis_ideas = get_field('field_5ef9a8fe847ec',$postid);
						  $epipleon_melh = get_field('field_5ef9aad213336',$postid);	
                          $typos_proiontos_sistimatos = get_field('field_5ef9b1ac48d79',$postid);
						  $klados_ = get_field('field_5ef9af8b9153e',$postid);
						  $anagkes = get_field('field_5efca059282eb',$postid);
						  $typos_anagkhs = get_field('field_5eff14ac4e2c4',$postid);
						  $sustainable_development_goals = get_field('field_5f16a62b8aa04',$postid);
						  
						  ?>

				<?php endwhile; // end of the loop. ?>


	



</div><!-- #single-wrapper -->

<?php get_footer(); 
