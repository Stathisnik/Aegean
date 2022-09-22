<section id="foreis">
	<div class="container">
		<?php if(pll_current_language() == 'el'){ ?>
		<h2><?php echo get_field('τιτλος_συνεργαζόμενοι_φορείς');?></h2>
		<?php }else{ ?>
		<h2><?php echo get_field('title_cooperating_agencies');?></h2>
		<?php }?>
		<div class="row justify-content-center">
			<?php $logos = get_field('field_5f3a62729d862','option');
		
		 foreach($logos as $logo):?>
			<div class="sponsors">

				<a class="logo-sponsor" style="background-image:url('<?php echo $logo['logo']; ?>');"
					href="<?php echo $logo['link']; ?>">

				</a>

				<h6 class="logo-title"><?php echo $logo['title_sponsor'];?></h6>
			</div>
			<?php endforeach; ?>

		</div>

		<?php if(pll_current_language() == 'el'){ ?>
      <button
					onclick="window.location.href='https:/aegean-crowdsourcing/chorigoi/';"
					type="button" class="primary_btn"><?php echo pll__("Δες περισσότερα");?>
				</button>
        <?php }else{ ?>
          <button
					onclick="window.location.href='https:/aegean-crowdsourcing/chorigoi/';"
					type="button" class="primary_btn"><?php echo pll__("See more");?>
				</button>
        <?php } ?>

	</div>
</section>