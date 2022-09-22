<?php 
/**
 * Template Name: Ideas Table
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('inner');

$roloi_xristi = um_user('roles');
$ideas_on_competition = array();
$mentors = get_users(array('role'=>'mentor'));
$judges = get_users(array('role'=>'judge'));
// var_dump_pre($mentors);

// update_field('field_5fb28b33e10b6', 171, 3681);
// die();

if ( true ) { 
    // $current_user = wp_get_current_user();
    $args = array(
        'post_type'   => 'businessidea',
        'posts_per_page' => -1,
    );
    
    
    $ideas = new WP_Query($args);
    foreach ($ideas->posts as $idea) {
        $diagonismos_relation = get_field("field_5ef9acb911334", $idea->ID);
        $othercompetition_id = $othercompetition->ID;
        $image_thematiki = get_field('thematiki_img',$othercompetition_id);
        // var_dump_pre($diagonismos_relation["select2"]);
        if (isset($diagonismos_relation["aniki_se_diagonismo"]) && $diagonismos_relation["select2"] != NULL) {
            array_push($ideas_on_competition, $idea);
        }
    }
}

$judges_stages  = array('1.2 στάδιο - Ανάθεση & Αξιολόγηση', '2.2 στάδιο - Υποβολή business plans' ,'3.1 στάδιο - Ανάθεση αξιολογητών');
$mentors_stages = array('2.1 στάδιο - Ανάθεση  μεντόρων');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="wrapper" id="wrapper-under-construction">
        <div class="container-fluid">
            <h4 class="heading-soon"><?php echo pll__("Οι ιδέες διαγωνισμών");?></h4>

            <table id="ideas_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th><?php echo pll__("Τίτλος Ιδέας");?></th>
                        <th><?php echo pll__("Μέλος που κατέθεσε την Ιδέα");?></th>
                        <th><?php echo pll__("Στάδιο Διαγωνισμού");?></th>
                        <th><?php echo pll__("Στάδιο Ιδέας Διαγωνισμού");?></th>
                        <th><?php echo pll__("Μέντορες");?></th>
                        <th><?php echo pll__("Αξιολογητές");?></th>
                        <th><?php echo pll__("Συνολική Βαθμολογία");?></th>
                        <th><?php echo pll__("Κατ.");?></th>
                        <th><?php echo pll__("Θ.Π");?></th>
                    </tr>
                </thead>
                <tbody style="font-size:14px">
                    <?php
                        // $ideas = new WP_Query($args);
                        foreach($ideas_on_competition as $single_idea){
                            $author_id = $single_idea->post_author;
                            $stages = get_field_object('field_60c0c1b9a9cbd');
                            $current_stage = get_field('field_60c0c1b9a9cbd', $single_idea->ID);
                            $current_mentor = get_field('field_5fb28b33e10b6', $single_idea->ID);
                            $current_judge = get_field('field_60c1a2c828caf', $single_idea->ID);
                            
                            $disabled_tr = $current_stage != get_field('stage', get_field('ανήκει_σε_διαγωνισμό__select2',$single_idea->ID)) ? 'disabled' : '';
                            ?>
                            <tr <?php //echo $disabled_tr; ?>>
                                <td><a href="<?php echo get_the_permalink( $single_idea->ID ); ?>" target="_blank"> <?php echo get_field('τίτλος_επιχειρηματικής_ιδεας',$single_idea->ID);?> </a></td>
                                <td><?php echo get_the_author_meta('first_name', $author_id). ' ' .get_the_author_meta('last_name', $author_id) ;?></td>
                                <?php $stage_number = get_field('stage', get_field('ανήκει_σε_διαγωνισμό__select2',$single_idea->ID));?>
                                <td><?php echo preg_replace('/[^0-9.]+/', '', $stage_number);?></td>
                                <!-- Show current Stage -->
                                <td>
                                    <?php echo preg_replace('/[^0-9.]+/', '', $current_stage); ?>
                                </td>
                                <!-- Show mentors -->
                               
                                <td> 
                                    <?php if(in_array($current_stage , $mentors_stages)): ?>
                                        <form>
                                            <select class="form-control mentors-table" idea-id="<?php echo $single_idea->ID; ?> " multiple style='width:75%'>
                                                
                                                <?php if (empty($current_mentor) ): ?>
                                                    <option disabled selected> -- </option>
                                                <?php endif; ?>
                                                
                                                <?php foreach($mentors as $mentor): ?>
                                                    <option 
                                                        value="<?php echo $mentor->ID; ?>" 
                                                        <?php if($current_mentor != NULL): ?>
                                                            <?php foreach($current_mentor as $current){
                                                                    if($current['display_name'] == $mentor->display_name){
                                                                        echo 'selected="selected"';
                                                                    }
                                                                }
                                                            ?> 
                                                        <?php endif; ?> > 
                                                        <?php echo $mentor->display_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                    <?php else: ?>
                                        Η ιδέα δεν βρίσκεται στο στάδιο ανάθεσης μεντόρων 
                                    <?php endif; ?>
                                </td>
                                <!-- Show Αξιολογητές -->
                                <td> 
                                    <?php if(in_array($current_stage , $judges_stages)): ?>
                                        <form>
                                            <select class="form-control judge-table" idea-id="<?php echo $single_idea->ID; ?> " multiple style='width:75%'>
                                                
                                                <?php if (empty($current_judge) ): ?>
                                                    <option disabled selected> -- </option>
                                                <?php endif; ?>
                                                
                                                <?php foreach($judges as $judge): ?>
                                                    <option 
                                                        value="<?php echo $judge->ID; ?>" 
                                                        <?php if($current_judge != NULL): ?>
                                                            <?php foreach($current_judge as $current){
                                                                    if($current['display_name'] == $judge->display_name){
                                                                        echo 'selected="selected"';
                                                                    }
                                                                }
                                                            ?> 
                                                        <?php endif; ?> > 
                                                        <?php echo $judge->display_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                    <?php else: ?>
                                        Η ιδέα δεν βρίσκεται στο στάδιο ανάθεσης αξιολογητών
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    
                                        if( have_rows('field_608a82860f21b', $single_idea->ID )){
                                            while( have_rows('field_608a82860f21b', $single_idea->ID ) ){
                                                the_row();
                                                $idea_originality = get_sub_field('field_608a7c0b86c00',$single_idea->ID);
                                                $idea_feasibility = get_sub_field('field_608a7d8786c03',$single_idea->ID);
                                                $idea_completeness = get_sub_field('field_608a7d8d86c06',$single_idea->ID);
                                                $idea_extroversion = get_sub_field('field_608a7d9386c09',$single_idea->ID);
                                                $idea_promotion = get_sub_field('field_608a7d9886c0c',$single_idea->ID);
                                                $aniki_se_diagonismo = get_field('field_5ef9acb911334',$single_idea->ID);
                                                $thematiki_perioxi = $aniki_se_diagonismo['θεματική']; 
                                                $katigoria = $aniki_se_diagonismo['category'];
                                                $idea_final_score = $idea_originality + $idea_feasibility + $idea_completeness + $idea_extroversion + $idea_promotion; 
                                                
                                            }
                                        }
                                        
                                        echo $idea_final_score;
                                    ?>
                                    
                                </td>
                                <td> <?php echo mb_substr($katigoria->post_title , 10 , 1 , "UTF-8"); ?> </td>
                                <td> <?php echo $thematiki_perioxi->post_title; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <p class="success-id"> </p>

            <div class="row">
                <div class="col-md-12">
                    <button onclick="location.href='<?php echo get_home_url();?>/pinakas-axiologiseon/'" class="primary_btn sm_margin"><?php echo pll__(" Πίνακας Αξιολόγησης"); ?></button>
                </div>
            </div>


        </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery('.mentors-table').select2({
                    width: 'resolve'
                });
                jQuery('.judge-table').select2({
                    width: 'resolve'
                });

                jQuery('#ideas_table').DataTable( {
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
                
                    });


                function updateStage(id, value){
                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        method: "post",
                        type: 'JSON',
                        data: {
                            action: "updateStage_action",
                            id: id,
                            value: value 
                        },
                        beforeSend: function(xhr) {
                            jQuery('.success-id').text('Loading...');
                        },
                        success: function(data) {
                            jQuery('.success-id').empty().text('Loading completed.');
                            setTimeout(function(){ jQuery('.success-id').empty(); }, 2000);
                           var idea_id = data.data.id;
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: '#2cd373'}, 300);
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: ''},3000);
                            
                           
                        },
                        error: function(error) {
                            //handle error
                            console.log(error)
                        }
                    });
                }
                
                jQuery('.idea-stages').on('change', function(){
                    var stage_value = jQuery(this).val();
                    var idea_id = jQuery(this).attr('idea-id');
                    console.log(stage_value);
                    updateStage(idea_id, stage_value);
                });
                

                function updateMentors(id, value){
                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        method: "post",
                        type: 'JSON',
                        data: {
                            action: "changeMentors",
                            id: id,
                            value: value 
                        },
                        beforeSend: function(xhr) {
                            console.log('Loading...')
                        },
                        success: function(data) {
                            jQuery('.success-id').empty().text('Ορίσατε Μέντορα!');
                            setTimeout(function(){ jQuery('.success-id').empty(); }, 2000);
                           var idea_id = data.data.id;
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: '#2cd373'}, 300);
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: ''},3000);

                        },
                        error: function(error) {
                            //handle error
                            console.log(error)
                        }
                    });
                

                }

                function updateJudge(id, value){
                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        method: "post",
                        type: 'JSON',
                        data: {
                            action: "changeJudges",
                            id: id,
                            value: value 
                        },
                        beforeSend: function(xhr){
                            console.log('Loading...')
                        },
                        success: function(data){
                            jQuery('.success-id').empty().text('Ορίσατε Αξιολογητή!');
                            setTimeout(function(){ jQuery('.success-id').empty(); }, 2000);
                           var idea_id = data.data.id;
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: '#2cd373'}, 300);
                            jQuery(`*[idea-id="${idea_id}"]`).closest('tr').animate({backgroundColor: ''},3000);
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }

                // jQuery('.judge-table').on('change', function(){
                //     var judge_value = jQuery(this).val();
                //     var idea_id = jQuery(this).attr('idea-id');
                //     updateJudge(idea_id, judge_value);
                // });

                // jQuery('.mentors-table').on('change', function(){
                //     var mentor_value = jQuery(this).val();
                //     var idea_id = jQuery(this).attr('idea-id');
                //     console.log('Doulepse');
                //     updateMentors(idea_id, mentor_value);
                // });

                jQuery(document.body).on("change",".mentors-table",function(){
                    var mentor_value = jQuery(this).val();
                    var idea_id = jQuery(this).attr('idea-id');
                    updateMentors(idea_id, mentor_value);
                });

                jQuery(document.body).on("change",".judge-table",function(){
                    var judge_value = jQuery(this).val();
                    var idea_id = jQuery(this).attr('idea-id');
                    updateJudge(idea_id, judge_value);
                    
                });
            });

            
         
        
        </script>
        <style>
            select option:disabled{
                font-weight:bold;
                color:#d3d3d3;
            }
            td{
                position: relative;
            }
            tr[disabled] td::after {
                position: absolute;
                content: '';
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.3);
            }
        </style>
    </div>

<?php get_footer(); ?>