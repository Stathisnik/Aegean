<?php 
/**
 * Template Name: Admin page - Judges Table
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('inner'); 
?>
<?php 
    $args = array(
        'post_type' => 'businessidea',
        'post_status' => 'publish',
        'meta_key' => 'evaluation_form_$_originality',
        'compare' => 'EXISTS',
    );

    $posts = new WP_Query($args);

    // var_dump_pre($posts);
    // die();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3"> <?php echo pll__('Αξιολόγηση Ιδεών'); ?></h2>
            <p class="heading-soon text-center text-muted"> <?php echo pll__('Δείτε όλες τις ιδέες που έχουν αξιολογηθεί'); ?> </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3"> </h2>
            <p id="success-message"> </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <form action="" id="judges-table-form">
                <div class="form-group">
                    <select class="form-control" id="judges-table-select">
                        <option disabled selected> Επιλέξτε μια από τις παρακάτω ιδέες που έχουν αξιολογηθεί </option>
                        <?php
                            while($posts->have_posts()):
                                $posts->the_post();
                        ?>
                        <option value="<?php echo get_the_ID(); ?>"> <?php echo get_the_title(); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success email-button" value="" data-state="success" disabled="true"> Η ομάδα περνάει στο επόμενο στάδιο </button>
                    <button class="btn btn-success email-button" value="" data-state="failure" disabled="true"> Η ομάδα δεν πέρασε  </button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-2">
            <ol>
                <li> Πρωτοτυπία </li>
                <li> Εφικτότητα </li>
                <li> Πληρότητα </li>
                <li> Εξωστρέφεια </li>
                <li> Προαγωγή Αιγαίου </li>
            </ol>
        </div>

        <div class="col-md-2">
            <p> θ.π => θεματική περιοχή </p>
            <p> κατ. => κατηγορία </p>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <table id="judge-table" class="display">
                <thead>
                    <tr>
                        <th><?php echo pll__("Αξιολογητής");?></th>
                        <th><?php echo pll__("Email");?></th>
                        <th><?php echo pll__("1.");?></th>
                        <th><?php echo pll__("2.");?></th>
                        <th><?php echo pll__("3.");?></th>
                        <th><?php echo pll__("4.");?></th>
                        <th><?php echo pll__("5.");?></th>
                        <th class="text-center"><?php echo pll__("Συνολική Βαθμολογία");?></th>
                        <th width="30%"><?php echo pll__("Σχόλια");?></th>
                        <th><?php echo pll__("Μέλος που υπέβαλε Ιδέα");?></th>
                        <th><?php echo pll__("θ.π");?></th>
                        <th><?php echo pll__("κατ.");?></th>
                        <th><?php echo pll__("Στάδιο");?></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
         <button onclick="location.href='<?php echo get_home_url();?>/pinakas-ideon-diacheiriston'" class="primary_btn sm_margin"><?php echo pll__(" Πίνακας Ιδεών"); ?></button>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Σχόλια Αξιολογητή</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body read-more">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script> 
    jQuery(document).ready(function(){
        jQuery('#judge-table').DataTable( {
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

        function showEvaluation(id){
            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                method: "post",
                type: 'HTML',
                data: {
                    action: "showEvaluation_action",
                    id: id
                },
                beforeSend: function(xhr) {
                    jQuery('#success-message').text('Φόρτωση...');
                },
                success: function(data) {
                    jQuery('#success-message').empty();
                    jQuery('tbody').empty().append(data);
                    // jQuery('#data-hidden').empty().append(data);
                    // console.log(data);
                    jQuery('.email-button').attr("value",id);
                    jQuery('.email-button').attr("disabled",false);
                },
                error: function(error) {
                    //handle error
                    console.log(error)
                }
            });
        }

        jQuery('#judges-table-select').on('change',function(){
            let idea_id = jQuery(this).val();
            showEvaluation(idea_id);
        });


        function sendEmail(id, state){
            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                method: "post",
                type: 'HTML',
                data: {
                    action: "sendEmail_action",
                    id: id,
                    state: state
                },
                beforeSend: function(xhr) {
                    jQuery('#success-message').text('Φόρτωση...');
                },
                success: function(data) {
                    jQuery('#success-message').empty();
                    jQuery('#success-message').text('Το email στάλθηκε με επιτυχία!');
                    setTimeout(function(){ jQuery('#success-message').empty(); }, 2000);
                    console.log(data);
                },
                error: function(error) {
                    //handle error
                    console.log(error)
                }
            });
        }

        jQuery('.email-button').on('click', function(e){
            e.preventDefault();
            need_id = jQuery(this).attr("value");
            state = jQuery(this).attr("data-state");

            // console.log(need_id);
            // console.log(state);
            sendEmail(need_id, state);
        });

        // jQuery('#button-readmore').on('submit', function(){
        //     let rows = jQuery('#count-rows').attr('id');
        //     console.log('sidufhsiudf');
        //     jQuery('.read-more').append('aousdjasd');
        // });

    });

</script>
