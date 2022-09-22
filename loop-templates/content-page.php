<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->
	<?php $post_content = get_the_content(); 
	if(isset($post_content) && $post_content != ""){ ?>

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<div class="entry-content">
			
			<?php the_content(); ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>

		</div><!-- .entry-content -->
	<?php 	}else{?>
		<div class="wrapper-content" id="wrapper-under-construction">

			<div class="container">

				<h4><?php echo pll__("Σύντομα κοντά σας");?></h4>
				<div>
					<img class="img-under-construction"
						src="<?php echo get_stylesheet_directory_uri(); ?>/img/girl_laptop_icon.svg" alt="">
				</div>

				<h6><?php echo pll__("Λυπούμαστε, η σελίδα είναι υπο κατασκευή.");?></h6>
				<a href="<?php echo get_home_url();?>" class="primary_btn"><?php echo pll__("Αρχική σελίδα");?></a>

			</div>
		</div>
	<?php }?>


</article><!-- #post-## -->
