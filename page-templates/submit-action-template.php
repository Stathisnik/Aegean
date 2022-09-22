<?php
/**
 * Template Name: Submit action Template
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */
get_header('inner');

?>

<div class="container for_margin">
	
<br>

  <h2 class="heading-1"><?php echo pll__("Υποβολή Δράσης");?></h2>
<br> 
<h3 class="heading-2"><?php echo pll__("Δεν είσαι συνδεδεμένος");?></h3>

<p class="heading-3"><?php echo pll__("Πρέπει να συνδεθείς για να υποβάλεις την δράση!");?></p>

<br>





<button
					onclick="window.location.href='https:/aegean-crowdsourcing/syndesi/';"
					type="button" class="primary_btn"><?php echo pll__("Σύνδεση ή Εγγραφή");?></button>


<br>
<br>

	<div class="for_margin">
	</div>
</div>
<?php get_footer(); ?>