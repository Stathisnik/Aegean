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
						  $klados_epixeirisis = um_user('klados_business'); // get_field('field_5f06caaaff9d9',$postid);
						  $edra_epixeirisis = um_user('business_edra'); //get_field('field_5f06f79bad33a',$postid);
						  $arithmos_ergazomenon = um_user('business_employees_num'); //get_field('field_5f06f9574811e',$postid);
						  $perigrafi_epixeirisis = um_user('business_description'); //get_field('field_5f06d1041bc6a',$postid);

						  $parousia_epixeirisis = get_field('field_5f06f7f4d1dd2',$postid);
						  $anagkes = get_field('field_5f06e1cbbff10',$postid);
						  $tipos_anagis = get_field('field_5f06e22dbff11',$postid);
						  $perigrafi_anagkis = get_field('field_5f06e7f291e52',$postid);
						  $author = get_the_author_meta('ID');
						  $typos_anagkis = get_field( 'field_5f6c8a9c515f6',$postid); 
						  $per_anagkis = get_field('field_5f6c8bc3515f7', $postid);
						// var_dump(get_userdata($author_id));
		?>
		<?php //Checks if user is Business or Organization
			$author_id = get_the_author_meta('ID');
			um_fetch_user(28);
			if( um_user('legal_identity') == "Επιχείρηση" )
			{
				$klados = um_user('legal_person_klados');
				$ergazomenoi = um_user('legal_person_num');
				$edra = um_user('legal_person_edra');
				$perigrafi = um_user('business_description');
			}
			else{
				$klados = um_user('org_klados');
				$ergazomenoi = um_user('org_emploees_num');
				$edra = um_user('legal_person_edra');
				$perigrafi = um_user('org_desc');
			}
				$display_name = um_user('user_login');
				um_reset_user();
		?>
		<?php	 //user's profile data 
					// $profile_id = um_profile_id();
					

					//$display_name = um_user('user_login');
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

					<h3> <?php echo the_title(); ?> </h3>
					<br>
					<p class="font-weight-bold"> Τύπος Ανάγκης: <?php echo $typos_anagkis; ?> </p>
					<br>
					<div class="different"><?php echo $per_anagkis; ?></div>



				</div>

				<div class="col-md-3">
					<?php echo do_shortcode('[favorite_button]');?>
					<hr class="horizontal-line">
					<br>

					<div>

						<?php if( is_user_logged_in() ): ?>
							<button type="button" class="btn btn-primary primary_btn" data-toggle="modal" data-target="#exampleModal">
								Εκδήλωση Ενδιαφέροντος
							</button>
						<?php endif; ?>

						<div id="exampleModal" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Φόρμα Εκδήλωσης Ενδιαφέροντος </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php $name= um_user('first_name').' '.um_user('last_name'); $cv= um_user('user_biography');   ?>
									<div class="modal-body">
										<form id="interest_form" method="post">	
											<div class="form-group">

												<label for="name"> Ονοματεπώνυμο </label>
												<input type="text" class="form-control" id="surname" aria-describedby="nameHelp" placeholder="Your name" name = "surname" 
													<?php if($name): ?>
													value="<?php echo $name; ?>"
													disabled
													<?php endif; ?>
													required
												> 

												<label for="email"> Διεύθυνση Email </label>
												<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Εισάγετε το email σας" name = "email" 
													<?php if($email): ?>
													value="<?php echo $email; ?>"
													disabled
													<?php endif; ?>
													required
												>

												<label for="phone_number"> Τηλέφωνο Επικοινωνίας </label>
												<input type="text" class="form-control" id="phone_number" aria-describedby="phoneHelp" placeholder="Εισάγετε ένα τηλέφωνο επικοινωνίας" name = "phone_number" required="true">

												<label for="bio"> Βιογραφικό </label>
												<textarea id="bio" class="form-control" rows="10" cols="50" name = "bio" <?php if($cv){ echo "disabled"; } ?> required ><?php if($cv){echo $cv;}?></textarea>

												<label for="description"> Πώς σκέφτεστε να καλύψετε τη συγκεκριμένη Ανάγκη </label>
												<textarea id="description" class="form-control" rows="5" cols="40" name = "description" required="true"></textarea>
												
												<?php 
													$timezone = new DateTimeZone( 'Europe/Athens' );
												?>
												<input type="hidden" id = "timestamp" value="<?php echo wp_date("d-m-Y H:i:s", null, $timezone ); ?>"> 
											</div>
											<button type="submit" class="btn btn-success mb-2" id="interest_submit"> Υποβολή Εκδήλωσης Ενδιαφέροντος </button>
										</form>
										<p id="p-ajax"> </p>
									</div>
									
								</div>
							</div>
						</div>


					
					</div>
					<div class="profinfo">
						<h6><?php echo pll__("Αριθμός εργαζομένων της επιχείρησης");?></h6>

						<div class="different"><?php echo $ergazomenoi;?></div>
					</div>



					<div class="different">
						<div class="profinfo">
							<h6><?php echo pll__("Κλάδος Επιχείρησης");?></h6>
							<div class="different">
								<div class="different"><?php echo $klados; ?>
									<!-- < echo $klados_epixeirisis['klados_2']; ?></div> -->
								</div>
							</div>

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
							if( $perigrafi): ?>
							<div class="profinfo">
								<h6><?php echo pll__("Περιγραφή Επιχείρησης");?></h6>
								<div class="different">

									<div class="different">

										<?php echo $perigrafi; ?></div>

								</div>
							</div>


							<?php endif; ?>

						</div>


						<div class="different">
							<?php			
							if( $edra ): ?>
							<div class="profinfo">
								<h6><?php echo pll__("Έδρα Επιχείρησης");?></h6>
								<div class="different">

									<div class="different"><?php echo $edra; ?>
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
												<h6 class="font-weight-bold mt-3" style="color:black;">
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
				</div>

				
				<section id="busineeds-section">
					<div class="container">
						<h3 class="heading-more"><?php echo pll__("Σχετικές Ανάγκες");?></h3>
						<div class="card-deck">

							<?php

								$args = array(
									// 'author' => $author,
									'numberposts' => 4,
									'exclude' 	  => get_the_ID() ,
									'post_type'   => 'businessneed'
								);
								
								$other_businessneeds = get_posts( $args );
					  
					  		?>

							<?php foreach($other_businessneeds as $other_businessneed){
								$other_businessneed_id = $other_businessneed->ID; //retrieve the id of card - card
								// var_dump($other_businessneed);
								$typos_anagkis = get_field( 'field_5f6c8a9c515f6',$other_businessneed_id); 
							?>
							<a href="<?php echo get_permalink($other_businessneed_id);?>">
								<div class="card">

									<?php echo get_the_content($other_businessneed);?>
									<div class="card-body">

										<h5 class="card-title-news"><?php echo $other_businessneed->post_title; ?></h5>
										<p style="color: black;font-weight: normal;text-align: left!important;">
											<?php  echo $typos_anagkis; ?></p>

										<div class="d-flex justify-content-end learn-more">
											<a href="<?php echo get_permalink($other_businessneed_id);?>"
												style="color: #3397FF;"></a>
										</div>

										<div class="card-footer">
											<small
												class="text-muted"><?php echo get_the_date('d-m-Y',  $other_businessneed_id); ?></small>
										</div>
									</div>
								</div>
								<?php }?>

							</a>

						</div>

					</div>
					<button onclick="window.location.href='https:/aegean-crowdsourcing/anagkes-epicheiriseon/';"
						type="button" class="primary_btn"><?php echo pll__("Περισσότερα");?></button>
			</div>

		</div>
		</section>
		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->

	</article><!-- #post-## -->
</div>
<script>
	jQuery(document).ready(function(){

		function Interest(name, email, phone_number, cv, description, timestamp){
			jQuery.ajax({
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				method: "post",
				type: 'HTML',
				data: {
					action: "showInterest_action",
					name: name,
					email: email,
					phone_number: phone_number,
					cv: cv,
					description: description, 
					timestamp: timestamp,
					id: "<?php echo get_the_id(); ?>"
				},
				beforeSend: function(xhr) {
					var div = '<div class="interest_loading"> <p> Επεξεργαζόμαστε το αιτημά σας </p> </div>';
					jQuery('#interest_submit').after(div);
				},
				success: function(data) {
					var div = '<div class="interest_success"> <p> Η φόρμα εκδήλωσης ενδιαφέροντος στάλθηκε επιτυχώς! </p> </div>';
					var form = jQuery('#interest_form');
					form[0].reset();
					
					// jQuery('#p-ajax').text('Η φόρμα εκδήλωσης ενδιαφέροντος στάλθηκε επιτυχώς');
					jQuery('.interest_loading').remove();
					jQuery('#interest_submit').after(div);
					jQuery('.interest_success').delay(2000).fadeOut();
					setTimeout(function(){ jQuery('#exampleModal').modal('hide'); }, 3000);
					
				},
				error: function(error) {
					//handle error
					console.log(error)
				}
			});
		}

		jQuery('#interest_form').on('submit', function(e){
			e.preventDefault();
			var name = jQuery('#surname').val();
			var email = jQuery('#email').val();
			var phone_number = jQuery('#phone_number').val();
			var cv = jQuery('#bio').val();
			var description = jQuery('#description').val();
			var timestamp = jQuery('#timestamp').val();
			
			Interest(name, email, phone_number, cv, description, timestamp);
		});

	});
</script>
<style>
	.interest_success{
		border: 1px green solid;
	}
	.interest_success p{
		font-weight: normal;
		color: #000000;
		text-align: center;
		justify-content: center;
		margin-top: revert;
	}

	.interest_loading{
		border: 1px orange solid;
	}
	.interest_loading p{
		font-weight: normal;
		color: #000000;
		text-align: center;
		justify-content: center;
		margin-top: revert;
	}
	
</style>