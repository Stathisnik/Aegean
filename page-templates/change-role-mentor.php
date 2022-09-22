<?php 
    //Template Name: Change role Mentor 
?>

<?php 

    $current_user = get_current_user_id();
   

    $u = new WP_User( $current_user );

    
    
    $u->set_role( 'mentor' );
    
    

    $url = get_home_url().'/user/';

    wp_redirect($url);


?>