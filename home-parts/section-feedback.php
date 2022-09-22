<?php if(pll_current_language() == 'el'){ ?>
<section id="feedback">
	<div class="container container-part">
		<h2><?php echo get_field('field_6048c21f7e627');?></h2>
		<div class="row">
			<div class="col-md-6">
				<p><?php echo get_field('field_6048c2647e628');?> </p>

				<a href="https://docs.google.com/forms/d/e/1FAIpQLSehwCJ395eGJykxDXE7ocz-SFWwHfIBbV85y7Aey-7jQFo5zg/viewform" target="_blank" class="primary_btn green" style="width: fit-content;color: white;text-decoration: none;"><?php echo pll__("Συμπλήρωσε την φόρμα"); ?>
				</a>
			</div>
			<div class="col-md-6">
				<img class="gray-support" src="<?php echo get_stylesheet_directory_uri(); ?>/img/form (1).svg"
					alt="">
			</div>
		</div>
	</div>
</section>
<?php }else{ ?>
<section id="feedback">
	<div class="container container-part">
		<h2><?php echo get_field('field_6048c1afd1c56');?></h2>
		<div class="row">
			<div class="col-md-6">
				<p><?php echo get_field('field_6048c1dcd1c57');?> </p>

				<a href="https://docs.google.com/forms/d/e/1FAIpQLSfLsbDGIFgh-eRFgGnR8Vfpc_8w5GDtAF0qfb_XBuXGZ0TU6g/viewform" target="_blank" class="primary_btn green" style="width: fit-content;color: white;text-decoration: none;"><?php echo pll__("Fill in the form"); ?>
				</a>
			</div>
			<div class="col-md-6">
				<img class="gray-support" src="<?php echo get_stylesheet_directory_uri(); ?>/img/form (1).svg"
					alt="">
			</div>
		</div>
	</div>
</section>
<?php }?>