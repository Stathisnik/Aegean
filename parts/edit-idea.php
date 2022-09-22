<?php

defined( 'ABSPATH' ) || exit;

$current_user = wp_get_current_user();

if(is_user_logged_in() && (current_user_can('administrator') || $current_user->ID == $post->post_author)) { ?>
    <?php acf_form_head(); 
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
    
    ?>
    <div class="container">
        <br>
        <h2><?php echo pll__("Επεξεργασία Επιχειρηματικής Ιδέας");?></h2>
        <?php acf_form([
            'form_attributes' => array(),
            'uploader' => 'basic',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'field_el' => 'div',
            'honeypot' => true,
            'kses'	=> true,
            'fields' => $field_keys,
            'return' => get_the_permalink(),
            'submit_value' => pll__("Ενημέρωση"),
            'html_submit_button'  => '<input type="submit" class="primary_btn acf-button button button-primary button-large" value="%s" />',
        ]); ?>
    </div>

<?php }else{
    wp_redirect(get_the_permalink());
} ?>