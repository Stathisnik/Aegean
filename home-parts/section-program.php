<section id="program">
	<div class="container">
	<?php if(pll_current_language() == 'el'){ ?>
		<h2><?php echo get_field('τιτλος_προγραμματος');?></h2>
		<?php }else {?>
		<h2><?php echo get_field('title_program');?></h2>
		<?php } ?>
		<div class="row">
			<div class="col-md-6 d-flex flex-column justify-content-center">

				<?php if(pll_current_language() == 'el') {?>
				<p><?php echo get_field('κειμενο_προγραμματος');?><p>
						<div class="d-flex justify-content-end primary-link">
							<a href="<?php echo get_home_url();?>/schetika-me-to-programma/"
								style="color: #3397FF; margin-top: 20px; margin-bottom: 41px;"><?php echo pll__("Μάθε περισσότερα >");?></a>
						</div>
			</div>
			<div class="col-md-6">
				<img class="grey-idea" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon-1.svg" alt="">
			</div>
		</div>
		<?php }else {?>
			<p><?php echo get_field('text_program');?><p>
						<div class="d-flex justify-content-end primary-link">
						<a href="<?php echo get_home_url();?>/schetika-me-to-programma/"
								style="color: #3397FF; margin-top: 20px; margin-bottom: 41px;"><?php echo pll__("Learn more >");?></a>
						</div>
			</div>
			<div class="col-md-6">
				<img class="grey-idea" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon-1.svg" alt="">
			</div>
		</div>
		<?php } ?>

	</div>
</section>