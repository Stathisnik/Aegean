<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col-md-4 d-flex">
	<a class="permalink" href="<?php echo get_permalink();?>">
		<div class="card">
			<?php
				$imgurl = catch_that_image();
			?>
			<div class="post-image ideas" style="margin-top: 15px; background-image:url('<?php echo $imgurl;?>');"></div>
			<div class="card-body card-main-news">
			<h5 class="card-title-news"><?php echo mb_strimwidth (get_the_title($new), 0, 50, '...'); ?></h5>

				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php the_excerpt(); ?>
				<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						)
					);
				?>
			</div>
		</div>
	</a>
</div>