<?php //Template Name: Change Role Judge ?>

<?php 

    $current_user = get_current_user_id();
    

    $u = new WP_User( $current_user );

    
    
    $u->set_role( 'judge' );
    
    

    $url = get_home_url().'/user/';

    wp_redirect($url);


?>