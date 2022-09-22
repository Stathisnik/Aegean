<section id="thematikes">
	<div class="container">
	<?php if(pll_current_language() == 'el'){ ?>
		<h2><?php echo get_field('τιτλος_θεματικων');?></h2>
		<?php }else{ ?>
			<h2><?php echo get_field('title_thematikes');?></h2>
			<?php }?>

		<div class="row thematikes-section">
		<?php if(pll_current_language() == 'el'){ ?>
		<?php 

					$args = array(
					'post_type' => 'thematiki',
					'lang' => 'el',
					);

					$otherthematikes = get_posts( $args );
				?>
				<?php }else{ ?>
					<?php 

					$args = array(
					'post_type' => 'thematiki',
					'lang' => 'en',
					);

					$otherthematikes = get_posts( $args );
				?>
				<?php }?>

				<?php foreach($otherthematikes as $otherthematiki){
			  $postid = get_the_ID( $otherthematiki);
			  $otherthematiki_id = $otherthematiki->ID;
			  $image_thematiki = get_field('thematiki_img',$otherthematiki_id);
			  ?>
			<div class="col-md-3">
				


				<a href="<?php echo get_permalink($otherthematiki_id);?>">
					<div class="card-body">
						<?php if($image_thematiki !=""){ ?>
						<img class="thematiki-featured-image" src="<?php echo $image_thematiki; ?>" alt=" ">
						<?php } else { ?>
							<img class="thematiki-featured-image" src="<?php echo get_stylesheet_directory_uri();?>/img/idea-grey.png"
							 alt="">
							<?php } ?>
						<h6><?php echo get_the_title($otherthematiki);?></h6>
					</div>
				</a>
			</div>

			<?php } ?>


			
		</div>
		<?php if(pll_current_language() == 'el'){ ?>
		<div class="d-flex justify-content-end primary-link">
				<a href="<?php echo get_home_url();?>/thematikes-archive/" style="color: #3397FF; margin-top: 45px;"><?php echo pll__("Περισσότερα >");?></a>
		</div>
		<?php }else{ ?>
			<div class="d-flex justify-content-end primary-link">
				<a href="<?php echo get_home_url();?>/thematikes-en/" style="color: #3397FF; margin-top: 45px;"><?php echo pll__("More >");?></a>
		</div>
		<?php }?>

	</div>
</section>