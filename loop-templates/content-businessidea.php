<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (isset($_GET['do']) && $_GET['do'] == 'edit') {
	// Show the form
	require(get_theme_file_path('/parts/edit-idea.php'));
	return;
}
?>
<div class="container">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">
			<!-- <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?> -->
			<?php if ('post' == get_post_type()) { ?>
				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div>
			<?php } ?>
		</header>
		<br>
		<?php
		$postid = get_the_ID();
		$perigrafi_tis_ideas = get_field('field_5ef9add15ce6c', $postid);
		$titlos_epixirimatikis_ideas = get_field('field_5ef9a8fe847ec', $postid);
		$epipleon_melh = get_field('field_5ef9aad213336', $postid);
		$typos_proiontos_sistimatos = get_field('field_5ef9b1ac48d79', $postid);
		$aniki_se_diagonismo = get_field('field_5ef9acb911334', $postid);
		$klados_ = get_field('field_5ef9af8b9153e', $postid);
		$anagkes = get_field('field_5efca059282eb', $postid);
		$typos_anagkhs = get_field('field_5eff14ac4e2c4', $postid);
		$sustainable_development_goals = get_field('field_5f16a62b8aa04', $postid);
		$goals = get_field('field_5f1936b0d46d8', $postid);
		$stadio = get_field('field_5ef9b2bd0c190', $postid);
		$eikona_video = get_field('field_5f00afdb6b723', $postid);
		$adapodotika_ofeli = get_field('field_5efca18309955', $postid);
		$mentores = get_field('field_5fb28b33e10b6', $postid);
		$author = get_the_author_meta('ID');
		$texnologies = get_field('field_601bfcbb4d7f6', $postid);


        //business plan
		$sinoptika_stoixeia = get_field('συνοπτικά_στοιχεία_του_επιχειρηματικού_σχεδίου', $postid);
		$analisi_agoras = get_field('ανάλυση_αγοράς', $postid);
		$analisi_tis_epixeirhshs = get_field('analisi_tis_epixeirisis', $postid);
		$prosdiorismos_stoxon = get_field('προσδιορισμός_στόχων', $postid);
		$proioda_ypiresies = get_field('προϊόντα_και_υπηρεσίες', $postid);
		$stratigiki_marketing = get_field('στρατηγική_marketing', $postid);
		$stratigiki_pwlhsewn = get_field('στρατηγική_πωλήσεων', $postid);
		$stratigiki_paragwghs = get_field('στρατηγική_παραγωγής_και_ανάπτυξης', $postid);
		$stratigiki_dynamikou = get_field('στρατηγική_ανθρώπινου_δυναμικού_και_οργάνωσης', $postid);
        $oikonomika_stoixeia = get_field_object('oikonomika_stoixeia', $postid);
		$plano_drasis = get_field('πλάνο_δράσης', $postid);
		$parartimata = get_field('παραρτήματα', $postid);
		$eikona_analisi_apixeirhshs = get_field('εικόνα_για_ανάλυση_της_επιχείρησης', $postid);
		$eikona_stratigiki_marketing = get_field('eikona_stratigiki_marketing', $postid);
		$eikona_stoixeia_epix_sxediou = get_field('εικόνα_για_τα_στοιχεία_του_επιχειρηματικού_σχεδίου', $postid);
		$eikona_perigrafi_etaireias = get_field('εικόνα_για_την_περιγραφή_της_εταιρείας', $postid);
		$eikona_proionta_ypiresies = get_field('εικόνα_για_προϊόντα_και_υπηρεσίες', $postid);
		$eikona_analisi_antagonismou = get_field('εικόνα_για_την_ανάλυση_ανταγωνισμού', $postid);
		$eikona_stratigiki_poliseon = get_field('εικόνα_για_την_στρατηγική_πωλήσεων', $postid);
		$eikona_stratigiki_paragogis_anaptixis = get_field('εικόνα_για_την_στρατηγική_παραγωγής_και_ανάπτυξης', $postid);
		$eikona_dynamikoy_organosis = get_field('εικόνα_για_την_στρατηγική_ανθρώπινου_δυναμικού_και_οργάνωσης', $postid);
		$eikona_plano_drashs = get_field('εικόνα_για_το_πλάνο_δράσης', $postid);
		$eikona_parartimata = get_field('εικόνα_για_τα_παραρτήματα', $postid);

		
		?>

		<!-- <div class="container"> -->
		<div class="row">
			<div class="col-md-9">
				<div class="different">
					<h2 class="font-weight-bold mt-3">
						<?php the_field('field_5ef9a8fe847ec', $postid); ?>
					</h2>
				</div>
				<br>
				
					<?php if ($eikona_video) { ?>
						
							
								<img class="content-img" src="<?php echo $eikona_video['φωτογραφίες']; ?>">

						
					<?php } ?>
				
				<br>
				<h6 class="small_title"><?php echo pll__("Περιγραφή"); ?></h6>
				<div class="different-inner">
					<?php echo $perigrafi_tis_ideas; ?>
				</div>
				<div class="different-video">
                <?php if ($eikona_video) { ?>
                        <ul class="different">
                                <div class="different"><?php echo $eikona_video['link_απο_youtube']; ?>
                                </div>
                        </ul>
                    <?php } ?>
                </div>
				<p>
				<h3 class="small_title targets"><?php echo pll__("Στόχοι βιώσιμης ανάπτυξης"); ?></h3>
				</p>		
				<br>
				<?php
				//$icons = get_field('field_5f16a62b8aa04');
				//echo $icons["buttons_row"].'<br/>'; 
				$targets_group = get_field('field_5f16a62b8aa04');
				// var_dump($targets_group);
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

				if ($synergasia_gia_stoxous) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-1.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__("1. Συνεργασία για στόχους"); ?></p>
					</div>
					<p><?php echo $synergasia_gia_stoxous; ?></p>
				<?php }
				if ($exaleipsi_peinas) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-2.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__("2. Εξάλειψη Πείνας"); ?></p>
					</div>
					<p><?php echo $exaleipsi_peinas; ?></p>
				<?php }
				if ($kali_ygeia) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-3.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("3. Καλή υγεία"); ?> </p>
					</div>
					<p><?php echo $kali_ygeia; ?></p>
				<?php }
				if ($poiotiki_ekpedefsi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-4.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 4. Ποιοτική εκπαίδευση "); ?></p>
					</div>
					<p><?php echo $poiotiki_ekpedefsi; ?></p>
				<?php }
				if ($isotita_filon) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-5.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 5. Ισότητα των φύλων "); ?></p>
					</div>
					<p><?php echo $isotita_filon; ?></p>
				<?php }
				if ($nero_apoxetefsi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-6.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("6. Καθαρό νερό και αποχέτευση "); ?></p>
					</div>
					<p><?php echo $nero_apoxetefsi; ?></p>
				<?php }
				if ($ananeosimi_energeia) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-7.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("7. Ανανεώσιμη ενέργεια "); ?></p>
					</div>
					<p><?php echo $ananeosimi_energeia; ?></p>
				<?php }
				if ($theseis_ergasias_oik_anaptixi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-8.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 8. Καλές θέσεις εργασίας και οικονομική ανάπτυξη "); ?></p>
					</div>
					<p><?php echo $theseis_ergasias_oik_anaptixi; ?></p>
				<?php }
				if ($kainotomia_ypodomes) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-9.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("9. Καινοτομία και υποδομές "); ?></p>
					</div>
					<p><?php echo $kainotomia_ypodomes; ?></p>
				<?php }
				if ($miosi_anisotiton) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-10.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("10. Μείωση των ανισοτήτων"); ?> </p>
					</div>
					<p><?php echo $miosi_anisotiton; ?></p>
				<?php }
				if ($aeiforeis_poleis) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-11.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 11. Αειφόρες πόλεις και κοινότητες"); ?> </p>
					</div>
					<p><?php echo $aeiforeis_poleis; ?></p>
				<?php }
				if ($ipefthini_katanalosi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-12.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("12. Υπεύθυνη κατανάλωση"); ?> </p>
					</div>
					<p><?php echo $ipefthini_katanalosi; ?></p>
				<?php }
				if ($draseis_gia_klima) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-13.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("13. Δράσεις για το κλίμα "); ?></p>
					</div>
					<p><?php echo $draseis_gia_klima; ?></p>
				<?php }
				if ($ypothallasia_zoi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-14.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("14. Υποθαλάσσια ζωή"); ?> </p>
					</div>
					<p><?php echo $ypothallasia_zoi; ?></p>
				<?php }
				if ($xersea_zoi) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-15.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("15. Χερσαία ζωή "); ?></p>
					</div>
					<p><?php echo $xersea_zoi; ?></p>
				<?php }
				if ($eirini_dikaiosini) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-16.png" alt="">
						<p class="font-weight-bold m-2"> <?php echo pll__("16. Ειρήνη και δικαιοσύνη "); ?></p>
					</div>
					<p><?php echo $eirini_dikaiosini; ?></p>
				<?php }
				if ($sinergasies_gia_stoxous) { ?>
					<div class="d-flex my-4">
						<img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-17.png" alt="">
						<p class="font-weight-bold m-2"><?php echo pll__(" 17. Συνεργασίες για στόχους"); ?> </p>
					</div>
					<p><?php echo $sinergasies_gia_stoxous; ?></p>
				<?php } ?>
			</div>

			<div class="col-md-3">
				<?php echo do_shortcode('[favorite_button]'); ?>
				<hr class="horizontal-line">
				<?php
				$current_user = wp_get_current_user();
				if (is_user_logged_in() && $current_user->ID == $post->post_author) { ?>
					<button onclick="handleEditIdea()" class="primary_btn full_width sm_margin"><?php echo pll__("Επεξεργασία Ιδέας"); ?></button>
				<?php }
				?>
				<br>
				<script>
					function handleEditIdea() {
						let url = new URL('<?php echo get_permalink(); ?>');
						url.searchParams.set('do', 'edit');

						window.location.href = url;
					}
				</script>
				<div class="different">    <!-- Hide plan button -->
					<div class="text-center">
						<?php
						$current_user = wp_get_current_user();
						$roloi_xristi = um_user('roles');
						$current_stage  = get_field('field_60c0c1b9a9cbd',$post_id);
						$business_plan_stages = array('2.1 στάδιο - Ανάθεση  μεντόρων','2.2 στάδιο - Υποβολή business plans','2.3 στάδιο - Αξιολόγηση');

						if ( (is_user_logged_in() && $current_user->ID == $post->post_author && in_array($current_stage,$business_plan_stages) )
						|| $roloi_xristi[0] == "administrator")  { ?>
						
						<button
							onclick="window.location.href='https:/aegean-crowdsourcing/epicheirimatiko-plano/?id=<?php echo $postid;  ?>'"
							class="primary_btn full_width sm_margin"><?php echo pll__("Υποβολή Επιχειρηματικού Πλάνου"); ?></button>
						<?php } ?>
					</div>
				</div>
					<div class="different">
						<div class="text-center">
							<?php 
							$current_judges = get_field('field_6089522293e90', $postid);
							$flag = false;
							$judge_evaluation = array();
							$has_evaluated = false;
							?>
							<?php
							if(!empty($current_judges)){
								foreach($current_judges as $judge){ 
									if( $judge['ID'] == get_current_user_id() ){
										$flag = true;
									}
								}
							}

							if( have_rows('field_608a82860f21b', $postid )){
								while( have_rows('field_608a82860f21b', $postid ) ){
									the_row();
									$judge_username = get_sub_field('field_608aaab6c90e0',$postid);
									$user = get_user_by( 'login', $judge_username );
									$user = $user->ID;
									array_push($judge_evaluation, $user);
								}
							}

						if( in_array( get_current_user_id(), $judge_evaluation ) ){
							$has_evaluated = true;
						}
						?>	<!-- current_user_can( 'administrator') || $flag && !$has_evaluated -->
						<?php if(false): ?>
						<div>
							<button type="button" class="btn btn-primary primary_btn" data-toggle="collapse"
								data-target="#evaluationModal" aria-expanded="false" aria-controls="collapseExample">
								Αξιολόγηση Ιδέας
							</button>

							<div id="evaluationModal" class="collapse" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="text-center"> <?php echo pll__('Φόρμα Αξιολόγησης Ιδέας'); ?> </h5>
										</div>
										<p class="text-center text-muted"> <?php echo pll__('H φόρμα είναι τελική, μετά την υποβολή, δεν
											μπορείτε να την επεξεργαστείτε'); ?> </p>
										<div class="modal-body">
											<form id="evaluation_form" method="post">
												<div class="form-group">
													<p class="font-weight-bold"> 1.Πρωτοτυπία </p>

													<label for="originality-score"> Βαθμολογία </label>
													<input type="number" id="originality-score" class="form-control"
														aria-describedby="originality-score" min="1" max="5" required>
												</div>

												<div class="form-group">
													<p class="font-weight-bold"> 2.Εφικτότητα </p>

													<label for="feasibility-score"> Βαθμολογία </label>
													<input type="number" id="feasibility-score" class="form-control"
														aria-describedby="feasibility-score" min="1" max="5" required>
												</div>

												<div class="form-group">
													<p class="font-weight-bold"> 3.Πληρότητα </p>

													<label for="completeness-score"> Βαθμολογία </label>
													<input type="number" id="completeness-score" class="form-control"
														aria-describedby="completeness-score" min="1" max="5" required>
												</div>

												<div class="form-group">
													<p class="font-weight-bold"> 4.Εξωστρέφεια </p>

													<label for="extroversion-score"> Βαθμολογία </label>
													<input type="number" id="extroversion-score" class="form-control"
														aria-describedby="extroversion-score" min="1" max="5" required>
												</div>

												<div class="form-group">
													<p class="font-weight-bold"> 5.Προαγωγή Αιγαίου </p>

													<label for="promotion-score"> Βαθμολογία </label>
													<input type="number" id="promotion-score" class="form-control"
														aria-describedby="promotion-score" min="1" max="5" required>
												</div>

												<div class="form-group">
													<p class="font-weight-bold"> Σχόλια </p>
													<textarea id="idea-notes" class="form-control" rows="5" cols="40"
														name="idea-notes" required="true"></textarea>
												</div>

												<button type="submit" class="btn btn-success mb-2"
													id="evaluation_form_submit"> Υποβολή Αξιολόγησης </button>
											</form>
											<p id="p-ajax"> </p>
										</div>

									</div>
								</div>
							</div>

						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="different">
					<?php if ($epipleon_melh) { ?>
						<div class="profinfo">
							<h6><?php echo pll__("Μέλη"); ?></h6>
							<div class="different">
								<div class="different">
									<?php echo $epipleon_melh['πόσα_μέλη_έχει_η_ομαδα_σας']; ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="different profinfo">
				<h6><?php echo pll__("Τεχνολογίες"); ?></h6>
				<?php if($texnologies['technologies'] && sizeOf($texnologies['technologies']) > 0){ 
								foreach($texnologies['technologies'] as $texnologia){ ?>
									<div class="different"><?php echo pll__($texnologia); ?></div>
					<?php }
					} ?>
				</div>

				<div class="different">
					<?php if ($typos_proiontos_sistimatos) { ?>
						<div class="profinfo">
							<h6><?php echo pll__("Τύπος Προϊόντος - Συστήματος"); ?></h6>								
							<?php if($typos_proiontos_sistimatos['choices'] && sizeOf($typos_proiontos_sistimatos['choices']) > 0){ 
								foreach($typos_proiontos_sistimatos['choices'] as $kiria_drastiriotita){ ?>
									<div class="different"><?php echo pll__($kiria_drastiriotita); ?></div>
							<?php }
							} ?>
							<?php if($typos_proiontos_sistimatos['choices_2']){ ?>
								<div class="different"><?php echo pll__($typos_proiontos_sistimatos['choices_2']); ?></div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>

				<div class="profinfo">
					<h6><?php echo pll__("Κλάδος"); ?></h6>
					<?php if($klados_["epiloges_1"] && sizeOf($klados_["epiloges_1"]) > 0){ 
						foreach($klados_['epiloges_1'] as $klados){?>
							<div class="different"><?php echo pll__($klados); ?></div>				
					<?php }
					} ?>



					<?php if(isset($klados_["epiloges_2"]) && $klados_["epiloges_2"] != ""){?>
						<div class="different"><?php echo pll__($klados_["epiloges_2"]); ?></div>

					<?php } ?>

				</div>


				<div class="different">
					<?php if ($aniki_se_diagonismo) { ?>
						<div class="profinfo">
							<h6><?php echo pll__("Ανήκει σε διαγωνισμό"); ?></h6>
							<div class="different">
								<div class="different">
									<?php if (isset($aniki_se_diagonismo['select2']->post_title)) { ?>
										<?php echo $aniki_se_diagonismo['select2']->post_title; ?>
									<?php } else { ?>
										Όχι
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="profinfo">
					<?php if(!empty($stadio)): ?>
						<h6><?php echo pll__("Στάδιο"); ?></h6>
						<div class="different"><?php echo $stadio; ?></div>
					<?php endif; ?>
				</div>

				<div class="different">
					<?php if ($mentores) { ?>
						<div class="profinfo">
							<h6><?php echo pll__(" Μέντορες "); ?></h6>
							<div class="different">
								<?php foreach ($mentores as $mentoras) { ?>
									<h6 class="font-weight-bold text-left mt-3" style="color:black;">
										<?php echo $mentoras['nickname']; ?>
									</h6>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="different">
					<?php if (count($anagkes) != 1 &&  !in_array("- Καμία επιλογή -", array_merge(...$anagkes), true)  ) { ?>
						<div class="profinfo">
							<h6><?php echo pll__("Tύπος Ανάγκης"); ?></h6>
							<div class="different">
								<?php foreach ($anagkes as $anagki) { ?>
									<?php if($anagki['τυπος_αναγκης_'] != '- Καμία επιλογή -'){ ?>
										<div class="different card" style="padding:10px;">
											<h6 class="font-weight-bold text-left mt-3" style="color:black;">
												<?php echo $anagki['τυπος_αναγκης_']; ?>
											</h6>
											<?php $othertext = $anagki['other_text']; ?>
											<?php echo $othertext; ?>
											<p id="need-description" style="font-weight: normal;"> <?php echo $anagki['ανταποδοτικά_οφέλη']; ?> </p>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<hr class="horizontal-line">
				<div class="social-share"><?php echo pll__("Κοινοποίηση"); ?></div>
				<div class="addthis_inline_share_toolbox_4iwa"></div>

			</div>
		</div>

		<?php
		$current_user = wp_get_current_user();
		$roloi_xristi = um_user('roles');
		if (is_user_logged_in() && $current_user->ID == $post->post_author || $roloi_xristi[0] == "administrator" || $roloi_xristi[0] == "mentor" || $roloi_xristi[0] == "judge") { ?>
		<section id="bus-plan">
			<h2>Επιχειρηματικό Πλάνο</h2>



			<div class="plan-title plan-1"> Συνοπτικά Στοιχεία του Επιχειρηματικού Σχεδίου
			</div>
			<?php echo $sinoptika_stoixeia; ?>
			<div class="plan-title plan-2">                                                                <!-- 1. -->
			Εικόνα για τα Στοιχεία του Επιχειρηματικού Σχεδίου
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_stoixeia_epix_sxediou; ?>">



			<div class="plan-title plan-3">
			Γενική Περιγραφή της Εταιρείας
			</div>
			<?php echo $analisi_tis_epixeirhshs; ?>                                                 <!-- 2. -->
			<div class="plan-title plan-4">                                                                
			Εικόνα για την Περιγραφή της Εταιρείας
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_perigrafi_etaireias; ?>">



			<div class="plan-title plan-5"> Ανάγκη και Αγορά.
			</div>
			<?php echo $analisi_agoras; ?>
			<div class="plan-title plan-6">
			Εικόνα για ανάλυση της επιχείρησης και της επιχειρηματικής ιδέας                     <!-- 3. -->
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_analisi_apixeirhshs; ?>">



			<div class="plan-title plan-7">
			Προϊόντα και Υπηρεσίες
			</div>
			<?php echo $proioda_ypiresies; ?>
			<div class="plan-title plan-8">
			Εικόνα για Προϊόντα και Υπηρεσίες                                                     <!-- 4. -->
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_proionta_ypiresies; ?>">
			

			

			<div class="plan-title plan-9">
			Ανάλυση Ανταγωνισμού                                                                  <!-- 5. -->
			</div>
			<?php echo $prosdiorismos_stoxon; ?>
			<div class="plan-title plan-10">
			Εικόνα για την Ανάλυση Ανταγωνισμού                                                    
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_analisi_antagonismou; ?>">



			<div class="plan-title plan-11">
			Στρατηγική πωλήσεων
			</div>
			<?php echo $stratigiki_pwlhsewn; ?>
			<div class="plan-title plan-12"> 
			Εικόνα για την Στρατηγική πωλήσεων                                                    <!-- 6. -->                                           
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_stratigiki_poliseon; ?>">





			<div class="plan-title plan-13">
			Στρατηγική Μάρκετινγκ
			</div>
			<?php echo $stratigiki_marketing; ?>
			<div class="plan-title plan-14">                                                              <!-- 7. -->   
			Εικόνα για την Στρατηγική Marketing
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_stratigiki_marketing; ?>">




			<div class="plan-title plan-15">
			Στρατηγική παραγωγής και ανάπτυξης
			</div>
			<?php echo $stratigiki_paragwghs; ?>                                                  <!-- 8. --> 
            <div class="plan-title plan-16">                                                               
			Εικόνα για την Στρατηγική παραγωγής και ανάπτυξης
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_stratigiki_paragogis_anaptixis; ?>">




			<div class="plan-title plan-17">
			Στρατηγική ανθρώπινου δυναμικού και οργάνωσης
			</div>
			<?php echo $stratigiki_dynamikou; ?>
			<div class="plan-title plan-18">                                                               
			Εικόνα για την Στρατηγική ανθρώπινου δυναμικού και οργάνωσης                          <!-- 9. --> 
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_dynamikoy_organosis; ?>">
             <br>



			<div class="plan-title plan-19">
			Οικονομικά Στοιχεία
			</div>
			<br>
			<?php
				if(!empty($oikonomika_stoixeia["sub_fields"])):
				$i = 0;
				foreach($oikonomika_stoixeia["sub_fields"] as $value){ 
					// var_dump_pre($value["name"]);
					?>
			<p> <strong> <?php echo $value["label"]; ?> </strong> </p>                               <!-- 10. -->           

			<p> 1ο Έτος: <?php echo $oikonomika_stoixeia['value'][$value["name"]][0]['1ο_έτος'] ; ?>
				<span>| 2ο Έτος: <?php echo $oikonomika_stoixeia['value'][$value["name"]][0]['2ο_έτος'] ; ?> </span>
				<span>| 3ο Έτος: <?php echo $oikonomika_stoixeia['value'][$value["name"]][0]['3ο_έτος'] ; ?> </span>
				<span>| 4ο Έτος: <?php echo $oikonomika_stoixeia['value'][$value["name"]][0]['4ο_έτος'] ; ?> </span>
				<span>| 5ο Έτος: <?php echo $oikonomika_stoixeia['value'][$value["name"]][0]['5ο_έτος'] ; ?> </span>

			</p>
			<?php }
			endif;
			?>

			<div class="plan-title plan-20">
				Πλάνο Δράσης
			</div>
			<?php echo $plano_drasis; ?>                                                           <!-- 11. --> 
			<div class="plan-title plan-21">                                                               
			Εικόνα για το Πλάνο Δράσης                        
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_plano_drashs; ?>">





			<div class="plan-title plan-22">
			Παραρτήματα
			</div>
			<?php echo $parartimata; ?>                                                             <!-- 12. --> 
			<div class="plan-title plan-23">                                                               
			Εικόνα για τα Παραρτήματα                       
			</div>
			<br>
			<img class="logo-plan" src="<?php echo $eikona_parartimata; ?>">




		</section>

		<?php } ?>



		<div class="row">
			<div class="col-md-9">
				<?php display_idea_comments(); ?>
			</div>
		</div>
</div>

<section id="busideas-section">
	<div class="container">
		<h3 class="heading-more"><?php echo pll__("Σχετικές Ιδέες"); ?></h3>
		<div class="card-deck">
			<?php
			$args = array(
				// 'author' => $author,
				'post_type' => 'businessidea',
				'numberposts' => 4,
				'lang' => 'el'
			);
			$other_ideas = get_posts($args);
			?>
			<?php foreach ($other_ideas as $other_idea) {
				$other_idea_id = $other_idea->ID; //retrieve the id of card - idea
				$other_idea_img = get_field('field_5f00afdb6b723', $other_idea_id);
				$eikona_video = get_field('field_5f00afdb6b723', $postid); //retrieve the image of the card by giving the right id ($other_idea_id)
			?>
				<div class="card idea-card">
					<a href="<?php echo get_permalink($other_idea_id); ?>">
						<div class="card-body">
							<?php if ($other_idea_img['φωτογραφίες'] != "") { ?>
								<div class="sec-ideas-img" style="background-image: url('<?php echo $other_idea_img['φωτογραφίες']; ?>')">
								</div>
							<?php } else { ?>
								<div class="sec-ideas-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/aegean_feature_img-idea.png'; ?>')">
								</div>

							<?php } ?>

							<h5 class="card-title-news"><?php echo get_the_title($other_idea); ?></h5>

						</div>
						<div class="card-footer" style="padding: 1.25rem;">
							<small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
	<button onclick="window.location.href='https:/aegean-crowdsourcing/idees/';" type="button" class="primary_btn"><?php echo pll__("Περισσότερα"); ?></button>
	
	<?php if (empty($synergasia_gia_stoxous or $exaleipsi_peinas or $kali_ygeia or $poiotiki_ekpedefsi or $isotita_filon 
	or $nero_apoxetefsi or $ananeosimi_energeia or $theseis_ergasias_oik_anaptixi or $kainotomia_ypodomes or $miosi_anisotiton
	or $aeiforeis_poleis or $ipefthini_katanalosi or $draseis_gia_klima or $ypothallasia_zoi or $xersea_zoi 
	or $eirini_dikaiosini or  $sinergasies_gia_stoxous)){ ?>
	<style>
		.small_title.targets {
			display: none;
		}
	</style>
	<?php } ?>

	<?php if (empty($sinoptika_stoixeia)){ ?>
	<style>
		.plan-title.plan-1{
			display: none!important;
		}
	</style>

<?php } ?>
<?php if (empty($eikona_stoixeia_epix_sxediou)){ ?>
	<style>
		.plan-title.plan-2{
			display: none!important;
		}
	</style>

<?php } ?>

<?php if (empty($analisi_tis_epixeirhshs)){ ?>
<style>
	.plan-title.plan-3{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_perigrafi_etaireias)){ ?>
<style>
	.plan-title.plan-4{
		display: none!important;
	}
</style>


<?php } ?>

<?php if (empty($analisi_agoras)){ ?>
<style>
	.plan-title.plan-5{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_analisi_apixeirhshs)){ ?>
<style>
	.plan-title.plan-6{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($proioda_ypiresies)){ ?>
<style>
	.plan-title.plan-7{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_proionta_ypiresies)){ ?>
<style>
	.plan-title.plan-8{
		display: none!important;
	}
</style>


<?php } ?>

<?php if (empty($prosdiorismos_stoxon)){ ?>
<style>
	.plan-title.plan-9{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_analisi_antagonismou)){ ?>
<style>
	.plan-title.plan-10{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($stratigiki_pwlhsewn)){ ?>
<style>
	.plan-title.plan-11{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_stratigiki_poliseon)){ ?>
<style>
	.plan-title.plan-12{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($stratigiki_marketing)){ ?>
<style>
	.plan-title.plan-13{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_stratigiki_marketing)){ ?>
<style>
	.plan-title.plan-14{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($stratigiki_paragwghs)){ ?>
<style>
	.plan-title.plan-15{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_stratigiki_paragogis_anaptixis)){ ?>
<style>
	.plan-title.plan-16{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($stratigiki_dynamikou)){ ?>
<style>
	.plan-title.plan-17{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_dynamikoy_organosis)){ ?>
<style>
	.plan-title.plan-18{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($oikonomika_stoixeia)){ ?>
<style>
	.plan-title.plan-19{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($plano_drasis)){ ?>
<style>
	.plan-title.plan-20{
		display: none!important;
	}
</style>

<?php } ?>

<?php if (empty($eikona_plano_drashs)){ ?>
<style>
	.plan-title.plan-21{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($parartimata)){ ?>
<style>
	.plan-title.plan-22{
		display: none!important;
	}
</style>

<?php } ?>
<?php if (empty($eikona_parartimata)){ ?>
<style>
	.plan-title.plan-23{
		display: none!important;
	}
</style>


	<?php } ?>
	
</section>
<!-- <footer class="entry-footer">
			<?php understrap_entry_footer(); ?>
		</footer> -->
</article>
</div>
<script>

jQuery(document).ready(function () {
	function sendEvaluation(originality, feasibility, completeness, extroversion, promotion, idea_notes) {
		jQuery.ajax({
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			method: "post",
			type: 'HTML',
			data: {
				action: "sendEvaluation_action",
				originality: originality,
				feasibility: feasibility,
				completeness: completeness,
				extroversion: extroversion,
				promotion: promotion,
				idea_notes: idea_notes,
				id: "<?php echo get_the_ID(); ?>",
				judge_id: "<?php echo get_current_user_id(); ?>"
			},
			beforeSend: function (xhr) {
				var div =
					'<div class="evaluation_loading"> <p> Επεξεργαζόμαστε το αιτημά σας </p> </div>';
				jQuery('#evaluation_form_submit').after(div);
			},
			success: function (data) {
				var div =
					'<div class="evaluation_success"> <p> Η Αξιολόγηση στάλθηκε επιτυχώς! </p> </div>';
				var form = jQuery('#evaluation_form');
				form[0].reset();

				// jQuery('#p-ajax').text('Η φόρμα εκδήλωσης ενδιαφέροντος στάλθηκε επιτυχώς');
				jQuery('.evaluation_loading').remove();
				jQuery('#evaluation_form_submit').after(div);
				jQuery('.interest_success').delay(2000).fadeOut();
				setTimeout(function () {
					jQuery('#evaluationModal').collapse('hide');
				}, 3000);
				console.log(data);
			},
			error: function (error) {
				//handle error
				console.log(error)
			}
		});
	}


	jQuery('#evaluation_form').on('submit', function (e) {
		e.preventDefault();
		var originality = jQuery('#originality-score').val();
		var feasibility = jQuery('#feasibility-score').val();
		var completeness = jQuery('#completeness-score').val();
		var extroversion = jQuery('#extroversion-score').val();
		var promotion = jQuery('#promotion-score').val();
		var idea_notes = jQuery('#idea-notes').val();
		console.log(idea_notes);

		sendEvaluation(originality, feasibility, completeness, extroversion, promotion, idea_notes);
	});

});

</script>