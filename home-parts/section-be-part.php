<?php if(pll_current_language() == 'el'){ ?>
<section id="be-part">
	<div class="container container-part">
		<h2><?php echo get_field('τιτλος_γίνε_μέρος_της_κοινότητας');?></h2>
		<div class="row">
			<div class="col-md-6">
				<img class="gray-support" src="<?php echo get_stylesheet_directory_uri(); ?>/img/support-grey.svg"
					alt="">
			</div>
			<div class="col-md-6">
				<p><?php echo get_field('κειμενο_γίνε_μέρος_της_κοινότητας');?> </p>

				<button onclick="window.location.href='https:/aegean-crowdsourcing/engrafi-2/';" type="button"
					class="primary_btn green"><?php echo pll__("Εγγραφή");?></button>
			</div>
		</div>
	</div>
</section>
<?php }else{ ?>
<section id="be-part">
	<div class="container container-part">
		<h2><?php echo get_field('title_be_part');?></h2>
		<div class="row">
			<div class="col-md-6">
				<img class="gray-support" src="<?php echo get_stylesheet_directory_uri(); ?>/img/support-grey.svg"
					alt="">
			</div>
			<div class="col-md-6">
				<p><?php echo get_field('text_be_part');?> </p>

				<button onclick="window.location.href='https:/aegean-crowdsourcing/engrafi-2/';" type="button"
					class="primary_btn green"><?php echo pll__("Sign Up");?></button>
			</div>
		</div>
	</div>
</section>
<?php }?>