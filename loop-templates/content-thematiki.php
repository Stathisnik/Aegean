<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$ideas_on_thematiki = [];
?>
<div class="container">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">

			<!--	<?php
						the_title(
							sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
							'</a></h2>'
						);
						?> -->

			<?php if ('post' == get_post_type()) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->
		<br>

		<?php

		$args = array(
			'post_type'   => 'businessidea',
			'lang' => "el",
			'posts_per_page' => -1,
		);


		$ideas = new WP_Query($args);

		foreach ($ideas->posts as $idea) {
			$diagonismos_relation = get_field("field_5ef9acb911334", $idea->ID);
			$otherthematiki_id = $otherthematiki->ID;
			$image_thematiki = get_field('thematiki_img',$otherthematiki_id);
			// var_dump($diagonismos_relation);
			if (isset($diagonismos_relation["aniki_se_diagonismo"]) && $diagonismos_relation["θεματική"]->post_title != NULL && $diagonismos_relation["θεματική"]->post_title == $post->post_title) {
				array_push($ideas_on_thematiki, $idea);
			}
		}
		
		?>



		<div class="container">
			<h4 class="thematiki-inner-title"><?php echo get_the_title($otherthematiki); ?></h4>
			<h2 class="title-thematiki text-muted"><?php echo pll__("Θεματική"); ?></h2>
			<div class="row thematiki-content">
				<img class="thematiki-featured-image" src="<?php echo $image_thematiki; ?>" alt="">
				<div class="thematiki-desc">
					<p> <?php the_content(); ?> </p>
				</div>
			</div>

			<h3 class="heading-more mt-4 them_idea_title">
				<?php echo pll__("Επιχειρηματικές Ιδέες σε αυτή την θεματική"); ?></h3>



			<div class="card-deck row">


				<?php foreach ($ideas_on_thematiki as $other_idea) {
					$other_idea_id = $other_idea->ID; //retrieve the id of card - idea
					$other_idea_img = get_field('field_5f00afdb6b723', $other_idea_id);
					$eikona_video = get_field('field_5f00afdb6b723', $postid); //retrieve the image of the card by giving the right id ($other_idea_id)
				?>
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card idea-card">
						<a href="<?php echo get_permalink($other_idea_id); ?>">
							<div class="card-body">
								<?php if ($other_idea_img['φωτογραφίες'] != "") { ?>
								<div class="sec-ideas-img"
									style="background-image: url('<?php echo $other_idea_img['φωτογραφίες']; ?>')">

								</div>
								<?php } else { ?>
								<div class="sec-ideas-img"
									style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/aegean_feature_img-idea.png'; ?>')">
								</div>

								<?php } ?>

								<h5 class="card-title-news"><?php echo get_the_title($other_idea); ?></h5>

							</div>
							<div class="card-footer" style="padding: 1.25rem;">
								<small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>



		<?php

		$args = array(
			'post_type'   => 'competition',
			'lang' => "el",
			'posts_per_page' => -1,
		);


		$diagonismoi = new WP_Query($args);

		foreach ($diagonismoi->posts as $diagonismos) {
			$postid = get_the_ID($diagonismos);
			$diagonismos_id = $diagonismos->ID;
			$diagonismos_relation = get_field("field_5ef9acb911334", $idea->ID);
			// var_dump($diagonismos->post_title);
			if (isset($diagonismos_relation["aniki_se_diagonismo"]) && $diagonismos_relation["θεματική"]->post_title != NULL && $diagonismos_relation["θεματική"]->post_title == $post->post_title) {
				array_push($ideas_on_thematiki, $idea);
			}
		}
		?>

		<h3 class="heading-more"><?php echo pll__("Διαγωνισμοί που υποστηρίζουν την θεματική περιοχή"); ?></h3>
		<div class="card-deck row">
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card idea-card">
					<a href="<?php echo get_permalink($diagonismos); ?>">
						<div class="card-body">
							<h6 class="thematiki-title"><?php echo get_the_title($diagonismos); ?></h6>

						</div>
						<div class="card-footer" style="padding: 1.25rem;">
							<small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
						</div>
					</a>
				</div>
			</div>

		</div>


</div>
</div>
<?php if (empty($diagonismos)){ ?>
<style>
	.thematiki-title {
		display: none;
	}
</style>
<?php } ?>

<?php if (empty($other_idea)){ ?>
<style>
	.heading-more.mt-4.them_idea_title {
		display: none;
	}
</style>
<?php } ?>


<?php

wp_link_pages(
	array(
		'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
		'after'  => '</div>',
	)
);
?>
</div>

<footer class="entry-footer">

	<?php understrap_entry_footer(); ?>

</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>