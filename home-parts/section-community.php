<?php if(pll_current_language() == 'el'){ ?>
<section id="community">
	<div class="container">
		<div>
			<img class="persons-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/persons-icon.svg" alt="">
		</div>
		
		<h2><?php echo get_field('τιτλος_κοινοτητας');?></h2>
		<div class="row justify-content-center">

			<?php 
			$koinothtes = get_field('field_602e1877750ba','option');
		
		foreach($koinothtes as $koinothta):?>
		
		
			<div class="col">
				<h6><?php echo $koinothta['title_com'];?></h6>
				<img class="grey-person" src="<?php echo $koinothta['image_com']; ?>" alt="">
				<p><?php echo $koinothta['text_com'];?><p>
						<a href=<?php echo $koinothta['url_com'];?> class="primary_btn com"><?php echo $koinothta['button_com'];?></a>
			</div>
			<?php endforeach; ?>
		</div>
		
	</div>
</section>
<?php }else{ ?>
	<section id="community">
	<div class="container">
		<div>
			<img class="persons-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/persons-icon.svg" alt="">
		</div>
		
		<h2><?php echo get_field('title_community');?></h2>
		<div class="row justify-content-center">

			<?php 
			$communities = get_field('field_602e41a428160','option');
		
		foreach($communities as $community):?>
		
		
			<div class="col">
				<h6><?php echo $community['ttle_community'];?></h6>
				<img class="grey-person" src="<?php echo $community['image_community']; ?>" alt="">
				<p><?php echo $community['text_community'];?><p>
						<a href=<?php echo $community['url_community'];?> class="primary_btn com"><?php echo $community['name_button_community'];?></a>
			</div>
			<?php endforeach; ?>
		</div>
		
	</div>
	
</section>

<?php }?>

	






