<section id="business-ideas">
	<div class="container">
		<div class="row text-center justify-content-center my-4">
				<img class="idea-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon.svg" alt="">
		</div>
		<?php if(pll_current_language() == 'el'){ ?>
		<h2><?php echo get_field('τιτλος_επιχειρηματικων_ιδεων');?></h2>
		<?php }else{?>
		<h2><?php echo get_field('title_business_ideas');?></h2>
		<?php } ?>
		<div class="row">
			<?php
			
				$args = array(
					// 'author' => $author,
					'post_type' => 'businessidea',
					'numberposts' => 4,
					'lang' => '',
				);
				
				$other_ideas = get_posts( $args );
			
				$postid = get_the_ID( $other_ideas);
				$perigrafi_tis_ideas = get_field('field_5ef9add15ce6c',$postid);
				$titlos_epixirimatikis_ideas = get_field('field_5ef9a8fe847ec',$postid);
				$epipleon_melh = get_field('field_5ef9aad213336',$postid);	
				$typos_proiontos_sistimatos = get_field('field_5ef9b1ac48d79',$postid);
				$aniki_se_diagonismo = get_field('field_5ef9acb911334',$postid);
				$klados_ = get_field('field_5ef9af8b9153e',$postid);
				$anagkes = get_field('field_5efca059282eb',$postid);
				$typos_anagkhs = get_field('field_5eff14ac4e2c4',$postid);
				$sustainable_development_goals = get_field('field_5f16a62b8aa04',$postid);
				$goals = get_field('field_5f1936b0d46d8',$postid);
				$stadio = get_field('field_5ef9b2bd0c190',$postid);
				$eikona_video = get_field('field_5f00afdb6b723',$postid);
				$adapodotika_ofeli = get_field('field_5efca18309955',$postid);
				$author = get_the_author_meta('ID');
				$other_idea_img = get_field('field_5f00afdb6b723',$postid);
				?>



			<?php foreach($other_ideas as $other_idea){
				$other_idea_id = $other_idea->ID; //retrieve the id of card - idea
				$other_idea_img = get_field('field_5f00afdb6b723',$other_idea_id);
				$eikona_video = get_field('field_5f00afdb6b723',$postid); //retrieve the image of the card by giving the right id ($other_idea_id)
				?>
			<div class = "col-md-6 col-lg-3">
			<div class="card idea-card">
				<a href="<?php echo get_permalink($other_idea_id);?>">
					<div class="card-body">
						<?php if($other_idea_img['φωτογραφίες'] != ""){ ?>
						<div class="sec-ideas-img"
							style="background-image: url('<?php echo $other_idea_img['φωτογραφίες'];?>')">
						</div>
						<?php } else { ?>
						<div class="sec-ideas-img"
							style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/aegean_feature_img-idea.png';?>');background-repeat-x:no-repeat;background-size:cover;">
						</div>

						<?php } ?>

						<h5 class="card-title-news"><?php echo get_the_title($other_idea);?></h5>

					</div>
					<div class="card-footer" style="padding: 1.25rem;">
						<small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
					</div>
				</a>
			</div>
			</div>
			<?php }?>
		</div>
		<?php if(pll_current_language() == 'el'){ ?>
		<button onclick="window.location.href='https:/aegean-crowdsourcing/idees/';"
			type="button" class="primary_btn"><?php echo pll__("Περισσότερα");?>
		</button>
		<?php } else { ?>
			<button onclick="window.location.href='https:/aegean-crowdsourcing/ideas/';"
			type="button" class="primary_btn"><?php echo pll__("More");?>
		</button>
		<?php }?>
	</div>
</section>