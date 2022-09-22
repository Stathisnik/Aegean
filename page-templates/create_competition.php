<?php /* Template Name: Create Competition */ ?>

<?php acf_form_head(); ?>
<?php get_header('inner'); ?>
<?php 
    $roloi_xristi = um_user('roles'); 
?>
<?php if(is_user_logged_in() && ($roloi_xristi[0] == "administrator" || $roloi_xristi[0] == "aegean_admin") ){ ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="container forms">
                    <img class="title-img-above" src="<?php echo get_stylesheet_directory_uri(); ?>/img/action-icon.svg" alt="">
                    <h2 class="title-internal"><?php echo pll__("Δημιουργία Διαγωνισμού");?></h2>           
                    <p class="submit-title"><?php echo pll__("Περίληψη Διαγωνισμού");?></p>
                
                    <?php 
                        $settings = array(
                            'id' => 'competition_form',
                            /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                            Can also be set to 'new_post' to create a new post on submit */
                            'post_id' => 'new_post',
                            'uploader' => 'basic',

                            'new_post' => array(
                                'post_type'		=> 'competition',
                                'post_status'	=> 'publish',
                            ),
                            'field_groups' => array("group_5fb3d2d7606c8"),
                            'fields' => false,
                            // 'return' => "/aegean-crowdsourcing/epitychia-ypovolis-drasis",
                            'submit_value' => pll__("Υποβολή Διαγωνισμού >", 'acf'),
                            'label_placement' => 'top',
                            'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn" value="%s" />',
                            'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
                        );
                        acf_form( $settings );
                    ?>
                </div>
            </main>
        </div>
<?php }else{
        wp_redirect(get_home_url());
    }
?>

<script>
    jQuery(document).ready(function () {

    });
</script>



<?php get_footer();