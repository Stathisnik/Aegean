<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php 
	$postid = get_the_ID();
	$posts = array('2318','2374','2750');
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<!-- displays the post title -->
		<?php if(in_array($postid, $posts)): ?>
			<?php the_title( '<h2 class="font-weight-bold pb-3">', '</h2>' ); ?> 
		<?php else: ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> 
		<?php endif; ?>

		<div class="entry-meta">
			<!-- displays the date and author -->
			<!--<?php understrap_posted_on(); ?> -->

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
			<!-- displays the feautured image -->
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<?php

		//Check if currentpost is "Παλαιότερος Διαγωνισμός" then changes the css accordingly
		if(in_array($postid, $posts)):
	
	?>
	<div class="entry-contentt" style="max-width: none; text-align: initial; margin-bottom: 0;" >
		<!-- displays the post content -->
		<div class="newscontent"><?php the_content(); ?></div>
		<!-- Displays post navigation (previus next arrows) -->
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?> 

	</div><!-- .entry-content -->
	<?php else: ?>
		<div class="entry-contentt" style="max-width: 800px; text-align: justify; margin-bottom: 80px;" >
		<!-- displays the post content -->
		<div class="newscontent"><?php the_content(); ?></div>
		<!-- Displays post navigation (previus next arrows) -->
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?> 

	</div><!-- .entry-content -->

	<?php endif; ?>
	
	<div class="container">
		<div class="row">
		

	
		</div>
	</div>

	<footer class="entry-footer">
		<!-- displays post footer -->
		<!-- <?php understrap_entry_footer(); ?> -->

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
