<?php
/**
 * Template Name: Simple-Template
 *
 * 
 *
 * @package understrap
 */
?>



<?php get_header('inner'); ?>
<div class="container">
	<div id="primary" class="site-content ">

		
		<?php
  		if ( have_posts() ) { 
   			while ( have_posts() ) { the_post(); ?>
				<?php get_template_part( 'loop-templates/content','page' );
			} // end of the loop.
		} ?>
	</div>
</div>
<?php get_footer();?>