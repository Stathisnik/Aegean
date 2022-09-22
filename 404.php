<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('inner');

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-under-construction">

	<div class="container">

	<h2><?php echo pll__("Η σελίδα δεν βρέθηκε");?></h2>
	<h4>404</h4>
	        <div>
				<img class="img-under-construction" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wondering_icon.svg" alt="">
			</div>
		<h6><?php echo pll__("Λυπούμαστε, η σελίδα δεν βρέθηκε. Δοκιμάστε ξανά.");?></h6>

			<a href="<?php echo get_home_url();?>" class="primary_btn" ><?php echo pll__("Αρχική σελίδα");?></a>
		
	</div>

</div>

<?php get_footer();
