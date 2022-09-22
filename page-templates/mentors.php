<?php
/**
 * Template Name: Mentors
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

acf_form_head();
get_header('inner');

$container = get_theme_mod( 'understrap_container_type' );

$roloi_xristi = um_user('roles');
$requested_to_be_mentor = um_user('mentor_requested');

if ( is_user_logged_in() && array_search("mentor",$roloi_xristi)) { 
    $current_user = wp_get_current_user();
    $args = array(
        'posts_per_page' => -1,
        'post_type'   => 'businessidea',
        'lang' => "el",
        'meta_query' => array(
            array(
                'key' => 'μέντορες',
                'value'    => '"'.$current_user->ID.'"',
                'compare'    => 'LIKE'
            )
        )
      );
    ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <div class="wrapper" id="wrapper-under-construction">
        <div class="container">
            <h2><?php echo pll__("Είμαι Μέντορας");?></h2>
            <h4 class="heading-soon"><?php echo pll__("Οι Επιχειρηματικές ιδέες που υποστηρίζω");?></h4>

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th><?php echo pll__("Τίτλος");?></th>
                        <th><?php echo pll__("Όνομα μέλους");?></th>
                        <th><?php echo pll__("Διαγωνισμός");?></th>
                        <th><?php echo pll__("Στάδιο Διαγωνισμού");?></th>
                        <th><?php echo pll__("Επιχειρηματικό πλάνο");?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ideas = new WP_Query($args);
                        while($ideas->have_posts()){
                            $ideas->the_post();
                            ?>
                            <tr>
                                <td><?php echo get_field('τίτλος_επιχειρηματικής_ιδεας',get_the_ID());?></td>
                                <td><?php echo get_the_author();?></td>
                                <td><?php echo get_field('ανήκει_σε_διαγωνισμό__select2',get_the_ID())->post_title;?></td>
                                <td><?php echo get_field('stage', get_field('ανήκει_σε_διαγωνισμό__select2',get_the_ID())->ID);?></td>
                                <td><?php echo get_field('συνοπτικά_στοιχεία_του_επιχειρηματικού_σχεδίου', get_the_ID()) != Null ? "Ναι" : "Όχι";  ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery('#example').DataTable( {
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0, 1 ]
                    }, {
                        targets: [ 1 ],
                        orderData: [ 1, 0 ]
                    }, {
                        targets: [ 4 ],
                        orderData: [ 4, 0 ]
                    } ]
                } );
            } );
        </script>
    </div>


<?php }else if($requested_to_be_mentor){ ?>
    <div class="wrapper" id="wrapper-under-construction">
        <div class="container">
            <h2>Mentors only</h2>
            <div>
                <img class="img-under-construction" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wondering_icon.svg" alt="">
            </div>
            <h6 class="heading-3">Αυτή η σελίδα είναι για τους μέντορες.</h6>
            <h6>Το αίτημα σου έχει υποβληθεί και <b>αναμένει έγκριση</b></h6>
        </div>
    </div>
<?php }else{?>

    <div class="wrapper" id="wrapper-under-construction">
        <div class="container">
            <h2>Mentors only</h2>
            <div>
                <img class="img-under-construction" src="<?php echo get_stylesheet_directory_uri(); ?>/img/person-mentor.svg" alt="">
            </div>
            <h6 class="heading-3">Αυτή η σελίδα είναι για τους μέντορες.</h6>
            <h6>Αν θες να γίνεις και εσύ μέντορας, συμπλήρωσε την παρακάτω φόρμα</h6>
            <button type="button" class="btn btn-primary primary_btn" data-toggle="modal" data-target="#exampleModal">
                Φόρμα
            </button>

            <div id="exampleModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Φόρμα Αιτήματος</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $settings = array(
                                    'id' => 'mentors_request_form',
                                    /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
                                    Can also be set to 'new_post' to create a new post on submit */
                                    'post_id' => 'mentors_request_form',
                                    'field_groups' => array("group_5fc7ac75894bd"),
                                    'fields' => false,
                                    // 'return' => "/aegean-crowdsourcing/epitychia-ypovolis-drasis",
                                    'submit_value' => pll__("Υποβολή Αιτήματος >", 'acf'),
                                    'label_placement' => 'top',
                                    'html_submit_button'	=> '<input type="submit" id="submitbtn" class="acf-button button primary_btn" value="%s" />',
                                    'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
                                );
                                acf_form( $settings );

                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>
<?php get_footer();