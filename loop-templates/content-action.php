<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">

			<!--<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>-->
			<br>
			<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->
		<br>
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<!--<div class="entry-content">

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
	  entry-content -->

		<br>
		<?php $postid = get_the_ID();
						 $titlos_drashs = get_field('field_5f057b8a1da3e',$postid);
						 $epipleon_meli = get_field('field_5f057dbf1da42',$postid);
						 $tipos_drashs = get_field('field_5f059a9f49ca1',$postid);
						 $ypoboli_se_diagonismo = get_field('field_5f059ecbb31f3',$postid);
						 $selector = get_field('field_5f059ef3b31f4',$postid);
						 $perigrafi_drashs = get_field('field_5f0599aab60d8',$postid);
						 $tha_exete_esoda = get_field('field_5f059c4127f12',$postid);
						 $website_drashs = get_field('field_5f05c353abe3b',$postid);
						 $sxesi_me_aigaio = get_field('field_5f0dbae02f484',$postid);
						 $apotipoma_perivallon = get_field('field_5f05baab5c4b9',$postid);
						 $apotipoma_exoikonomisi_poron = get_field('field_5f05c0c3ba481',$postid);
						 $apotipoma_koinonia = get_field('field_5f05c109ba482',$postid);
						 $apotipoma_anaptixi = get_field('field_5f05c1e9ba483',$postid);
						 $apotipoma_erevna_akadimia = get_field('field_5f05c22eba484',$postid);
						 $anhkei_se_diagonismo = get_field('field_5f057c651da3f',$postid);
						 $eikona_kai_video = get_field('field_5f43761576775',$postid);
                         $author = get_the_author_meta('ID');
						  ?>

		<div class="container">
		<?php //echo $author; ?>
			<div class="row">

				<div class="col-md-9">


					<h2 class="font-weight-bold mt-3"><?php the_field('field_5f057b8a1da3e',$postid); ?>
					</h2>
					<br>

					<div class="different">
						<?php			
							if( $eikona_kai_video ): ?>


						<ul class="different">
							
								<div class="different"><img class="content-img"
										src="<?php echo $eikona_kai_video['φωτογραφίες']; ?>">

								</div>
							
						</ul>
						<?php endif; ?>

					</div>

					<h6 class="font-weight-bold text-left mt-3" style="color:black;"><?php echo pll__("Περιγραφή Δράσης");?></h6>
					<div class="different-inner"><?php echo $perigrafi_drashs; ?></div>
					<br>
					<br>

					<h6 class="font-weight-bold text-left mt-3" style="color:black;"><?php echo pll__("Η σχέση σας με το Αιγαίο");?></h6>
					<div class="different"><?php echo $sxesi_me_aigaio; ?></div>

					<br>

					<br>

					<p>
						<h6 class="small_title targets"><?php echo pll__("Στόχοι βιώσιμης ανάπτυξης");?></h6>
					</p>
					<br>
					<?php

		 
		
		//$icons = get_field('field_5f2d0055ca743');
		
		//echo $icons["buttons_row"].'<br/>'; 
		$targets_group = get_field('field_5f2d0055ca743');	
		$synergasia_gia_stoxous =  $targets_group['συνεργασία_για_στόχους'];
		$exaleipsi_peinas = $targets_group['hunger'];
		$kali_ygeia = $targets_group['καλή_υγεία'];
        $poiotiki_ekpedefsi =  $targets_group['ποιοτική_εκπαίδευση'];
		$isotita_filon = $targets_group['ισότητα_των_φύλων'];
		$nero_apoxetefsi = $targets_group['καθαρό_νερό_και_αποχέτευση'];
		$ananeosimi_energeia =  $targets_group['ανανεώσιμη_ενέργεια'];
		$theseis_ergasias_oik_anaptixi = $targets_group['καλές_θέσεις_εργασίας_και_οικονομική_ανάπτυξη'];
		$kainotomia_ypodomes = $targets_group['καινοτομία_και_υποδομές'];
        $miosi_anisotiton =  $targets_group['μείωση_των_ανισοτήτων'];
		$aeiforeis_poleis = $targets_group['αειφόρες_πόλεις_και_κοινότητες'];
		$ipefthini_katanalosi = $targets_group['υπεύθυνη_κατανάλωση'];
		$draseis_gia_klima = $targets_group['δράσεις_για_το_κλίμα'];
		$ypothallasia_zoi = $targets_group['υποθαλάσσια_ζωή'];
        $xersea_zoi =  $targets_group['χερσαία_ζωή'];
		$eirini_dikaiosini = $targets_group['ειρήνη_και_δικαιοσύνη'];
		$sinergasies_gia_stoxous = $targets_group['συνεργασίες_για_στόχους'];

		//echo $synergasia_gia_stoxous;
		
		if($synergasia_gia_stoxous){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-1.png"
							alt="">
						<p class="font-weight-bold m-2"><?php echo pll__("1. Συνεργασία για στόχους");?></p>
					</div>
					<p><?php echo $synergasia_gia_stoxous; ?></p>
					<?php }?>
					<?php 
		if($exaleipsi_peinas){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-2.png"
							alt="">
						<p class="font-weight-bold m-2"><?php echo pll__("2. Εξάλειψη Πείνας");?></p>
					</div>
					<p><?php echo $exaleipsi_peinas; ?></p>

					<?php } ?>

					<?php 
		if($kali_ygeia) {?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-3.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("3. Καλή υγεία");?> </p>
					</div>
					<p><?php echo $kali_ygeia; ?></p>
					<?php } ?>

					<?php 
		if($poiotiki_ekpedefsi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-4.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("4. Ποιοτική εκπαίδευση");?> </p>
					</div>
					<p><?php echo $poiotiki_ekpedefsi; ?></p>
					<?php } ?>

					<?php 
		if($isotita_filon){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-5.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("5. Ισότητα των φύλων");?> </p>
					</div>
					<p><?php echo $isotita_filon; ?></p>
					<?php } ?>

					<?php 
		if($nero_apoxetefsi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-6.png"
							alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 6. Καθαρό νερό και αποχέτευση");?> </p>
					</div>
					<p><?php echo $nero_apoxetefsi; ?></p>
					<?php } ?>

					<?php 
		
		if($ananeosimi_energeia){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-7.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("7. Ανανεώσιμη ενέργεια");?> </p>
					</div>
					<p><?php echo $ananeosimi_energeia; ?></p>
					<?php } ?>

					<?php 
		if($theseis_ergasias_oik_anaptixi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-8.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("8. Καλές θέσεις εργασίας και οικονομική ανάπτυξη ");?></p>
					</div>
					<p><?php echo $theseis_ergasias_oik_anaptixi; ?></p>
					<?php } ?>

					<?php
		if($kainotomia_ypodomes){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-9.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("9. Καινοτομία και υποδομές");?> </p>
					</div>
					<p><?php echo $kainotomia_ypodomes; ?></p>
					<?php } ?>

					<?php 
		if($miosi_anisotiton){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-10.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("10. Μείωση των ανισοτήτων ");?></p>
					</div>
					<p><?php echo $miosi_anisotiton; ?></p>
					<?php } ?>

					<?php 
		if($aeiforeis_poleis){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-11.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("11. Αειφόρες πόλεις και κοινότητες");?> </p>
					</div>
					<p><?php echo $aeiforeis_poleis; ?></p>
					<?php } ?>

					<?php 
		if($ipefthini_katanalosi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-12.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("12. Υπεύθυνη κατανάλωση");?> </p>
					</div>
					<p><?php echo $ipefthini_katanalosi; ?></p>
					<?php } ?>

					<?php 
		if($draseis_gia_klima){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-13.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("13. Δράσεις για το κλίμα");?> </p>
					</div>
					<p><?php echo $draseis_gia_klima; ?></p>
					<?php } ?>

					<?php 
		if($ypothallasia_zoi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-14.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("14. Υποθαλάσσια ζωή");?> </p>
					</div>
					<p><?php echo $ypothallasia_zoi; ?></p>
					<?php } ?>

					<?php 
		if($xersea_zoi){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-15.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("15. Χερσαία ζωή ");?></p>
					</div>
					<p><?php echo $xersea_zoi; ?></p>
					<?php } ?>

					<?php 
		if($eirini_dikaiosini){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-16.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("16. Ειρήνη και δικαιοσύνη ");?></p>
					</div>
					<p><?php echo $eirini_dikaiosini; ?></p>
					<?php } ?>

					<?php 
		if($sinergasies_gia_stoxous){?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas"
							src="/wp-content/uploads/2020/07/sdg-17.png"
							alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("17. Συνεργασίες για στόχους");?> </p>
					</div>
					<p><?php echo $sinergasies_gia_stoxous; ?></p>
					<?php } ?>
					<!-- Go to www.addthis.com/dashboard to customize your tools -->

					<div class="addthis_inline_share_toolbox_4iwa"></div>
					<br>
					<br>


				</div>


				<div class="col-md-3">
					<?php echo do_shortcode('[favorite_button]');?>
					<hr class="horizontal-line">
					<br>
					<div class="different">
						<?php			
							if( $epipleon_meli ): ?>
						<div class="profinfo">
							<h6><?php echo pll__("Μέλη");?></h6>
							<div class="different">

								<div class="different"><?php echo $epipleon_meli['πόσα_μέλη_έχει;']; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>

					</div>





					<div class="different">
						<?php			
							if( $ypoboli_se_diagonismo ): ?>
						<div class="profinfo">
							<h6><?php echo pll__("Υποβολή σε άλλο διαγωνισμό");?></h6>
							<div class="different">

								<div class="different">
									<?php echo $ypoboli_se_diagonismo['selector1']; ?></div>

							</div>


						</div>
						<?php endif; ?>

					</div>

					<div class="different">
						<?php			
							if( $tha_exete_esoda): ?>
						<div class="profinfo">
							<h6><?php echo pll__("Έσοδα απο την δράση");?></h6>
							<div class="different">

								<div class="different">
									<?php echo $tha_exete_esoda['poso']; ?></div>

							</div>


						</div>
						<?php endif; ?>

					</div>

					<div class="different">
						<?php			
							if( $anhkei_se_diagonismo ): ?>
						<div class="profinfo">

							<h6><?php echo pll__("Ανήκει σε διαγωνισμό");?></h6>
							<div class="different">

								<div class="different">
									<?php echo $anhkei_se_diagonismo['selector1']; ?></div>

							</div>
						</div>


						<?php endif; ?>

					</div>

					<?php			
							if( $tipos_drashs ): ?>
					<div class="profinfo">
						<h6><?php echo pll__("Τύπος Δράσης");?></h6>
						<div class="different">

							<div class="different"><?php echo $tipos_drashs['tiposdrasis']; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>


					<div class="profinfo">
						<h6><?php echo pll__("Web site της δράσης");?></h6>

						<div class="different"><?php echo $website_drashs; ?></div>
					</div>


					<hr class="horizontal-line">

					<!-- Go to www.addthis.com/dashboard to customize your tools -->

					<div class="addthis_inline_share_toolbox_4iwa"></div>

				</div>

			</div>

		</div>
</div>
<section id="actions-section">
<div class="container">
		<h3 class="heading-more"><?php echo pll__("Σχετικές Δράσεις");?></h3>
		<div class="card-deck">
			<?php
            $args = array(
                // 'author' => $author,
                'post_type' => 'action',
                'numberposts' => 4,
            );
            $other_actions = get_posts($args);
            ?>
			<?php foreach ($other_actions as $other_action) { ?>
			<?php
                $other_action_id = $other_action->ID; //retrieve the id of card - action
                $other_action_img = get_field('field_5f43761576775', $other_action_id); //retrieve the image of the card by giving the right id ($other_action_id)
                ?>
			
				<div class="card idea-card">
					<a href="<?php echo get_permalink($other_action_id); ?>">
						<div class="card-body">
							<?php if ($other_action_img['φωτογραφίες'] != "") { ?>
							<div class="sec-ideas-img"
								style="background-image: url('<?php echo $other_action_img['φωτογραφίες']; ?>')">
							</div>
							<?php } else { ?>
							<div class="sec-ideas-img"
								style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/aegean_feature_img-action.png'; ?>')">
							</div>

							<?php } ?>

							<h5 class="card-title-news"><?php echo get_the_title($other_action); ?></h5>

						</div>
						<div class="card-footer" style="padding: 1.25rem;">
							<small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
						</div>
					</a>
				</div>
			
			<?php } ?>
		</div>
	</div>
		<button
					onclick="window.location.href='https:/aegean-crowdsourcing/%ce%b1%cf%81%cf%87%ce%b5%ce%af%ce%bf-%ce%b4%cf%81%ce%ac%cf%83%ce%b5%cf%89%ce%bd/';"
					type="button" class="primary_btn"><?php echo pll__("Περισσότερα");?></button>
	</div>
	
	</div>

	<?php if (empty($synergasia_gia_stoxous or $exaleipsi_peinas or $kali_ygeia or $poiotiki_ekpedefsi or $isotita_filon 
	or $nero_apoxetefsi or $ananeosimi_energeia or $theseis_ergasias_oik_anaptixi or $kainotomia_ypodomes or $miosi_anisotiton
	or $aeiforeis_poleis or $ipefthini_katanalosi or $draseis_gia_klima or $ypothallasia_zoi or $xersea_zoi 
	or $eirini_dikaiosini or  $sinergasies_gia_stoxous)){ ?>
		<style>
			.small_title.targets{
				display:none;
			}
		</style>
		<?php } ?>
</section>
<footer class="entry-footer">

	<?php understrap_entry_footer(); ?>

</footer><!-- .entry-footer -->

</article><!-- #post-## -->

</div>