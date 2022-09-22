<?php if (!defined('ABSPATH')) exit; ?>

<?php
$author_is_viewing = false;
if (is_user_logged_in()) {
	$author_is_viewing = um_profile_id() == get_current_user_id();
	$hasRequestedMentor = um_user('mentor_requested');
}
?>

<div class="wrapper">
	<section class="profile-account">

		<?php if (current_user_can('administrator') && $hasRequestedMentor) { ?>
			<div class="admin_mentor_request">

				<div class="align-items-center">
					<h2>Αίτημα χρήστη για προαγωγή σε μέντορας</h2>
				</div>
				<div class="row">
					<div class="col-8">
						<p>Ιδιότητα: <?php echo  get_user_meta(um_profile_id(), 'mentor_req_idiotita', true); ?></p>
						<p>LinkedIn: <?php echo get_user_meta(um_profile_id(), "mentor_req_linkedin", true); ?></p>
					</div>
					<div class="col-4">
						<p><button onclick="mentorRequest('accept')" class="btn btn-success c_primary_btn">Έγκριση</button></p>
						<p><button onclick="mentorRequest('reject')" class="btn btn-danger c_primary_btn">Απόρριψη</button></p>
					</div>
				</div>
			</div>

			<script>
				function mentorRequest(result) {
					jQuery.ajax({
						type: "POST",
						url: "<?php echo admin_url('admin-ajax.php'); ?>",
						data: {
							'action': 'admin_approve_mentor_user',
							'user_id': <?php echo um_profile_id(); ?>,
							'result': result
						},
						success: function(data) {
							if (data && data == "ok") {
								window.location.reload()
							} else {
								alert(data)
							}
						},
						error: function(err) {
							alert(err)
						}
					});
				}
			</script>
		<?php } ?>
		<div class="profile row flex-column align-items-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/persons-icon.png" alt="">
			<?php if ($author_is_viewing) { ?>
				<h2><?php echo pll__("Το προφίλ μου"); ?></h2>
			<?php } ?>
		</div>

		<div class="um <?php echo esc_attr($this->get_class($mode)); ?> um-<?php echo esc_attr($form_id); ?> um-role-<?php echo esc_attr(um_user('role')); ?> ">

			<div class="um-form" data-mode="<?php echo esc_attr($mode) ?>">

				<?php if (!UM()->user()->preview) { ?>

					<div class='col-md-4 col-sm-12 leftprofile'>

						<?php do_action('um_profile_header', $args); ?>
						<?php
						$profile_id = um_profile_id();
						$display_name = um_user('user_login');
						?>
						<div class="rolediv">
							<?php $userrole = UM()->roles()->get_role_name(um_user( 'role' )); ?>
							<?php $user_meta = get_userdata($profile_id); ?>
							<?php $user_roles=$user_meta->roles; ?>
							<h6><?php echo pll__("Ρόλος:"); ?></h6>
							<?php if( in_array('mentor', $user_roles) && !in_array('administrator', $user_roles) ): ?>
								<p class="font-weight-bold"><?php echo 'Μέντορας'; ?></p>
							<?php else: ?>
								<p class="font-weight-bold"><?php echo $userrole; ?></p>
							<?php endif; ?>
						</div>
						<div class="um-profile-navbar <?php echo esc_attr($classes); ?>">
							<?php do_action('um_profile_navbar', $args); ?>
							<div class="buttonrow d-flex flex-column">
								<a class="greybutton" href="<?php echo get_home_url(); ?>/ypovoli-ideas/"><?php echo pll__("Υποβολή Επιχειρ. Ιδέας"); ?></a>
								<!-- <a class="greybutton" href="< echo get_home_url(); ?>/ypovoli-drasis/">< echo pll__("Υποβολή Κοινωνικής Δράσης"); ?></a> -->
								<a class="greybutton" href="<?php echo get_home_url(); ?>/user/<?php echo $display_name; ?>/?um_action=edit"><?php echo pll__("Επεξεργασία Προφίλ"); ?></a>
								<!-- <a class="greybutton" href="<?php echo get_home_url(); ?>/αλλαγή-ρόλων"><?php echo pll__("Αλλαγή Ρόλου"); ?></a> -->
								<a class="greybutton" href="<?php echo get_home_url(); ?>/mentors"><?php echo pll__("Μέντορες"); ?></a>
								<?php echo do_shortcode('[popup_anything id="1550"]'); ?>
								<a class="greybutton" href="<?php echo get_home_url(); ?>/logout"><?php echo pll__("Αποσύνδεση"); ?></a>
								<a class="greybutton delete" href="<?php echo get_home_url(); ?>/user-account/delete"><?php echo pll__("Διαγραφή Λογαριασμού"); ?></a>
							</div>
						</div>

						<?php do_action('um_profile_menu', $args); ?>
					</div>
					<!--LeftProfileBar-->
					<?php
					if (um_is_on_edit_profile() || UM()->user()->preview) {
						$nav = 'main';
						$subnav = UM()->profile()->active_subnav();
						$subnav = !empty($subnav) ? $subnav : 'default';
					?>

						<div class="col-md-8 ml-3 col-sm-12 um-profile-body <?php echo esc_attr($nav . ' ' . $nav . '-' . $subnav); ?>">
							<?php if (um_is_on_edit_profile()) { ?>
								<form method="post" action="">
								<?php }	?>
								<?php do_action("um_profile_content_{$nav}", $args); //this is the update form 
								?>
								<div class="clear"></div>
								</form>

						</div>
						<?php } else {
						$menu_enabled = UM()->options()->get('profile_menu');
						$tabs = UM()->profile()->tabs_active();

						$nav = UM()->profile()->active_tab();
						$subnav = UM()->profile()->active_subnav();
						$subnav = !empty($subnav) ? $subnav : 'default';

						if ($menu_enabled || !empty($tabs[$nav]['hidden'])) { ?>
							<div class="col-md-8 ml-3 col-sm-12 um-profile-body <?php echo esc_attr($nav . ' ' . $nav . '-' . $subnav); ?>">

								<?php $profile_id = um_profile_id();
								$display_name = um_user('user_login');
								$is_legal = um_user('is_legal');
								$idiotita = um_user('idiotita');
								$email = um_user('user_email');
								$tmima = um_user('tmima');
								$etos = um_user('etos');
								$klados_endiaferodos = um_user('klados_endiaferodos');
								$nisi = um_user('nisi');
								$deksiotites = um_user('deksiotites');
								//user's data if user is a business
								$klados_epixeirisis = um_user('klados_business');
								$edra_epixeirisis = um_user('business_edra');
								$arithmos_ergazomenon = um_user('business_employees_num');
								$perigrafi_epixeirisis = um_user('business_description');
								$biografiko = um_user('user_biography');
								$is_business = um_user('is_business');
								$klados_epixeirisis_allo = um_user('klados_allo');
								//user's data from registration form
								$legal_identity = um_user('legal_identity');
								if ($legal_identity == 'Επιχείρηση') {
									$legal_person_klados = um_user('legal_person_klados');
									$legal_person_edra = um_user('legal_person_edra');
									$legal_person_num = um_user('legal_person_num');
									$legal_person_desc = um_user('legal_person_desc');
									$legal_person_islands = um_user('legal_person_islands_');
								} else if ($legal_identity == 'Οργανισμός') {
									$legal_person_klados = um_user('org_klados');
									$legal_person_edra = um_user('org_edra');
									$legal_person_num = um_user('org_emploees_num');
									$legal_person_desc = um_user('org_desc');
									$legal_person_islands = um_user('org_islands');
								}
								
								?>
								<div class="row" id="profile-row">
									<div class="col-md px-5">
										<div class="profinfo">
											<h6><?php echo pll__("Ιδιότητα"); ?></h6>
											<p><?php echo $idiotita; ?></p>
										</div>
										<div class="profinfo">
											<h6><?php echo pll__("Email"); ?></h6>
											<p><?php echo $email; ?></p>
										</div>
										<div class="profinfo">
											<h6><?php echo pll__("Πανεπιστήμιο / Τμήμα (για μέλη ομάδων, φοιτητές ή αποφοίτους)"); ?></h6>
											<p><?php echo $tmima; ?></p>
										</div>
										<div class="profinfo">
											<h6><?php echo pll__("Έτος ΑΕΙ (για μέλη ομάδων, προπτυχιακούς φοιτητές)"); ?></h6>
											<p><?php echo $etos; ?></p>
										</div>
										<!-- Show Business data if user is business -->
										<?php if ($legal_identity) { ?>
											<div class="profinfo">
												<h6> <?php echo pll__("Κλάδος Επιχείρησης"); ?></h6>
													<!-- Check if user has selected 'Άλλο - Προσδιορίστε' in 'Κλάδος Επιχείρησης' field and show the field accordingly -->
													<?php if( !empty($klados_epixeirisis_allo) ){ ?>
														<p><?php echo $klados_epixeirisis_allo; ?></p>
													<?php } ?>
												<p><?php echo $legal_person_klados; ?></p>
											</div>
											<div class="profinfo">
												<h6><?php echo pll__(" Έδρα Επιχείρησης"); ?></h6>
												<p><?php echo $legal_person_edra; ?></p>
											</div>
										<?php } ?>

										
									</div>
									<div class="col-md pl-5">
										<div class="profinfo">
											<h6><?php echo pll__("Κλάδος ενδιαφέροντος"); ?></h6>
											<p><?php echo $klados_endiaferodos; ?></p>
										</div>
										<div class="profinfo">
											<h6><?php echo pll__("Νησί δραστηριοποίησης (σε περίπτωση που δραστηριοποιείστε σε κάποιο νησί του Αιγαίου)"); ?></h6>
											<?php if($nisi): ?>
												<p><?php echo $nisi; ?></p>
											<?php endif; ?>
										</div>
										<div class="profinfo">
											<h6><?php echo pll__("Δεξιότητες"); ?></h6>
											<p><?php echo $deksiotites; ?></p>
										</div>

										<!-- Show Business data if user is business -->
										<?php if ($legal_identity) { ?>

											<div class="profinfo">
												<h6> <?php echo pll__("Αριθμός Εργαζομένων της Επιχείρησης"); ?> </h6>
												<p><?php echo $legal_person_num; ?></p>
											</div>

											<div class="profinfo">
												<h6> <?php echo pll__("Περιγραφή Επιχείρησης "); ?></h6>
												<p><?php echo $legal_person_desc; ?></p>
											</div>


										<?php } ?>
									   <?php if($is_legal == "Νομικό Πρόσωπο"): ?>
											<div class="profinfo">
												<h6> <?php echo pll__("Νομική Ιδιότητα"); ?></h6>
												<p><?php echo $legal_identity; ?></p>
											</div>
									   <?php endif; ?>
									</div>
								</div>
								<div class="row" id="bio-row">
									<div class="col-md-12 pl-5">
										<div class="profinfo">
											<h6><?php echo pll__("Σύντομο Βιογραφικό"); ?></h6>
											<p style="font-weight:normal;"><?php echo $biografiko; ?></p>
										</div>

										<div class="profinfo">
											<a href="<?php echo get_home_url(); ?>/user/<?php echo $display_name; ?>/?um_action=edit"><?php echo pll__("Επεξεργασία
													προφίλ >"); ?></a>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
					<?php }
					}

					do_action('um_profile_footer', $args); ?>
				<?php } ?>

			</div>
			<!--/um-form-->

		</div>
		<!--/um with mode-->
	</section>

	<section class="mt-5" id="ideas-profile">

		<div class="sectionheader d-flex justify-content-center align-items-baseline">
			<?php if ($author_is_viewing) { ?>
				<i class="fas fa-lightbulb mr-3"></i>
				<h2><?php echo pll__("Οι επιχειρηματικές μου ιδέες"); ?></h2>
			<?php } else { ?>
				<i class="fas fa-lightbulb mr-3"></i>
				<h2>Eπιχειρηματικές ιδέες</h2>
			<?php } ?>
		</div>
		<?php

		$args = array(
			'author' => $profile_id = um_profile_id(),
			'numberposts' => -1,
			'post_type'   => 'businessidea',
			'post_status' => array('publish')
		);
		if ($author_is_viewing) {
			$args['post_status'] = array('publish', 'pending', 'draft');
		}
		$businessideas = get_posts($args);


		if ($businessideas) {	?>

			<div class="row mt-5">
				<?php
				foreach ($businessideas as $businessidea) {
					$image = get_field('field_5f00afdb6b723', $businessidea->ID)['φωτογραφίες'] ? get_field('field_5f00afdb6b723', $businessidea->ID)['φωτογραφίες'] : get_stylesheet_directory_uri() . '/img/aegean_feature_img-idea.png';
				?>
					<div class="col-md-4 col-sm-6">
						<div class="card idea-card">
							<a href="<?php echo $businessidea->guid ?>">
								<div class="card-body">

									<div class="sec-ideas-img" style="background-image: url('<?php echo $image; ?>')">
									</div>


									<h5 class="card-title-news"><?php if ($businessidea->post_status == "draft") {
																								echo '<i>[Draft]</i> ';
																							} ?><?php echo $businessidea->post_title; ?></h5>

								</div>
								<div class="card-footer" style="padding: 1.25rem;">
									<small class="text-muted"><?php echo get_the_date('d/m/y', $businessidea->ID); ?></small>
								</div>
							</a>
						</div>
					</div>

				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="row p-5">
				<div class="col-md-6 d-flex justify-content-center">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-grey.png" alt="">
				</div>
				<div class="col-md-6 d-flex flex-column justify-content-acenter  align-items-start">
					<p class="font-weight-bold"><?php echo pll__("Δεν έχεις προσθέσει καμία ιδέα. Κάνε την αρχή!"); ?></p>
					<a class="greenbutton" href="<?php echo get_home_url(); ?>/ypovoli-ideas/"><?php echo pll__("Ανέβασε την ιδέα σου"); ?></a>
				</div>
			</div>
		<?php } ?>
</div>
</section>

<?php if ($author_is_viewing) { ?>
	<section class="mt-5" id="mybookmarks">
		<div class="d-flex flex-column  justify-content-start">
			<div class="sectionheader d-flex justify-content-center align-items-baseline">
				<i class="fas fa-bookmark mr-3"></i>
				<h2><?php echo pll__("Αποθηκευμένες επιχειρηματικές ιδέες"); ?></h2>


			</div>
			<!-- <div class="row justify-content-center mt-5"> -->

			<div class="row mt-5">
				<?php echo do_shortcode('[user_favorites]'); ?>
			</div>
		</div>
	</section>
<?php } ?>


<!-- Remove display:none for the section to appear -->
<section class="mt-5" style="display:none">
	<div class="sectionheader d-flex justify-content-center">
		<?php if ($author_is_viewing) { ?>
			<img class="action-icon-profile" src="<?php echo get_stylesheet_directory_uri(); ?>/img/action-icon.svg"></i>
			<h2><?php echo pll__("Οι δράσεις μου"); ?></h2>
		<?php } else { ?>
			<img class="action-icon-profile" src="<?php echo get_stylesheet_directory_uri(); ?>/img/action-icon.svg"></i>
			<h2>Δράσεις</h2>
		<?php } ?>
	</div>
	<?php

	$args = array(
		'author' => $profile_id = um_profile_id(),
		'numberposts' => -1,
		'post_type'   => 'action'
	);

	$actions = get_posts($args);
	if ($actions) {
	?>

		<div class="container mt-5">
			<div class="row">
				<?php
				foreach ($actions as $action) { ?>
					<div class="col-md-6 col-lg-4">
						<div class="card p-4">
							<img class="card-img-top mb-4" src="<?php echo get_stylesheet_directory_uri(); ?>/img/aegean_feature_img-idea.png" alt="">
							<div class="card-body">
								<p class="card-text"><a href="<?php echo $action->guid ?>"><?php echo $action->post_title; ?></a></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } else { ?>
		<div class="row p-5">
			<div class="col-md-6 d-flex justify-content-center">
				<img class="greyimg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/support-grey.png" alt="">
			</div>
			<div class="col-md-6 d-flex flex-column justify-content-center  align-items-start">
				<p class="font-weight-bold"><?php echo pll__("Δεν έχεις υποβάλει καμία δράση. Κάνε την αρχή!"); ?></p>
				<a class="bluebutton" href="<?php echo get_home_url(); ?>/ypovoli-drasis/"><?php echo pll__("Υποβολή Δράσεων"); ?></a>
			</div>
		</div>
	<?php } ?>


</section>
</div>
<!--/wrapper-->
<script>
	jQuery(document).ready(function() {
		//   // Handler for .ready() called.
		jQuery('.no-favorites').append('<div class="row justify-content-center w-100 p-5"><div class="col-md-6 d-flex justify-content-center"><img class="greyimg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-grey.png" alt=""></div><div class="col-md-6 d-flex flex-column justify-content-acenter  align-items-start"><p class="font-weight-bold"><?php echo pll__("Δεν έχεις αποθηκεύσει καμία ιδέα. Κάνε την αρχή!"); ?></p><a class="bluebutton" href="<?php echo get_home_url(); ?>/ιδεες/"><?php echo pll__("Επιχειρηματικές Ιδέες"); ?></a></div></div>');
	});
</script>