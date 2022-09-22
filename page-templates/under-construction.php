<?php
/**
 * Template Name: Under-Construction
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */
?>

<?php get_header('inner'); ?>

<div class="wrapper" id="wrapper-under-construction">

	<div class="container">

	<h2><?php echo pll__("Η σελίδα είναι υπό κατασκευή");?></h2>
	<h4 ><?php echo pll__("Σύντομα κοντά σας");?></h4>
	        <div>
				<img class="img-under-construction" src="<?php echo get_stylesheet_directory_uri(); ?>/img/girl_laptop_icon.svg" alt="">
			</div>
			<h6"><?php echo pll__("Λυπούμαστε, η σελίδα είναι υπο κατασκευή.");?></h6>

			<a href="<?php echo get_home_url();?>" class="primary_btn " ><?php echo pll__("Αρχική σελίδα");?></a>
		
	</div>
</div>

<?php get_footer();?>