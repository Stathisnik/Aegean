<?php
/**
 * Template Name: Interest Admin Page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header('inner'); 


$args = array(
    'post_type'   => 'businessneed',
    'post_status' => 'publish',
    'meta_key'    => 'ekdilosi_endiaferontos_$_interest_name',
    'compare'     => 'EXISTS',
); 

$posts = new WP_Query($args);

// var_dump_pre($posts);
// die();

?>
<?php if(current_user_can( 'administrator' )): ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3"><?php echo pll__("Εκδήλωση ενδιαφέροντος σε επιχειρηματική ανάγκη");?></h2>
                <p class="heading-soon text-center text-muted"><?php echo pll__("Δείτε όλες τις εκδηλώσεις ενδιαφέροντος που έκαναν οι χρήστες σε ανάγκες επιχειρήσεων!");?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p id="success-message" class="text-center"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <form id="interest-table-form">
                    <div class="form-group">
                        <select class="form-control" id="interest-table-select">
                            <option disabled selected> Επιλέξτε μια από τις παρακάτω επιχειρηματικές ανάγκες </option>
                            <?php while($posts->have_posts()):
                                  $posts->the_post();
                            ?>
                            <option value="<?php echo get_the_ID(); ?>"> <?php echo get_the_title(); ?> </option>
                            <?php endwhile; ?>
                        </select>   
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th><?php echo pll__("Ονοματετώνυμο");?></th>
                            <th><?php echo pll__("Email");?></th>
                            <th><?php echo pll__("Τηλέφωνο Επικοινωνίας");?></th>
                            <!-- <th>< echo pll__("Βιογραφικό");?></th> -->
                            <th><?php echo pll__("Πώς σκέφτεστε να καλύψετε τη συγκεκριμένη Ανάγκη");?></th>
                            <th><?php echo pll__("Ημερομηνία Καταχώρησης");?></th>
                            <th><?php echo pll__("Επεξεργασία Ανάγκης");?></th>
                            <th><?php echo pll__("Συντάκτης Ανάγκης");?></th>
                            <th><?php echo pll__("Email Συντάκτη Ανάγκης");?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>


<?php get_footer(); ?>

<?php else: 
    wp_redirect(get_home_url()); ?>
<?php endif; ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#example').DataTable( {
            "language":{
                "paginate":{
                "previous":"Προηγούμενο",
                "next":"Επόμενο"
                },
                "search": "Αναζήτηση",
                "zeroRecords": "Δεν βρέθηκε κανένα στοιχείο",
                "infoEmpty":"Κανένα στοιχείο",
                "infoFiltered":"(Απο MAX συνολικά)"
            },
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

        function showInterestTable(id){
            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                method: "post",
                type: 'HTML',
                data: {
                    action: "showInterestTable_action",
                    id: id
                },
                beforeSend: function(xhr) {
                    jQuery('#success-message').text('Φόρτωση...');
                },
                success: function(data) {
                    jQuery('#success-message').empty();
                    jQuery('tbody').empty().append(data);
                    console.log(data);
                },
                error: function(error) {
                    //handle error
                    console.log(error)
                }
            });
        }

        jQuery('#interest-table-select').on('change', function(){
            let need_id = jQuery(this).val();
            showInterestTable(need_id);
        });

    } );
</script>