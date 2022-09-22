<?php if(pll_current_language() == 'el'){ ?>
<section id="about">
    <div class="container">
	<h2><?php echo get_field('τιτλος_σχετικά_με_το_αιγαίο');?></h2>
	<div class="row">
			<div class="col-md-6 d-flex flex-column justify-content-center">
		
				
<p><?php echo get_field('κειμενο_σχετικά_με_το_αιγαίο');?> <p>
<div class="d-flex justify-content-end primary-link">
 <a href="<?php echo get_home_url();?>/stoicheia-gia-to-aigaio/" style="color: #3397FF;"><?php echo pll__("Στοιχεία για το Αιγαίο >");?></a>
   </div>			
			</div>
			<div class="col-md-6">
				<img class="greece-map" src="<?php echo get_stylesheet_directory_uri(); ?>/img/map-grey.svg" alt="">
			</div>
		</div>
	
    </div>
</section>
<?php }else{ ?>
	<section id="about">
    <div class="container">
	<h2><?php echo get_field('title_about_the_aegean');?></h2>
	<div class="row">
			<div class="col-md-6 d-flex flex-column justify-content-center">
		
				
<p><?php echo get_field('text_about_the_aegean');?> <p>
<div class="d-flex justify-content-end primary-link">
 <a href="<?php echo get_home_url();?>/stoicheia-gia-to-aigaio/" style="color: #3397FF;"><?php echo pll__("Information about the Aegean >");?></a>
   </div>			
			</div>
			<div class="col-md-6">
				<img class="greece-map" src="<?php echo get_stylesheet_directory_uri(); ?>/img/map-grey.svg" alt="">
			</div>
		</div>
	
    </div>
</section>
<?php }?>

