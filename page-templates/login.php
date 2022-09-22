<?php
/**
 * Template Name: Login
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */
get_header('inner');



?>

 <div id="page">
 <div class="container py-5">
 <h1 ><?php echo pll__("Σύνδεση");?></h1>
 
 </div>
</div>




<script>
jQuery(document).ready(function(){
   
   jQuery(".tml-field-wrap.tml-pwd-wrap").append('<i class="far fa-eye-slash pass"></i>');


   jQuery(".far.fa-eye-slash.pass").click(function(){
            
            jQuery(this).toggleClass("fa-eye fa-eye-slash");

            var input = jQuery("#user_pass");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
                });

 jQuery('.tml-lostpassword-link').detach().appendTo('.tml-field-wrap.tml-pwd-wrap');

 jQuery(".tml-field-wrap.tml-submit-wrap").prepend('<a href="/aegean-crowdsourcing/" id="cancel" class="cancelbtn acf-button button">Cancel</a>');

    });
</script>

<?php get_footer(); ?>