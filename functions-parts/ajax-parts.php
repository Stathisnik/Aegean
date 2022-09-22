<?php

    add_action('wp_ajax_ideas_filter', 'ideas_filter_function');
    add_action('wp_ajax_nopriv_ideas_filter', 'ideas_filter_function');
    function ideas_filter_function()
    {
        if (isset($_POST['action']) && $_POST['action'] == "ideas_filter") {
            $args = array(
                'posts_per_page' => -1,
                'post_type'=> 'businessidea',
                'orderby'  => 'date', // we will sort posts by date
                'order'    => 'DESC', // ASC or DESC
                'lang'     => 'el',
                'post_status' => "publish",
            );
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($_POST as $possible_filter => $filter_value) {
                $possible_filter = explode("/", $possible_filter);
                switch ($possible_filter[0]) {
                    case "τυπος_προϊόντος_-_συστήματος_":
                        $args['meta_query'][] = array(
                            'key' => 'τυπος_προϊόντος_-_συστήματος_choices',
                            'compare' => 'LIKE',
                            'value' => $filter_value
                        );
                        break;
                    case "ανήκει_σε_διαγωνισμό__":
                        $args['meta_query'][] = array(
                            'key' => 'ανήκει_σε_διαγωνισμό__',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                        case "ανήκει_σε_διαγωνισμό_":
                            $args['meta_query'][] = array(
                                'key' => 'ανήκει_σε_διαγωνισμό__select2',
                                'compare' => '=',
                                'value' => $filter_value
                            );
                    case "κλάδος_":
                        $args['meta_query'][] = array(
                            'key' => 'κλάδος__epiloges_1',
                            'compare' => 'LIKE',
                            'value' => $filter_value
                        );
                        break;
                    case "στάδιο":
                        $args['meta_query'][] = array(
                            'key' => 'στάδιο',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "εχει_ιδρυθεί_η_επιχείρηση_":
                        $args['meta_query'][] = array(
                            'key' => 'εχει_ιδρυθεί_η_επιχείρηση_choice',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "τυπος_αναγκης_":
                        $args['meta_query'][] = array(
                            'key' => 'ανάγκες_$_τυπος_αναγκης_',
                            'value'    => array($filter_value),
                            'compare'    => 'IN'
                        );

                        break;
                }
            }


            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()){?>
<?php $query->the_post();
                    $other_idea_img = get_field('field_5f00afdb6b723',$query->ID); ?>
<div class="col-md-4 col-sm-6">
    <div class="card idea-card">
        <a href="<?php echo get_permalink($other_idea_id);?>">
            <div class="card-body">
                <?php if($other_idea_img['φωτογραφίες'] != ""){ ?>
                <div class="sec-ideas-img"
                    style="background-image: url('<?php echo $other_idea_img['φωτογραφίες'];?>')">

                </div>
                <?php } else { ?>
                <div class="sec-ideas-img"
                    style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/aegean_feature_img-idea.png';?>')">
                </div>

                <?php } ?>

                <h5 class="card-title-news"><?php echo get_the_title($other_idea);?></h5>

            </div>
            <div class="card-footer" style="padding: 1.25rem;">
                <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
            </div>
        </a>
    </div>
</div>
<?php
                }
                wp_reset_postdata();
            } else{
                echo pll__('No posts found');
            }
            die();
        }
    }


    add_action('wp_ajax_competitions_filter', 'competitions_filter_function');
    add_action('wp_ajax_nopriv_competitions_filter', 'competitions_filter_function');
    function competitions_filter_function()
    {
        if (isset($_POST['action']) && $_POST['action'] == "competitions_filter") {
            $args = array(
                'posts_per_page' => -1,
                'post_type'   => 'competition',
                'orderby' => 'date', // we will sort posts by date
                'order'    => 'date', // ASC or DESC
            );
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($_POST as $possible_filter => $filter_value) {
                $possible_filter = explode("/", $possible_filter);
                switch ($possible_filter[0]) {
                    case "stage":
                        $args['meta_query'][] = array(
                            'key' => 'stage',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "category":
                        $args['meta_query'][] = array(
                            'key' => 'category',
                            'compare' => 'LIKE',
                            'value' => $filter_value
                        );
                        break;
                }
            }


            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $stage = get_field('field_5fb56808ccb6c');
                    $other_idea_img = get_field('field_5f00afdb6b723', $competitions->ID);
                    $img_url = $other_idea_img['φωτογραφίες'] != "" ? $other_idea_img['φωτογραφίες'] :  get_stylesheet_directory_uri() . '/img/aegean_feature_img-competition.png';
                    ?>
<div class="col-md-12 col-sm-6">
    <div class="card competition-card">
        <a href="<?php echo get_permalink($other_idea_id); ?>">
            <div class="card-body">
                <div class="sec-ideas-img" style="background-image: url(<?php echo $img_url ?>);">
                    <div class="overlay"></div>
                    <h4 class="card-title-news"><?php echo get_the_title($other_idea); ?></h4>
                </div>

            </div>
            <div class="card-footer" style="padding: 1.25rem;">
                <p class="stage"><?php echo pll__("Στάδιο"); ?> <?php echo $stage; ?></p>
                <div class="dates">
                    <p class="start"><?php echo get_the_date(); ?></p>
                </div>
            </div>
        </a>
    </div>
</div>
<?php endwhile;
                wp_reset_postdata();
            else :
                echo pll__('No posts found');
            endif;
            die();
        }
    }

    add_action('wp_ajax_actions_filter', 'actions_filter_function');
    add_action('wp_ajax_nopriv_actions_filter', 'actions_filter_function');
    function actions_filter_function()
    {
        if (isset($_POST['action']) && $_POST['action'] == "actions_filter") {
            $args = array(
                'posts_per_page' => -1,
                'post_type'   => 'action',
                'orderby' => 'date', // we will sort posts by date
                'order'    => 'date', // ASC or DESC
            );
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($_POST as $possible_filter => $filter_value) {
                $possible_filter = explode("/", $possible_filter);
                switch ($possible_filter[0]) {
                    case "ανήκει_σε_διαγωνισμό_":
                        $args['meta_query'][] = array(
                            'key' => 'ανήκει_σε_διαγωνισμό_',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "τύπος_δράσης_":
                        $args['meta_query'][] = array(
                            'key' => 'τύπος_δράσης_',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "έχει_υποβληθεί_η_δράση_σε_άλλο_διαγωνισμό;_":
                        if ($filter_value != "Όχι") {
                            $args['meta_query'][] = array(
                                'key' => 'θα_έχετε_εσοδα;_',
                                'compare' => '!=',
                                'value' => "Όχι"
                            );
                        } else {
                            $args['meta_query'][] = array(
                                'key' => 'έχει_υποβληθεί_η_δράση_σε_άλλο_διαγωνισμό;_',
                                'compare' => '=',
                                'value' => $filter_value
                            );
                        }
                        break;
                    case "θα_έχετε_εσοδα;_":
                        if ($filter_value != "Οχι") {
                            $args['meta_query'][] = array(
                                'key' => 'θα_έχετε_εσοδα;_',
                                'compare' => '!=',
                                'value' => "Οχι"
                            );
                        } else {
                            $args['meta_query'][] = array(
                                'key' => 'θα_έχετε_εσοδα;_',
                                'compare' => 'LIKE',
                                'value' => $filter_value
                            );
                        }
                        break;

                        // case "τυπος_αναγκης_":
                        //     $args['meta_query'][] =array(
                        //             'key' => 'ανάγκες_$_τυπος_αναγκης_',
                        //             'value'    => array($filter_value),
                        //             'compare'    => 'IN'
                        //         );

                        // break;


                }
            }


            $actions = new WP_Query($args);

            
            if($actions->have_posts()): ?>
<?php while($actions->have_posts()): ?>
<?php $actions->the_post(); ?>
<div class="col-md-4 col-sm-6">
    <div class="card idea-card">
        <a href="<?php echo get_permalink();?>">
            <div class="card-body">
                <?php 						 
                        $postid = get_the_ID();
                        $eikona_kai_video = get_field('field_5f43761576775',$postid); ?>
                <?php 
                  if($eikona_kai_video['φωτογραφίες'] != ""){ ?>
                <div class="sec-ideas-img"
                    style="background-image: url('<?php echo $eikona_kai_video['φωτογραφίες'];?>" />

            </div>
            <?php } else { ?>
            <div class="sec-ideas-img"
                style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/aegean_feature_img-action.png';?>')">
            </div>

            <?php } ?>

            <h5 class="card-title-news"><?php echo get_the_title();?></h5>

    </div>
    <div class="card-footer" style="padding: 1.25rem;">
        <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
    </div>
    </a>
</div>
</div>

<?php endwhile;  
                wp_reset_postdata();
            else :
                echo pll__('No posts found');
            endif;
            die();
        }
    }


    add_action('wp_ajax_needs_filter', 'needs_filter_function');
    add_action('wp_ajax_nopriv_needs_filter', 'needs_filter_function');
    function needs_filter_function()
    {
        if (isset($_POST['action']) && $_POST['action'] == "needs_filter") {
            $filter_klado_epixirisis = [];
            $filter_edra_epixirisis = [];
            $args = array(
                'posts_per_page' => -1,
                'post_type'   => 'businessneed',
                'orderby' => 'date', // we will sort posts by date
                'order'    => 'date', // ASC or DESC
            );
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($_POST as $possible_filter => $filter_value) {
                $possible_filter = explode("/", $possible_filter);
                switch ($possible_filter[0]) {
                    case "legal_person_klados":
                        $filter_klado_epixirisis[$filter_value] = $filter_value;

                        $user_ids = array();
                        $user_query = new WP_User_Query( array( 'meta_key' => 'legal_person_klados', 'meta_value' => $filter_klado_epixirisis[$filter_value] ) );
                        foreach($user_query->get_results() as $user){
                            $id = $user->ID;
                            array_push($user_ids, $id);
                        }
        
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'=> 'businessneed',
                            'orderby'  => 'date', // we will sort posts by date
                            'order'    => 'DESC', // ASC or DESC
                            'lang'     => 'el',
                            'post_status' => "publish",
                            'author__in'  => $user_ids
                        );


        
                        break;
                    case "έδρα_της_επιχείρησης_":
                        $filter_edra_epixirisis[$filter_value] = $filter_value;
                        break;
                    case "nisi_anagki_έδρα":
                        $args['meta_query'][] = array(
                            'key' => 'nisi_anagki_έδρα',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "need_type_buss":
                        $args['meta_query'][] = array(
                            'key' => 'need_type_buss',
                            'value'    => array($filter_value),
                            'compare'    => 'IN'
                        );

                        break;
                }
            }

            $query = new WP_Query($args);
           
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $tipos_anagis = get_field('field_5f6c8a9c515f6', get_the_ID() );
                    $anagkes = get_field('field_5f6c8bc3515f7' ,get_the_ID() );
                    $author_id = get_the_author_meta('ID');
                    um_fetch_user($author_id);
                    $klados_epixirisis = um_user('klados_business');
                    $edra_epixirisis = um_user('business_edra');
                    // um_user('business_description');
                    // um_user('business_employees_num');
                    // um_user('idiotita');
                    // var_dump(get_userdata($author_id));

                    um_reset_user();
                    // if (count($filter_klado_epixirisis) > 0 && !isset($filter_klado_epixirisis[$klados_epixirisis])) {
                    //     continue;
                    // }
                    // if (count($filter_edra_epixirisis) > 0 && !isset($filter_edra_epixirisis[$edra_epixirisis])) {
                    //     continue;
                    // }?>


<div class="col-md-4 sm-2">
    <a href="<?php echo get_permalink(); ?>">
        <div class="card">
            <div class="card-body" style="padding-bottom: 1px;">
                <?php
                            if ($anagkes) { ?>
                <h6 style="color: black;" class="text-left"><?php echo mb_strimwidth(get_the_title(), 0, 80, '...'); ?>
                </h6>
                <?php if($tipos_anagis != 'Άλλο'): ?>
                <p style="color: black;font-weight: normal;text-align: left!important;"><?php echo $tipos_anagis; ?></p>
                <?php endif; ?>
                <?php } ?>

                <?php the_excerpt(); ?>
                <div class="card-footer">
                    <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
                </div>
            </div>
        </div>
    </a>
</div>
<?php endwhile;
                wp_reset_postdata();
            else :
                echo pll__('No posts found');
            endif;
            die();
        }
    }

    add_action('wp_ajax_org_needs_filter', 'org_needs_filter_function');
    add_action('wp_ajax_nopriv_org_needs_filter', 'org_needs_filter_function');
    function org_needs_filter_function()
    {

        if (isset($_POST['action']) && $_POST['action'] == "org_needs_filter") {
            $filter_klado_epixirisis = [];
            $filter_edra_epixirisis = [];
            $args = array(
                'posts_per_page' => -1,
                'post_type'   => 'organizationneed',
                'orderby' => 'date', // we will sort posts by date
                'order'    => 'date', // ASC or DESC
            );
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($_POST as $possible_filter => $filter_value) {
                $possible_filter = explode("/", $possible_filter);
                switch ($possible_filter[0]) {
                    case "κλάδος_επιχείρησης_":
                        $filter_klado_epixirisis[$filter_value] = $filter_value;

                        break;
                    case "έδρα_της_επιχείρησης_":
                        $filter_edra_epixirisis[$filter_value] = $filter_value;
                        break;
                    case "η_επιχείρηση_έχει_παρουσία_σε_άλλα_νησιά_":
                        $args['meta_query'][] = array(
                            'key' => 'η_επιχείρηση_έχει_παρουσία_σε_άλλα_νησιά_',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                        break;
                    case "τύπος__ανάγκης":
                        $args['meta_query'][] = array(
                            'key' => 'need_type_org',
                            'value'    => array($filter_value),
                            'compare'    => 'IN'
                        );

                        break;
                }
            }


            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $tipos_anagis = get_field('field_5f98181c12207');
                    $anagkes = get_field('field_5f98187112208');
                    $author_id = get_the_author_meta('ID');
                    um_fetch_user($author_id);
                    $klados_epixirisis = um_user('klados_business');
                    $edra_epixirisis = um_user('business_edra');

                    um_reset_user();
                    if (count($filter_klado_epixirisis) > 0 && !isset($filter_klado_epixirisis[$klados_epixirisis])) {
                        continue;
                    }
                    if (count($filter_edra_epixirisis) > 0 && !isset($filter_edra_epixirisis[$edra_epixirisis])) {
                        continue;
                    } ?>
<div class="col-md-4 sm-2">
    <a href="<?php echo get_permalink(); ?>">
        <div class="card">
            <div class="card-body" style="padding-bottom: 1px;">
                <?php
                            if ($anagkes) { ?>
                <h6 style="color: black;"><?php echo $tipos_anagis; ?></h6>
                <h6><?php echo $anagkes; ?></h6>
                <?php } ?>

                <?php the_excerpt(); ?>
                <div class="card-footer">
                    <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
                </div>
            </div>
        </div>
    </a>
</div>
<?php endwhile;
                wp_reset_postdata();
            else :
                echo pll__('No posts found');
            endif;
            die();
        }
    }


    add_action('wp_ajax_admin_approve_mentor_user', 'ajax_admin_approve_mentor_user');
    function ajax_admin_approve_mentor_user()
    {
        if (isset($_POST['user_id']) && isset($_POST['result'])) {
            $user_id = $_POST['user_id'];
            $result = $_POST['result'];
            um_fetch_user($user_id);

            if (um_user('mentor_requested')) {

                if ($result == "accept") {
                    if (um_user('linkedin')) {
                        update_user_meta($user_id, "linkedin", um_user("mentor_req_linkedin"));
                    } else {
                        add_user_meta($user_id, "linkedin", um_user("mentor_req_linkedin"), true);
                    }
                    // if (um_user('cv')) {
                    //     update_user_meta($user_id, "cv", um_user("mentor_req_biografiko"));
                    // } else {
                    //     add_user_meta($user_id, "cv", um_user("mentor_req_biografiko"), true);
                    // }
                    if (um_user('idiotita')) {
                        update_user_meta($user_id, "idiotita", um_user("mentor_req_idiotita"));
                    } else {
                        add_user_meta($user_id, "idiotita", um_user("mentor_req_idiotita"), true);
                    }
                    delete_user_meta($user_id, "mentor_requested");
                    $user = new WP_User($user_id);
                    $user->add_role('mentor');
                } else if ($result == "reject") {
                    delete_user_meta($user_id, "mentor_requested");
                }

                //TODO: save these to other UM fields?
                delete_user_meta($user_id, "mentor_req_idiotita");
                delete_user_meta($user_id, "mentor_req_biografiko");
                delete_user_meta($user_id, "mentor_req_linkedin");
            }

            um_reset_user();
        }
        echo "ok";
        wp_die();
    }

    add_action('wp_ajax_new_comment', 'new_comment');
    function display_idea_comments()
    {
        $idea_id = get_the_ID();
        $idea_comments = get_field('field_6003575aadbf3', $idea_id);
        //First, check if the user should be able to see comments section
        $user_id = get_current_user_id();
        $allowed_user_id_list = [];
        $mentors = get_field('field_5fb28b33e10b6', $idea_id);
        $idea_author = get_post_field( 'post_author', $idea_id);
        array_push($allowed_user_id_list,$idea_author);

        if(isset($mentors) && $mentors != ""){
            foreach ($mentors as $mentoras) {
                array_push($allowed_user_id_list,$mentoras["ID"]);
            }
        }
        

        if(array_search($user_id,$allowed_user_id_list) || current_user_can( 'administrator' )){

            ?>
<hr class="horizontal-line">
<h6 class="small_title" style="text-align: left!important;">Σχόλια</h6>
<p> <?php echo pll__("Υποβάλετε τα σχολιά σας"); ?></p>
<div class="row">
    <?php
                    if ($idea_comments && sizeof($idea_comments) > 0) {
                        foreach ($idea_comments as $comment) { ?>
    <div class="col-md-12 comment mt-4 text-justify float-left">
        <img src="<?php echo get_avatar_url($comment["author"]["ID"]); ?>" alt="" class="rounded-circle" width="40"
            height="40">

        <h4><?php echo $comment["author"]["nickname"]; ?></h4>
        <span color="#90192">
            <?php 
                                        $author_role = get_userdata($comment["author"]["ID"]);
                                        if(in_array('mentor', $author_role->roles)){
                                            echo "Μέντορας";
                                        }else if(in_array("administrator", $author_role->roles)){
                                            echo "Administrator";
                                        }else if(in_array("member", $author_role->roles)){
                                            echo "Μέλος";
                                        }else if(in_array("judge", $author_role->roles)){
                                            echo "Αξιολογητής";
                                        }
                                    ?>
        </span>
        <span> - <font color="#909192"><?php echo $comment['date_submited']; ?></font></span>
        <br><br>
        <p><?php echo $comment["message"]; ?></p>
    </div>
    <?php }
                    } ?>
    <div class="col-md-12 comment mt-4 text-justify float-left">
        <img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="" class="rounded-circle" width="40"
            height="40">
        <h4><?php echo wp_get_current_user()->data->user_nicename; ?></h4> <br><br><br>
        <?php wp_editor("", "new_comment", ["textarea_rows" => 6]); ?>
        <div id="new_comment"></div>

        <button onclick="submitComment(<?php echo $idea_id; ?>)" class="primary_btn float-right"
            style="margin:2rem auto 1rem;"><?php echo pll__("Submit");?></button>
    </div>


    <script>
        function submitComment(idea_id) {
            try {
                let text = tinymce.activeEditor.getContent();
                jQuery.ajax({
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    method: "post",
                    data: {
                        action: "new_comment",
                        idea_id: idea_id,
                        text: text
                    },
                    beforeSend: function (xhr) {
                        // filter.find('span').text('Processing...'); // changing the button label
                    },
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function (error) {
                        //handle error
                        console.log(error)
                    }
                });
            } catch (error) {
                //TODO: handle error
            }

        }
    </script>
</div>
<?php }
    }

    function updateStage(){
        $idea_id = $_POST['id'];
        $stage_value = $_POST['value'];

        if($idea_id == NULL || $stage_value == NULL){
            return;
        }
        
        update_field('field_606b25a92f75a', $stage_value, $idea_id);
        wp_send_json_success(array('id' => $idea_id));

        die();
    }
    add_action('wp_ajax_updateStage_action', 'updateStage');

    function updateMentor(){
        $idea_id = (int)$_POST['id'];
        $mentor_value = $_POST['value'];
        

        if($idea_id == NULL){
            return;
        }

            update_field('field_5fb28b33e10b6', $mentor_value, $idea_id );

        wp_send_json_success(array('id' => $idea_id));

        die();
    }
    add_action('wp_ajax_changeMentors', 'updateMentor');

    function updateInterest(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $cv = $_POST['cv'];
        $post_id = $_POST['id'];
        $user_cv= um_user('user_biography');
        $the_current_user = get_current_user_id(); 
        $description = $_POST['description'];
        $timestamp = $_POST['timestamp'];

        $row = array(
            'interest_name'         => $name,
            'interest_email'        => $email,
            'interest_phone'        => $phone_number,
            'interest_bio'          => $cv,
            'interest_description'  => $description,
            'interest_date'         => $timestamp
        );

        add_row('field_6076a8fed5da8', $row, $post_id);

        if(!$user_cv){
            update_user_meta( $the_current_user, 'user_biography', $cv);
        }
    
        die();
    }
    add_action('wp_ajax_showInterest_action', 'updateInterest');

    function get_words($string, $words)
    {
        /**
         * We explode the string into an array of words,
         * then slice it and reduce it to a new array of
         * only the number of words that we want, and then
         * we implode and join all word array elements into a final string.
         */
        $reduced_string = explode(' ', $string);
        $length = sizeof($reduced_string); 
        $extra = ($length>$words)? '...': '';
        $reduced_string = implode(' ', array_slice($reduced_string, 0, $words)) . $extra;
        return $reduced_string;
    }

    function showInterestTable(){
        $need_id = $_POST['id'];
        $author_id = get_post_field('post_author', $need_id);
        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
        $author_email = get_the_author_meta( 'user_email' , $author_id ); 

        if( have_rows('field_6076a8fed5da8', $need_id )){
            while( have_rows('field_6076a8fed5da8', $need_id ) ){
                the_row();
                $name = get_sub_field('field_6076a978d5da9' , $need_id);
                $email = get_sub_field('field_6076a9abd5daa' , $need_id);
                $phone_number = get_sub_field('field_6076a9f7d5dab' , $need_id);
                $cv = get_sub_field('field_6076aa11d5dac' , $need_id);
                $description = get_sub_field('field_6076ed5de6512' , $need_id);
                $submition_date = get_sub_field('field_6076f92652cbc' , $need_id); 
                
                $user_id = email_exists($email);
                $user_display_name = get_user_meta($user_id,'nickname',true); ?>

<tr>
    <td> <a href="<?php echo get_home_url();?>/user/<?php echo $user_display_name;?>"> <?php echo $name; ?> <a> </td>
    <td> <?php echo $email; ?> </td>
    <td> <?php echo $phone_number; ?> </td>
    <!-- <td style="width:60%;"> < echo get_words( $cv, 10); ?> </td> -->
    <td style="width:60%;"> <?php echo $description ?> </td>
    <td> <?php echo $submition_date; ?> </td>
    <td class="text-center"> <a
            href="<?php echo get_home_url();?>/wp-admin/post.php?post=<?php echo $need_id;?>&action=edit"
            target="_blank"> <i class="fas fa-user-cog"></i> <a> </td>
    <td> <?php echo $display_name; ?> </td>
    <td> <?php echo $author_email; ?> </td>
</tr>

<?php }
        }

        die();
    }
    add_action('wp_ajax_showInterestTable_action', 'showInterestTable');
    add_action('wp_ajax_nopriv_showInterestTable_action', 'showInterestTable');

    function updateJudges(){
        $idea_id = (int)$_POST['id'];
        $judge_value = $_POST['value'];
        

        if($idea_id == NULL){
            return;
        }

            update_field('field_6089522293e90', $judge_value, $idea_id );

        wp_send_json_success(array('id' => $idea_id));

        die();
    }
    add_action('wp_ajax_changeJudges', 'updateJudges');
    
    function sendEvaluation(){
        $originality   = (int)$_POST['originality'];
        $feasibility   = (int)$_POST['feasibility'];
        $completeness  = (int)$_POST['completeness'];
        $extroversion  = (int)$_POST['extroversion'];
        $promotion     = (int)$_POST['promotion'];
        $idea_notes     = $_POST['idea_notes'];
        $idea_id       = (int)$_POST['id'];
        $judge_id      = (int)$_POST['judge_id'];
        
        $judge_name = get_user_meta( $judge_id, 'nickname', true);
        
        $row = array(
            'originality'  => $originality,
            'feasibility'  => $feasibility,
            'completeness' => $completeness,
            'extroversion' => $extroversion,
            'promotion'    => $promotion,
            'notes'    => $idea_notes,
            'judge_name'    => $judge_name,
        ); 

        add_row('field_608a82860f21b', $row, $idea_id);
        
        // var_dump($judge_name);
        // var_dump($feasibility);
        // var_dump($extroversion);
        // var_dump($completeness);
        // var_dump($promotion);
        // var_dump($idea_id);

        die();
    }
    add_action('wp_ajax_sendEvaluation_action', 'sendEvaluation');
    function showEvaluation(){
        $idea_id = (int)$_POST['id'];
        $idea_author_id = get_post_field( 'post_author' , $idea_id);
        $idea_author_name = get_the_author_meta( 'display_name', $idea_author_id );
        $stage = get_field('field_606b25a92f75a',$idea_id);
        $idea_final_score;
        $judge_username;
        $judge_email;
        $i;

        $count_rows = count(get_field('field_608a82860f21b',$idea_id));
        
        if( have_rows('field_608a82860f21b', $idea_id )){
            while( have_rows('field_608a82860f21b', $idea_id ) ){
                the_row();
                $judge_username = get_sub_field('field_608aaab6c90e0',$idea_id);
                $user = get_user_by( 'login', $judge_username );
                $judge_email = $user->user_email;
                $idea_originality = get_sub_field('field_608a7c0b86c00',$idea_id);
                $idea_feasibility = get_sub_field('field_608a7d8786c03',$idea_id);
                $idea_completeness = get_sub_field('field_608a7d8d86c06',$idea_id);
                $idea_extroversion = get_sub_field('field_608a7d9386c09',$idea_id);
                $idea_promotion = get_sub_field('field_608a7d9886c0c',$idea_id);
                $idea_final_score = $idea_originality + $idea_feasibility + $idea_completeness + $idea_extroversion + $idea_promotion; 
                $idea_notes = get_sub_field('field_6092add2fcd42',$idea_id); 
                $aniki_se_diagonismo = get_field('field_5ef9acb911334',$idea_id);
                $thematiki_perioxi = $aniki_se_diagonismo['θεματική']; 
                $katigoria = $aniki_se_diagonismo['category'];
                $i++;
                ?>

<tr>
    <td class="full_notes" style="display:none"> <?php echo esc_attr($idea_notes); ?> </td>
    <td> <a href="<?php echo get_home_url();?>/user/<?php echo $judge_username;?>"> <?php echo $judge_username; ?> </a>
    </td>
    <td> <?php echo $judge_email; ?> </td>
    <td> <?php echo $idea_originality; ?> </td>
    <td> <?php echo $idea_feasibility; ?> </td>
    <td> <?php echo $idea_completeness; ?> </td>
    <td> <?php echo $idea_extroversion; ?> </td>
    <td> <?php echo $idea_promotion; ?> </td>
    <td class="text-center"> <?php echo $idea_final_score; ?> </td>
    <td>
        <?php echo mb_substr($idea_notes, 0 , 20)?>
        <?php if(strlen(esc_attr($idea_notes)) > 20): ?>
        <?php echo '...' ?>
        <a class="button-readmore" data-toggle="modal" data-target="#exampleModalLong" src="#">
            Περισσότερα
        </a>
        <?php endif; ?>
    </td>
    <td> <a href="<?php echo get_home_url();?>/user/<?php echo $idea_author_name;?>"> <?php echo $idea_author_name; ?>
        </a> </td>
    <td> <?php echo $thematiki_perioxi->post_title; ?> </td>
    <td> <?php echo mb_substr($katigoria->post_title , 10 , 1 , "UTF-8"); ?> </td>
    <td> <?php echo $stage;?> </td>
</tr>

<?php } ?>
<script>
    jQuery(document).ready(function ($) {
        jQuery('.button-readmore').on('click', function () {
            let modal = $(this).closest('tr').find('.full_notes').text();
            jQuery('.read-more').empty().append(modal);
        });
    })
</script>
<?php }
        
        // var_dump($idea_id);
        // var_dump($idea_author_name);
        // var_dump($judge_username);
        // var_dump($judge_email);
        // var_dump($idea_final_score);

        die();
    }
    add_action('wp_ajax_showEvaluation_action', 'showEvaluation');
    add_action('wp_ajax_nopriv_showEvaluation_action', 'showEvaluation');

    function SendEvaluationEmail(){

        $idea_id = $_POST['id'];
        $button_state = $_POST['state'];
        $author_id = get_post_field('post_author', $idea_id);
        $author_email = get_the_author_meta('user_email', $author_id );
        $evaluation = [];

        $stages = get_field_object('field_606b25a92f75a',$idea_id);
        $current_stage = $stages['value'];
        $stage_choices = $stages['choices'];

        if( have_rows('field_608a82860f21b', $idea_id )){
            while( have_rows('field_608a82860f21b', $idea_id ) ){
                the_row();

                $idea_originality = get_sub_field('field_608a7c0b86c00',$idea_id);
                $idea_feasibility = get_sub_field('field_608a7d8786c03',$idea_id);
                $idea_completeness = get_sub_field('field_608a7d8d86c06',$idea_id);
                $idea_extroversion = get_sub_field('field_608a7d9386c09',$idea_id);
                $idea_promotion = get_sub_field('field_608a7d9886c0c',$idea_id);

                $idea_notes = get_sub_field('field_6092add2fcd42',$idea_id);

                // $evaluation['idea_originality']     = $idea_originality;
                // $evaluation['idea_feasibility']     = $idea_feasibility;
                // $evaluation['idea_completeness']    = $idea_completeness;
                // $evaluation['idea_extroversion']    = $idea_extroversion;
                // $evaluation['idea_promotion']       = $idea_promotion;
                // $evaluation['idea_notes']           = $idea_notes;

                $evaluation[] = get_row();
            }
        }

        $to = $author_email;
        $subject = 'Αποτέλεσμα Αξιολόγησης';
        
        if($button_state == 'failure'){
            $template = "email_templates/EvaluationNoPass.php";

        }

        if($button_state == 'success'){
            $template = "email_templates/EvaluationResults.php";
            //Don't change the stage of the idea if it is in the last stage
            if( $current_stage != '4ο στάδιο - Εξέλιξη ομάδων'){
                
                $keys = array_keys($stage_choices);
                $next_stage = $keys[array_search($current_stage,$keys)+1];

                //Update the field with the new current stage
                update_field('field_606b25a92f75a', $next_stage, $idea_id);
            }

        }

        send_email($to, $subject, $template, $evaluation );
        die();
    }
    add_action('wp_ajax_sendEmail_action', 'SendEvaluationEmail');