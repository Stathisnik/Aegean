<?php /* Template Name: Submit Need */ ?>
 
<?php acf_form_head(); ?>
<?php get_header('inner'); ?>
<?php 

    $userid = get_current_user_id();
    um_fetch_user($userid);

    $roloi_xristi = um_user('roles');
    $is_business = um_user('is_legal');

    $legal_identity = um_user('legal_identity');

?>

 <?php if ( is_user_logged_in() && ( ( !empty($legal_identity) ) || current_user_can('administrator') )  ) {     ?> 

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container forms">
           <h2 class=" title-internal"><?php echo pll__("Υποβολή Aνάγκης Επιχείρησης");?></h2>
            <p class="submit-title"><?php echo pll__("Στο σημείο αυτό, καλούνται οι επιχειρήσεις που ήδη λειτουργούν, να δηλώσουν τις ανάγκες τις οποίες πιστεύουν ότι θα μπορούσαν να καλύψουν νεοφυείς επιχειρήσεις.");?>
</p>
            
        <?php
        $lang = pll_current_language();
        // Start the loop.
        while ( have_posts() ) : the_post();
                $title_cf =  get_the_ID();
               
                if($lang == 'el'){
                 $settings = array(

                    /* (string) Unique identifier for the form. Defaults to 'acf-form' */
                    'id' => 'idea_form',

                    /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                    Can also be set to 'new_post' to create a new post on submit */
                    'post_id' => 'new_post',

                    /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
                    The above 'post_id' setting must contain a value of 'new_post' */
                    'new_post' => array(
                        'post_type'		=> 'businessneed',
                        'post_status'	=> 'draft',
                        
                    ),

                    /* (array) An array of field group IDs/keys to override the fields displayed in this form */
                    'field_groups' => array("group_5f06c9697c6d7"),

                    /* (array) An array of field IDs/keys to override the fields displayed in this form */
                    'fields' => false,

                    /* (boolean) Whether or not to show the post title text field. Defaults to false */
                    'post_title' => false,

                    /* (boolean) Whether or not to show the post content editor field. Defaults to false */
                    'post_content' => false,

                    /* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
                    'form' => true,

                    /* (array) An array or HTML attributes for the form element */
                    'form_attributes' => array(),

                    /* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
                    A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post)
                    A special placeholder '%post_id%' will be converted to post's ID (handy if creating a new post) */
                    'return' => "/aegean-crowdsourcing/epitychia-ypovolis-anagkis",

                    /* (string) Extra HTML to add before the fields */
                    'html_before_fields' => '',

                    /* (string) Extra HTML to add after the fields */
                    'html_after_fields' => '',

                    /* (string) The text displayed on the submit button */
                    'submit_value' => pll__("Υποβολή Ανάγκης >", 'acf'),

                    /* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
                    'updated_message' => __("Post updated", 'acf'),

                    /* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
                    Choices of 'top' (Above fields) or 'left' (Beside fields) */
                    'label_placement' => 'top',

                    /* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
                    Choices of 'label' (Below labels) or 'field' (Below fields) */
                    'instruction_placement' => 'label',

                    /* (string) Determines element used to wrap a field. Defaults to 'div'
                    Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
                    'field_el' => 'div',

             

                    /* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
                    'honeypot' => true,

                    /* (string) HTML used to render the updated message. Added in v5.5.10 */
                    'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',

                    /* (string) HTML used to render the submit button. Added in v5.5.10 */
                    'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn" value="%s" />',

                    /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
                    'html_submit_spinner'	=> '<span class="acf-spinner"></span>',

                    /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
                    'kses'	=> true

                );}else{
                    $settings = array(

                        /* (string) Unique identifier for the form. Defaults to 'acf-form' */
                        'id' => 'idea_form',
    
                        /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                        Can also be set to 'new_post' to create a new post on submit */
                        'post_id' => 'new_post',
    
                        /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
                        The above 'post_id' setting must contain a value of 'new_post' */
                        'new_post' => array(
                            'post_type'		=> 'businessneed',
                            'post_status'	=> 'draft',
                            
                        ),
    
                        /* (array) An array of field group IDs/keys to override the fields displayed in this form */
                        'field_groups' => array("group_5f06c9697c6d7"),
    
                        /* (array) An array of field IDs/keys to override the fields displayed in this form */
                        'fields' => false,
    
                        /* (boolean) Whether or not to show the post title text field. Defaults to false */
                        'post_title' => false,
    
                        /* (boolean) Whether or not to show the post content editor field. Defaults to false */
                        'post_content' => false,
    
                        /* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
                        'form' => true,
    
                        /* (array) An array or HTML attributes for the form element */
                        'form_attributes' => array(),
    
                        /* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
                        A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post)
                        A special placeholder '%post_id%' will be converted to post's ID (handy if creating a new post) */
                        'return' => "https://aegean-startups.gr/en/success-need-page/",
    
                        /* (string) Extra HTML to add before the fields */
                        'html_before_fields' => '',
    
                        /* (string) Extra HTML to add after the fields */
                        'html_after_fields' => '',
    
                        /* (string) The text displayed on the submit button */
                        'submit_value' => pll__("Υποβολή Ανάγκης >", 'acf'),
    
                        /* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
                        'updated_message' => __("Post updated", 'acf'),
    
                        /* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
                        Choices of 'top' (Above fields) or 'left' (Beside fields) */
                        'label_placement' => 'top',
    
                        /* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
                        Choices of 'label' (Below labels) or 'field' (Below fields) */
                        'instruction_placement' => 'label',
    
                        /* (string) Determines element used to wrap a field. Defaults to 'div'
                        Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
                        'field_el' => 'div',
    
                 
    
                        /* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
                        'honeypot' => true,
    
                        /* (string) HTML used to render the updated message. Added in v5.5.10 */
                        'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
    
                        /* (string) HTML used to render the submit button. Added in v5.5.10 */
                        'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn" value="%s" />',
    
                        /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
                        'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
    
                        /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
                        'kses'	=> true
                    );}
                acf_form( $settings );
 
           
            endwhile; // End of the loop.   ?>
             </div>
        </main>
    </div>
        <?php }else{
		 $url = get_home_url().'/cant-submit-need/';	
        wp_redirect($url);
        }
        
        um_reset_user();
        ?>

<script>
jQuery(document).ready(function(){
      jQuery('#idea_form > div.acf-fields.acf-form-fields.-top > div.acf-tab-wrap.-top > ul > li:last-child > a').click();



        jQuery(".field_5ef9b518cf7ef .acf-input").append('<i class="far fa-calendar"></i>');

        
 
    
});


//Buttons//
// jQuery(document).ready(function(){
//     jQuery(".acf-tab-group").find('li:first-child a').click();//on page load click to first tab



//     jQuery("#submitbtn").removeClass("d-flex").addClass("d-none"); //on page load submit button disappeared
    
//     jQuery(".acf-form-submit").prepend('<a id="prev" class="previousbutton acf-button button">< Πίσω</a>');
//     jQuery(".acf-form-submit").prepend('<a id="next" class="nextbutton acf-button button">Επόμενο βήμα ></a>');
   
//     if(jQuery(".acf-hl.acf-tab-group li:first-child").hasClass("active")) {
//             jQuery(".nextbutton").addClass("d-block");
//             jQuery(".previousbutton").addClass("d-none");
//         }

        
        


//     jQuery("#idea_form .acf-hl.acf-tab-group li:first-child a").click(function(){ //on click first tab remove the submit button
//         jQuery(".nextbutton").addClass("d-block");
//             jQuery("#submitbtn").removeClass("d-flex").addClass("d-none");
//             jQuery("#prev").removeClass("d-block").addClass('d-none');
//         });
    
//         jQuery("#idea_form .acf-hl.acf-tab-group li:nth-child(2) a").click(function(){ //on click first tab remove the submit button
//             jQuery("#submitbtn").removeClass("d-flex").addClass("d-none");
//             jQuery(".previousbutton").removeClass("d-none").addClass('d-block');

//         });

//         jQuery("#idea_form .acf-hl.acf-tab-group li:last-child a" ).click(function(){ //on click first tab remove the submit button
            
//             jQuery("#submitbtn").removeClass('d-none').addClass("d-flex");
//             jQuery(".nextbutton").removeClass('d-block').addClass("d-none");

//         });

//         jQuery(".nextbutton.acf-button.button.d-block").click(function(){
            
            
//             jQuery(".acf-tab-group").find('li.active').next().find(".acf-tab-button").click()
//         });
//         jQuery("#prev").click(function(){
//             jQuery(".acf-tab-group").find('li.active').prev().find(".acf-tab-button").click()
//         });

// });

</script>

<?php get_footer();
