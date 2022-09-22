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

			<!--	<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?> -->

			<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->
		<br>
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<!-- <div class="entry-content">

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
		<br>
		<?php $postid = get_the_ID();
						  $author_id = get_the_author_meta('ID');
						  um_fetch_user( $author_id );
						  $klados_epixeirisis = um_user('klados_business'); // get_field('field_5f06caaaff9d9',$postid);
						  $edra_epixeirisis = um_user('business_edra'); //get_field('field_5f06f79bad33a',$postid);
						  $arithmos_ergazomenon = um_user('business_employees_num'); //get_field('field_5f06f9574811e',$postid);
						  $perigrafi_epixeirisis = um_user('business_description'); //get_field('field_5f06d1041bc6a',$postid);
						  $parousia_epixeirisis = get_field('field_5f06f7f4d1dd2',$postid);
						  $anagkes = get_field('field_5f06e1cbbff10',$postid);
						  $tipos_anagis = get_field('field_5f06e22dbff11',$postid);
						  $perigrafi_anagkis = get_field('field_5f06e7f291e52',$postid);
						  $author = get_the_author_meta('ID');
						  $typos_anagkis = get_field( 'field_5f98181c12207',$postid); 
						  $per_anagkis = get_field('field_5f98187112208', $postid);
						  um_reset_user();
						//   var_dump($per_anagkis);
						//   var_dump($typos_anagkis);
						//   die();
						  ?>

		<?php	 //user's profile data 
					// $profile_id = um_profile_id();
					$display_name = um_user('user_login');
					$idiotita = um_user('idiotita');
					$email = um_user('user_email');
					$tmima = um_user('tmima');
					$etos = um_user('etos');
					$klados_endiaferodos = um_user('klados_endiaferodos');
					$nisi = um_user('nisi');
					$deksiotites = um_user('deksiotites');
					//if user is a business
					//$ergazomenoi = um_user('business_employees_num');
					//$klados = um_user('klados_business');
					//$edra = um_user('business_edra');
					//$perigrafi = um_user('business_description');
				?>

		<div class="container">
			<div class="row">

				<div class="col-md-9">

					<h3>
						<div class="different"> <?php the_field('field_',$postid); ?></div>
					</h3>
					<br>

					<h3> <?php echo $typos_anagkis; ?> </h3>
					<br>
					<div class="different"><?php echo $per_anagkis; ?></div>



				</div>

				<div class="col-md-3">
					<?php echo do_shortcode('[favorite_button]');?>
					<hr class="horizontal-line">
					<br>
					<div class="profinfo">
						<h6><?php echo pll__("Αριθμός εργαζομένων της επιχείρησης");?></h6>

						<div class="different"><?php echo $arithmos_ergazomenon;?></div>
					</div>



					<div class="different">
						<?php			
							if( $klados_epixeirisis ): ?>
						<div class="profinfo">
							<h6><?php echo pll__("Κλάδος Επιχείρησης");?></h6>
							<div class="different">

								<div class="different"><?php echo $klados_epixeirisis; ?>
									<!-- < echo $klados_epixeirisis['klados_2']; ?></div> -->

								</div>


							</div>
							<?php endif; ?>

						</div>

						<div class="different">
							<?php			
							if( $parousia_epixeirisis): ?>
							<div class="profinfo">
								<h6><?php echo pll__("Η επιχείρηση έχει παρουσία σε άλλα νησιά;");?></h6>
								<div class="different">

									<div class="different">

										<?php echo $parousia_epixeirisis['nai']; ?></div>

								</div>
							</div>


							<?php endif; ?>

						</div>

						<div class="different">
							<?php			
							if( $perigrafi_epixeirisis): ?>
							<div class="profinfo">
								<h6><?php echo pll__("Περιγραφή Επιχείρησης");?></h6>
								<div class="different">

									<div class="different">

										<?php echo $perigrafi_epixeirisis; ?></div>

								</div>
							</div>


							<?php endif; ?>

						</div>


						<div class="different">
							<?php			
							if( $edra_epixeirisis ): ?>
							<div class="profinfo">
								<h6><?php echo pll__("Έδρα Επιχείρησης");?></h6>
								<div class="different">

									<div class="different"><?php echo $edra_epixeirisis; ?>
										<!-- < echo $edra_epixeirisis['έδρα_']; ?></div> -->

									</div>

								</div>

								<?php endif; ?>

								<div class="different">
									<?php			
							if( $anagkes ): 
							?>
									<div class="profinfo">
										<h6><?php echo pll__("Tύπος Ανάγκης");?></h6>

										<div class="different">


											<?php
									 
									foreach ($anagkes as $anagki){?>
											<div class="different card" style="padding:10px;">
												<h6 class="font-weight-bold text-left mt-3" style="color:black;">
													<?php echo $anagki['τύπος__ανάγκης']; ?></h6>

												<?php	
									$allo = $anagki['allo'];
									echo $allo;
									echo $anagki['περιγραφή']; 
									echo '</div>';
									
									}?>



											</div>




											<?php endif; ?>



										</div>


									</div>


									<!--	<div class="different">
							<?php			
							if( $anagkes ): 
							?>
							<div class="profinfo">
								<h6><?php echo pll__("Tύπος Ανάγκης");?></h6>
								<div class="different">

									<div class="different">
										<?php
									foreach ($anagkes as $anagki){
									echo $anagki['τύπος__ανάγκης']; 
									
									$othertext = $anagki['αλλο'];
									echo $othertext;
									}?>
									</div>

								</div>


							</div>
							<?php endif; ?>

						</div> -->
									<hr class="horizontal-line">

									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="social-share"><?php echo pll__("Κοινοποίηση"); ?></div>

									<div class="addthis_inline_share_toolbox_4iwa"></div>


								</div>


							</div>

						</div>
					</div>
				</div>
				<section id="busineeds-section">
					<div class="container">
						<h3 class="heading-more"><?php echo pll__("Σχετικές Ανάγκες");?></h3>
						<div class="card-deck">

							<?php
					
					$args = array(
						// 'author' => $author,
						'numberposts' => 4,
						'post_type'   => 'businessneed'
					  );
					   
					  $other_businessneeds = get_posts( $args );
					
					  
				
				?>

							<?php foreach($other_businessneeds as $other_businessneed){
							$other_businessneed_id = $other_businessneed->ID; //retrieve the id of card - card
							
							?>
							<a href="<?php echo get_permalink($other_businessneed_id);?>">
								<div class="card">

									<?php echo get_the_content($other_businessneed);?>
									<div class="card-body">

										<h5 class="card-title-news"><?php echo $typos_anagkis; ?></h5>
										<h5><?php echo $per_anagkis;; ?></h5>

										<div class="d-flex justify-content-end learn-more">
											<a href="<?php echo get_permalink($other_businessneed_id);?>"
												style="color: #3397FF;"></a>
										</div>

									</div>
								</div>
								<?php }?>

							</a>

						</div>

					</div>
					<button
						onclick="window.location.href='https:/aegean-crowdsourcing/ανάγκες-επιχειρήσεων/';"
						type="button" class="primary_btn"><?php echo pll__("Περισσότερα");?></button>
			</div>

		</div>
		</section>
		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->

	</article><!-- #post-## -->
</div>