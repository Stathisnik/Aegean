<?php /* Template Name: Submit Idea */ ?>
 
<?php acf_form_head(); ?>
<?php get_header('inner'); ?>
<?php 
    //   $current_user = wp_get_current_user();
    //   $user_roles = $current_user->roles[0];
 
    $roloi_xristi = um_user('roles');
  
?>


 <?php if ( is_user_logged_in() && (($roloi_xristi[0] == "member") || ($roloi_xristi[0] == "administrator")) ) {  ?> 

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
 
        <div class="container forms">
        <img class="title-img-above" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon.svg" alt="">
  
           <h2 class="title-internal"><?php echo pll__("Υποβολή Επιχειρηματικής Ιδέας");?></h2>
            <p class="submit-title"><?php echo pll__("Εδώ, μπορείτε να υποβάλλετε την επιχειρηματική σας ιδέα, στα πλαίσια ενός διαγωνισμού ή στα πλαίσια ανοιχτής υποβολής. Είναι η 1η φάση υποβολής επιχειρηματικών ιδεών. Η ιδέα σας θα εμφανιστεί δημόσια μετά από την έγκριση των διαχειριστών.");?>
</p>
            
        <?php
        $lang = pll_current_language();
        // Start the loop.
        while ( have_posts() ) : the_post();
                $title_cf =  get_the_ID();
               
                $fields     = array();
                $fields     = acf_get_fields("group_5ef9a68f8c9a3"); //donation group fields
                $excluded_fields = array(
                    'field_5fb28b33e10b6', //card_number
                    'field_60c0c1b9a9cbd',
                    'field_60c1a2c828caf'
                );
                $field_keys = array();
                if ($fields) {
                    foreach ($fields as $field) {
                        if (!in_array($field['key'], $excluded_fields)) {
                            $field_keys[] = $field['key'];
                        }
                    }
                }
                if($lang == 'el'){
                 $settings = array(

                    /* (string) Unique identifier for the form. Defaults to 'acf-form' */
                    'id' => 'idea_form',
                    'uploader' => 'basic',

                    /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                    Can also be set to 'new_post' to create a new post on submit */
                    'post_id' => 'new_post',

                    /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
                    The above 'post_id' setting must contain a value of 'new_post' */
                    'new_post' => array(
                        'post_type'		=> 'businessidea',
                        'post_status'	=> 'draft',
                        
                    ),

                    /* (array) An array of field group IDs/keys to override the fields displayed in this form */
                    // 'field_groups' => array("group_5ef9a68f8c9a3"),

                    /* (array) An array of field IDs/keys to override the fields displayed in this form */
                    'fields' => $field_keys,

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
                    'return' => "/aegean-crowdsourcing/epitychia-ypovolis",

                    /* (string) Extra HTML to add before the fields */
                    'html_before_fields' => '',

                    /* (string) Extra HTML to add after the fields */
                    'html_after_fields' => '',

                    /* (string) The text displayed on the submit button */
                    'submit_value' => pll__("Υποβολή Ιδέας >", 'acf'),

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
                    'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn bigger_btn" value="%s" />',

                    /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
                    'html_submit_spinner'	=> '<span class="acf-spinner"></span>',

                    /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
                    'kses'	=> true

                );}else{
                    $settings = array(

                        /* (string) Unique identifier for the form. Defaults to 'acf-form' */
                        'id' => 'idea_form',
                        'uploader' => 'basic',
    
                        /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                        Can also be set to 'new_post' to create a new post on submit */
                        'post_id' => 'new_post',
    
                        /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
                        The above 'post_id' setting must contain a value of 'new_post' */
                        'new_post' => array(
                            'post_type'		=> 'businessidea',
                            'post_status'	=> 'draft',
                            
                        ),
    
                        /* (array) An array of field group IDs/keys to override the fields displayed in this form */
                        // 'field_groups' => array("group_5ef9a68f8c9a3"),
    
                        /* (array) An array of field IDs/keys to override the fields displayed in this form */
                        'fields' => $field_keys,
    
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
                        'return' => "https://aegean-startups.gr/en/success-idea-submission/",
    
                        /* (string) Extra HTML to add before the fields */
                        'html_before_fields' => '',
    
                        /* (string) Extra HTML to add after the fields */
                        'html_after_fields' => '',
    
                        /* (string) The text displayed on the submit button */
                        'submit_value' => pll__("Υποβολή Ιδέας >", 'acf'),
    
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
                        'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn bigger_btn" value="%s" />',
    
                        /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
                        'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
    
                        /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
                        'kses'	=> true
                    );}
                acf_form( $settings );
 
           
            endwhile; // End of the loop.   ?>
             </>
        </main>
    </div>
        <?php
        }
    
       else
        {
		 $url = get_home_url().'/cant-submit-an-idea/';	
        wp_redirect($url);
    
   }
  ?>

<script>
jQuery(document).ready(function(){
      jQuery('#idea_form > div.acf-fields.acf-form-fields.-top > div.acf-tab-wrap.-top > ul > li:last-child > a').click();



        jQuery(".field_5ef9b518cf7ef .acf-input").append('<i class="far fa-calendar"></i>');

        
 
    
});

acf.add_filter('select2_ajax_data', function( data, args, $input, field, instance ){
    if(data.field_key == "field_5ffd848b44d64"){
        data.competition_id = acf.getField('field_5f032fa04bae9').val() //this is the selected competition from the acf group
    }
    // do something to args
    // return
    // $args['orderby'] = 'date';
    // $args['order'] = 'DESC';
    return data;
});



//Buttons//
jQuery(document).ready(function(){
    jQuery(".acf-tab-group").find('li:first-child a').click();//on page load click to first tab



    jQuery("#submitbtn").removeClass("d-flex").addClass("d-none"); //on page load submit button disappeared
    
    jQuery(".acf-form-submit").prepend('<a id="prev" class="previousbutton acf-button button secondary_btn">< <?php echo pll__("Πίσω");?></a>');
    jQuery(".acf-form-submit").prepend('<a id="next" class="nextbutton acf-button button "><?php echo pll__("Επόμενο βήμα");?> ></a>');
   
    if(jQuery(".acf-hl.acf-tab-group li:first-child").hasClass("active")) {
            jQuery(".nextbutton").addClass("d-block");
            jQuery("#prev").removeClass("d-flex").addClass('d-none');
        }

        
        

    jQuery("#idea_form .acf-hl.acf-tab-group li:first-child a").click(function(){ //on click first tab remove the submit button
        jQuery("#prev").removeClass("d-block").addClass('d-none');
            jQuery("#submitbtn").removeClass("d-flex").addClass("d-none");  //on click first tab remove the submit button
            
        });


    
        jQuery("#idea_form .acf-hl.acf-tab-group li:nth-child(2) a").click(function(){ //on click first tab remove the submit button
            jQuery("#submitbtn").removeClass("d-flex").addClass("d-none");//on click first tab remove the submit button
            jQuery("#prev").removeClass("d-none").addClass('d-block');
            jQuery(".nextbutton").addClass("d-block");

        });

        jQuery("#idea_form .acf-hl.acf-tab-group li:last-child a" ).click(function(){ //on click first tab remove the submit button
            
            jQuery("#submitbtn").removeClass('d-none').addClass("d-flex");
            jQuery(".nextbutton").removeClass('d-block').addClass("d-none");
            jQuery("#prev").removeClass("d-none").addClass('d-block');
        });

        jQuery(".nextbutton.acf-button.button.d-block").click(function(){
            
            jQuery(".acf-tab-group").find('li.active').next().find(".acf-tab-button").click()
        });
        jQuery("#prev").click(function(){
            jQuery(".acf-tab-group").find('li.active').prev().find(".acf-tab-button").click()
        });

        jQuery(".acf-input > textarea").bind("input propertychange", function(event) {
            if(jQuery(event.target).val() != ""){
                //textarea is not empty, add the gray background
                jQuery(".group-goals ul.acf-checkbox-list li > label.selected").addClass("filled_sdg")
            }else{
                //textarea is empty, remove the gray background
                jQuery(".group-goals ul.acf-checkbox-list li > label.selected").removeClass("filled_sdg")
            }
        })

});

</script>

<?php get_footer();
