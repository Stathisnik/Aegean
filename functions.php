<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);


function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get('Version'));
    wp_enqueue_style('child-style2', get_stylesheet_directory_uri() . '/style2.css', array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), $the_theme->get('Version'), true);
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_filter('acf/validate_value/name=validate_this_image', 'my_acf_validate_value', 10, 4);

function enqueue_my_script(){
    wp_enqueue_script( 'inview', get_stylesheet_directory_uri() . '/js/jquery.inview.js', array(), true );
    // wp_enqueue_script( 'select2', get_stylesheet_directory_uri() . '/js/select2.min.js', array(), true );
}
function datatables_scripts_in_head(){
    wp_enqueue_script('datatables', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js', array('jquery') );
    wp_localize_script( 'datatables', 'datatablesajax', array('url' => admin_url('admin-ajax.php')) );
    wp_enqueue_style('datatables', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_script' );
add_action('wp_enqueue_scripts', 'datatables_scripts_in_head');
function my_acf_validate_value($valid, $value, $field, $input)
{

    // bail early if value is already invalid
    if (!$valid) {

        return $valid;
    }


    // load data

    $my_text_field = field_5ef9add15ce6c('text_field');

    if (strlen($my_text_field) < 10) {

        $valid = 'Must be a minimum of 10 characters.';
    }


    // return
    return $valid;
}


function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            width: 300px;
            background-image: url(<?php echo get_home_url(); ?>/wp-content/uploads/2020/06/cp_logo__horizontal_large.png);
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
    <?php }
add_action('login_enqueue_scripts', 'my_login_logo');

add_action('after_setup_theme', 'add_child_theme_textdomain');

if (!function_exists('competitions')) {

    // Register Custom Post Type
    function competitions()
    {

        $labels = array(
            'name'                  => _x('competitions', 'Post Type General Name', 'competitions'),
            'singular_name'         => _x('competitions', 'Post Type Singular Name', 'competitions'),
            'menu_name'             => __('Διαγωνισμοί', 'competitions'),
            'name_admin_bar'        => __('Διαγωνισμοί', 'competitions'),
            'archives'              => __('', 'competitions'),
            'attributes'            => __('Διαγωνισμοί', 'competitions'),
            'parent_item_colon'     => __('Διαγωνισμός', 'competitions'),
            'all_items'             => __('Διαγωνισμοί', 'competitions'),
            'add_new_item'          => __('Διαγωνισμός', 'competitions'),
            'add_new'               => __('Νέος Διαγωνισμός', 'competitions'),
            'new_item'              => __('Νέος Διαγωνισμός', 'competitions'),
            'edit_item'             => __('Επεξεργασία Διαγωνισμού', 'competitions'),
            'update_item'           => __('Ενημέρωση Διαγωνισμού', 'competitions'),
            'view_item'             => __('Προβολή Διαγωνισμού', 'competitions'),
            'view_items'            => __('Προβολή Διαγωνισμών', 'competitions'),
            'search_items'          => __('Αναζήτηση Διαγωνισμών', 'competitions'),
            'not_found'             => __('', 'competitions'),
            'not_found_in_trash'    => __('', 'competitions'),
            'featured_image'        => __('Featured Image', 'competitions'),
            'set_featured_image'    => __('Set featured image', 'competitions'),
            'remove_featured_image' => __('Remove fatured image', 'competitions'),
            'use_featured_image'    => __('Use as featured image', 'competitions'),
            'insert_into_item'      => __('Insert into item', 'competitions'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'competitions'),
            'items_list'            => __('Items list', 'competitions'),
            'items_list_navigation' => __('Items list navigation', 'competitions'),
            'filter_items_list'     => __('Filter items list', 'competitions'),
        );
        $args = array(
            'label'                 => __('competition', 'competitions'),
            'description'           => __('competitions', 'competitions'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('competitions'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('competition', $args);
    }
    add_action('init', 'competitions', 0);
}
function acf_title_competition($value, $post_id, $field)
{
    if (get_post_type($post_id) == 'competition') {
        $action_title = get_field('field_5fb3e228cb8b4', $post_id);
        $description = get_field('field_5fb3e240cb8b5', $post_id);
        wp_update_post(
            array(
                'ID'         => $post_id,
                'post_title' => $action_title,
                'post_content' => $description
            )
        );
    }
    return $value;
}
add_filter('acf/update_value', 'acf_title_competition', 10, 3);

if (!function_exists('business_ideas')) {

    // Register Custom Post Type
    function business_ideas()
    {

        $labels = array(
            'name'                  => _x('business ideas', 'Post Type General Name', 'business ideas'),
            'singular_name'         => _x('business ideas', 'Post Type Singular Name', 'business ideas'),
            'menu_name'             => __('Επιχειρηματικές ιδέες', 'business ideas'),
            'name_admin_bar'        => __('business ideas', 'business ideas'),
            'archives'              => __('', 'business ideas'),
            'attributes'            => __('business ideas', 'business ideas'),
            'parent_item_colon'     => __('business idea', 'business ideas'),
            'all_items'             => __('business ideas', 'business ideas'),
            'add_new_item'          => __('business idea', 'business ideas'),
            'add_new'               => __('Add New business idea', 'business ideas'),
            'new_item'              => __('New Item business idea', 'business ideas'),
            'edit_item'             => __('Edit It business idea', 'business ideas'),
            'update_item'           => __('Update Item business idea', 'business ideas'),
            'view_item'             => __('View Item business idea', 'business ideas'),
            'view_items'            => __('View Items business ideas', 'business ideas'),
            'search_items'          => __('Search business idea', 'business ideas'),
            'not_found'             => __('', 'business ideas'),
            'not_found_in_trash'    => __('', 'business ideas'),
            'featured_image'        => __('Featured Image', 'business ideas'),
            'set_featured_image'    => __('Set featured image', 'business ideas'),
            'remove_featured_image' => __('Remove fatured image', 'business ideas'),
            'use_featured_image'    => __('Use as featured image', 'business ideas'),
            'insert_into_item'      => __('Insert into item', 'business ideas'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'business ideas'),
            'items_list'            => __('Items list', 'business ideas'),
            'items_list_navigation' => __('Items list navigation', 'business ideas'),
            'filter_items_list'     => __('Filter items list', 'business ideas'),
        );
        $args = array(
            'label'                 => __('business idea', 'business ideas'),
            'description'           => __('business ideas', 'business ideas'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('business idea'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('businessidea', $args);
    }
    add_action('init', 'business_ideas', 0);
}

//Set Title For Βusiness Ιdeas
function acf_title_businessidea($value, $post_id, $field)
{   
    if (get_post_type($post_id) == 'businessidea') {
        $businessidea_title = get_field('field_5ef9a8fe847ec', $post_id);
        wp_update_post(
            array(
                'ID'         => $post_id,
                'post_title' => "" . $businessidea_title,

            )
        );
    }
    return $value;
}
add_filter('acf/update_value', 'acf_title_businessidea', 10, 3);

add_action('acf/save_post', 'my_save_post');
function my_save_post($post_id)
{

    // bail early if not a contact_form post
    if (get_post_type($post_id) !== 'businessidea') {

        return;
    }


    // bail early if editing in admin
    if (is_admin()) {

        return;
    }


    // vars
    // $post = get_post( $post_id );


    // // get custom fields (field group exists for content_form)
    // $name = get_field('τίτλος_επιχειρηματικής_ιδεας', $post_id);
    // $email = get_field('email_μέλους_2', $post_id);


    // // email data
    // $to = 'tsetsisc@crowdpolicy.com';
    // $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
    // $subject = $post->post_title;
    // $body = $post->post_content;


    // send email
    wp_mail($to, $subject, $body, $headers);
}

if (!function_exists('actions')) {

    // Register Custom Post Type
    function actions()
    {

        $labels = array(
            'name'                  => _x('Actions', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Action', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Δράσεις', 'text_domain'),
            'name_admin_bar'        => __('actions', 'text_domain'),
            'archives'              => __('actions', 'text_domain'),
            'attributes'            => __('actions', 'text_domain'),
            'parent_item_colon'     => __('action', 'text_domain'),
            'all_items'             => __('actions', 'text_domain'),
            'add_new_item'          => __('Add action', 'text_domain'),
            'add_new'               => __('Add New action', 'text_domain'),
            'new_item'              => __('New Item action', 'text_domain'),
            'edit_item'             => __('Edit Item', 'text_domain'),
            'update_item'           => __('Update Item', 'text_domain'),
            'view_item'             => __('View Item', 'text_domain'),
            'view_items'            => __('View Items', 'text_domain'),
            'search_items'          => __('Search Item', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Action', 'text_domain'),
            'description'           => __('actions', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('action', $args);
    }
    add_action('init', 'actions', 0);
}

//Set Title For Actions
function acf_title_action($value, $post_id, $field)
{

    if (get_post_type($post_id) == 'action') {
        
        $action_title = get_field('field_5f057b8a1da3e', $post_id);
        wp_update_post(
            array(
                'ID'         => $post_id,
                'post_title' => "" . $action_title,

            )
        );
    }
    return $value;
}
add_filter('acf/update_value', 'acf_title_action', 10, 3);

if (!function_exists('business_needs')) {

    // Register Custom Post Type
    function business_needs()
    {

        $labels = array(
            'name'                  => _x('Business needs', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Business need', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Ανάγκες Επιχείρησης', 'text_domain'),
            'name_admin_bar'        => __('business needs', 'text_domain'),
            'archives'              => __('business needs', 'text_domain'),
            'attributes'            => __('business needs', 'text_domain'),
            'parent_item_colon'     => __('business need', 'text_domain'),
            'all_items'             => __('business needs', 'text_domain'),
            'add_new_item'          => __('Add business need', 'text_domain'),
            'add_new'               => __('Add New business need', 'text_domain'),
            'new_item'              => __('New Item business need', 'text_domain'),
            'edit_item'             => __('Edit It business need', 'text_domain'),
            'update_item'           => __('Update Item business need', 'text_domain'),
            'view_item'             => __('View Item business need', 'text_domain'),
            'view_items'            => __('View Items business need', 'text_domain'),
            'search_items'          => __('Search business need', 'text_domain'),
            'not_found'             => __('', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Business need', 'text_domain'),
            'description'           => __('business need', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('businessneed', $args);
    }
    add_action('init', 'business_needs', 0);
}

//Set Title For Βusiness Needs
function acf_title_businessneed($value, $post_id, $field)
{
    if (get_post_type($post_id) == 'businessneed') {
        $businessneed_title = get_field('field_6017eb3b78b2c', $post_id);
        wp_update_post(
            array(
                'ID'         => $post_id,
                'post_title' => $businessneed_title,

            )
        );
    }
    return $value;
}
add_filter('acf/update_value', 'acf_title_businessneed', 10, 3);


if (!function_exists('organization_needs')) {

    // Register Custom Post Type
    function organization_needs()
    {

        $labels = array(
            'name'                  => _x('Organization needs', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Organization need', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Ανάγκες Οργανισμού', 'text_domain'),
            'name_admin_bar'        => __('organization needs', 'text_domain'),
            'archives'              => __('organization needs', 'text_domain'),
            'attributes'            => __('organization needs', 'text_domain'),
            'parent_item_colon'     => __('organization need', 'text_domain'),
            'all_items'             => __('organization needs', 'text_domain'),
            'add_new_item'          => __('Add organization need', 'text_domain'),
            'add_new'               => __('Add New organization need', 'text_domain'),
            'new_item'              => __('New Item organization need', 'text_domain'),
            'edit_item'             => __('Edit It organization need', 'text_domain'),
            'update_item'           => __('Update Item organization need', 'text_domain'),
            'view_item'             => __('View Item organization need', 'text_domain'),
            'view_items'            => __('View Items organization need', 'text_domain'),
            'search_items'          => __('Search organization need', 'text_domain'),
            'not_found'             => __('', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Οrganization need', 'text_domain'),
            'description'           => __('organization need', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('organizationneed', $args);
    }
    add_action('init', 'organization_needs', 0);
}
// Thematikes cpt

if (!function_exists('thematikes')) {

    // Register Custom Post Type
    function thematikes()
    {

        $labels = array(
            'name'                  => _x('Θεματικές', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('thematikes', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Θεματικές', 'text_domain'),
            'name_admin_bar'        => __('Θεματικές', 'text_domain'),
            'archives'              => __('', 'text_domain'),
            'attributes'            => __('Θεματικές', 'text_domain'),
            'parent_item_colon'     => __('Θεματική', 'text_domain'),
            'all_items'             => __('Θεματικές', 'text_domain'),
            'add_new_item'          => __('Θεματική', 'text_domain'),
            'add_new'               => __('Νέα θεματική', 'text_domain'),
            'new_item'              => __('Νέα θεματική', 'text_domain'),
            'edit_item'             => __('Επεξεργασία θεματικής', 'text_domain'),
            'update_item'           => __('Ενημέρωση θεματικής', 'text_domain'),
            'view_item'             => __('Προβολή θεματικής', 'text_domain'),
            'view_items'            => __('Προβολή θεματικών', 'text_domain'),
            'search_items'          => __('Αναζήτηση θεματικών', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('thematiki', 'text_domain'),
            'description'           => __('thematikes', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'supports'              => array('title', 'editor', 'thumbnail'),
        );
        register_post_type('thematiki', $args);
    }
    add_action('init', 'thematikes', 0);
}



// Katigories cpt

if (!function_exists('katigories')) {

    // Register Custom Post Type
    function katigories()
    {

        $labels = array(
            'name'                  => _x('Κατηγορίες', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('katigories', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Κατηγορίες', 'text_domain'),
            'name_admin_bar'        => __('Κατηγορίες', 'text_domain'),
            'archives'              => __('', 'text_domain'),
            'attributes'            => __('Κατηγορίες', 'text_domain'),
            'parent_item_colon'     => __('Κατηγορία', 'text_domain'),
            'all_items'             => __('Κατηγορίες', 'text_domain'),
            'add_new_item'          => __('Κατηγορία', 'text_domain'),
            'add_new'               => __('Νέα κατηγορία', 'text_domain'),
            'new_item'              => __('Νέα κατηγορία', 'text_domain'),
            'edit_item'             => __('Επεξεργασία κατηγορίας', 'text_domain'),
            'update_item'           => __('Ενημέρωση κατηγορίας', 'text_domain'),
            'view_item'             => __('Προβολή κατηγορίας', 'text_domain'),
            'view_items'            => __('Προβολή κατηγοριών', 'text_domain'),
            'search_items'          => __('Αναζήτηση κατηγοριών', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('katigoria', 'text_domain'),
            'description'           => __('katigories', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('katigoria', $args);
    }
    add_action('init', 'katigories', 0);
}

///////////////////////////////////////////////////////////////////////       
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
                    case "ανήκει_σε_διαγωνισμό_":
                        $args['meta_query'][] = array(
                            'key' => 'ανήκει_σε_διαγωνισμό__select2',
                            'compare' => '=',
                            'value' => $filter_value
                        );
                    break;
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


                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 sm-2">
                    <div class="card">
                        <div class="idea-image">
                            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', array('class' => 'rounded')); ?>
                            <img src="<?php echo $thumb[0]; ?>" />
                        </div>
                        <div class="card-body">
                            <h6><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <?php the_content(); ?>
                            <div class="card-footer">
                                <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
                            </div>
                            <!-- <a href="<?php echo get_permalink($query->ID); ?>">
                                <p class="read-more-text">Περισσότερα ><p>
                              </a> -->
                        </div>
                    </div>
                </div> <?php
                    endwhile;
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
                        case "κλάδος_επιχείρησης_":
                            $filter_klado_epixirisis[$filter_value] = $filter_value;
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
                        $tipos_anagis = get_field('field_5f6c8a9c515f6');
                        $anagkes = get_field('field_5f6c8bc3515f7');
                        $author_id = get_the_author_meta('ID');
                        um_fetch_user($author_id);
                        $klados_epixirisis = um_user('klados_business');
                        $edra_epixirisis = um_user('business_edra');
                        // um_user('business_description');
                        // um_user('business_employees_num');
                        // um_user('idiotita');
                        // var_dump(get_userdata($author_id));

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
                                    <h6 style="color: black;" class="text-left"><?php echo mb_strimwidth(get_the_title(), 0, 80, '...'); ?></h6>
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




        add_filter('posts_where', 'jb_filter_acf_meta');
        function jb_filter_acf_meta($where)
        {
            $where = str_replace('meta_key = \'ανάγκες_$_τυπος_αναγκης_', "meta_key LIKE 'ανάγκες_%_τυπος_αναγκης_", $where);
            $where = str_replace('meta_key = \'ανάγκες_$_τύπος__ανάγκης', "meta_key LIKE 'ανάγκες_%_τύπος__ανάγκης", $where);
            return $where;
        }

        function logged_text($content)
        {

            $content = str_replace('Keep me signed in', 'Μείνε Συνδεδεμένος', $content);
            return $content;
        }
        add_filter('gettext', 'logged_text');

        function forgot_text($content)
        {

            $content = str_replace('Forgot your password?', 'Ξέχασες τον κωδικό σου;', $content);
            return $content;
        }
        add_filter('gettext', 'forgot_text');

        //User Roles

        //User Role:Member
        add_role(
            'member', //  System name of the role.
            __('Μέλος'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        // //User Role: Friend
        add_role(
            'friend', //  System name of the role.
            __('Φίλος'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        // //User Role: Mentor
        add_role(
            'mentor', //  System name of the role.
            __('Μέντορας'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        // //User Role: judge
        add_role(
            'judge', //  System name of the role.
            __('Αξιολογητής'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        // //User Role: Business
        add_role(
            'business', //  System name of the role.
            __('Επιχείριση'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        // //User Role: Organizations
        add_role(
            'organizations', //  System name of the role.
            __('Οργανισμός'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        //User Role: Aegean Admins
        add_role(
            'aegean_admin', //  System name of the role.
            __('Διαχειριστής Πανεπ'), // Display name of the role.
            array(
                'read'  => true,
                'delete_posts'  => true,
                'delete_published_posts' => true,
                'edit_posts'   => true,
                'publish_posts' => true,
                'upload_files'  => true,
                'edit_pages'  => true,
                'edit_published_pages'  =>  true,
                'publish_pages'  => true,
                'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
            )
        );

        /**
         * Customize the Favorites Listing HTML
         */
        add_filter('favorites/list/listing/html', 'custom_favorites_listing_html', 10, 4);
        function custom_favorites_listing_html($html, $markup_template, $post_id, $list_options)
        {
            $post = get_post($post_id);
            $permalink = get_the_permalink($post);
            $post_status = $post->post_status == 'draft' ? '[Draft]' : null;
            $image = get_field('field_5f00afdb6b723',  $post->ID)['φωτογραφίες'] ? get_field('field_5f00afdb6b723',  $post->ID)['φωτογραφίες'] : get_stylesheet_directory_uri() . '/img/aegean_feature_img-idea.png';

            $html    = '<div>';
            $html   .= '<div class="card idea-card">';
            $html   .= '<a href="'.$permalink.'">';
            $html   .= '<div class="card-body">';

            $html   .= '<div class="sec-ideas-img" style="background-image: url(\'' . $image . '\');"></div>';
            $html   .= '<h5 class="card-title-news">' . $post_status . ' ' .  $post->post_title . '</h5>';
            $html   .= '</div>';
            $html   .= '</a>';
            $html   .= '<div class="card-footer" style="padding: 1.25rem;">';
            $html   .= '<small class="text-muted">' . get_the_date('d/m/y', $post->ID) . '</small>';
            $html   .= '</div>';

            
            $html   .= '</div>';
            $html   .= '</div>';

            return $html;
        }

        //Create options page for Logos

        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title'     => 'Theme General Settings',
                'menu_title'    => 'Λογότυπο Χορηγών',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'        => false
            ));
        }

        //Create options page for Κοινότητα

        if (function_exists('acf_add_options_page')) {
            
            acf_add_options_page(array(
                'page_title'     => 'Η Κοινότητα',
                'menu_title'    =>  'Η Κοινότητα',
                'menu_slug'     => 'theme-general-sttngs',
                'capability'    => 'edit_posts',
                'redirect'        => false
            ));
        }

        //Create options page for "Μετρήσεις"
        if (function_exists('acf_add_options_page')) {
            
            acf_add_options_page(array(
                'page_title'     => 'Μετρήσεις',
                'menu_title'    =>  'Μετρήσεις',
                'menu_slug'     => 'theme-general-settings-measurements',
                'capability'    => 'edit_posts',
                'redirect'        => false
            ));
        }

         //Create options page for Φωτογραφίες και Βίντεο

        //  if (function_exists('acf_add_options_page')) {
            
        //     acf_add_options_page(array(
        //         'page_title'     => 'Φωτογραφίες και Βίντεο',
        //         'menu_title'    =>  'Φωτογραφίες και Βίντεο',
        //         'menu_slug'     => 'theme-general-settings-general',
        //         'capability'    => 'edit_posts',
        //         'redirect'        => false
        //     ));
        // }


       
        add_action('um_user_login', 'my_user_login', 10, 1);
        function my_user_login($args)
        {
            $profile_id = um_profile_id();
            wp_redirect('/user/');
        }

        function mytheme_custom_excerpt_length($length)
        {
            return 5;
        }
        add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);

        function catch_that_image()
        {
            global $post, $posts;
            $first_img = '';
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
            if (isset($matches[1]) && isset($matches[1][0])) {
                $first_img = $matches[1][0];
            }
            if (empty($first_img)) {
                $first_img = get_stylesheet_directory_uri() . "/img/aegean_feature_img.jpg";
            }
            return $first_img;
        }


        function catch_news_image()
        {
            $args = array(
                'post_type' => 'post',
                'numberposts' => 3,
                'category' => 6
            );

            $news = get_posts($args);
            foreach ($news as $new) {
                $newscontent = $new->post_content;
                $first_img = '';
                ob_start();
                ob_end_clean();
                $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $newscontent, $matches);
                $first_img = $matches[1][0];

                if (empty($first_img)) {
                    $first_img = "/path/to/default.png";
                }
            }
            return $first_img;
        }

        function pagination($pages = '', $range = 4)
        {
            $showitems = ($range * 2) + 1;

            global $paged;
            if (empty($paged)) $paged = 1;

            if ($pages == '') {
                global $wp_query;
                $pages = $wp_query->max_num_pages;
                if (!$pages) {
                    $pages = 1;
                }
            }

            if (1 != $pages) {
                echo "<div class=\"pagination\"><span>Page " . $paged . " of " . $pages . "</span>";
                if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
                if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

                for ($i = 1; $i <= $pages; $i++) {
                    if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                        echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
                    }
                }

                if ($paged < $pages && $showitems < $pages) echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
                if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
                echo "</div>\n";
            }
        }

        add_action('init', function () {
            foreach (acf_get_field_groups() as $group) {
                $fields = acf_get_fields($group['ID']);
                if (is_array($fields) && count($fields)) {
                    foreach ($fields as &$field) {
                        if ($field['type'] == "select") {
                            foreach ($field['choices'] as $choice) {
                                pll_register_string('form_field_group' . $group['ID'] . '_choice_' . $choice . '_' . $field['name'], $choice, 'acf_form_fields');
                            }
                        }

                        if ($field['type'] == "group" || $field['type'] == "repeater") {
                            foreach ($field['sub_fields'] as &$sub_field) {
                                if ($sub_field['type'] == 'select') {
                                    foreach ($sub_field['choices'] as $choice) {
                                        pll_register_string('form_field_group' . $field['ID'] . '_choice_' . $choice . '_' . $sub_field['name'], $choice, 'acf_form_fields');
                                    }
                                }
                                pll_register_string('form_field_group' . $field['ID'] . '_instructions_' . $sub_field['name'], $sub_field['instructions'], 'acf_form_fields');
                                pll_register_string('form_field_group' . $field['ID'] . '_label_' . $sub_field['name'], $sub_field['label'], 'acf_form_fields');

                                if ($sub_field['type'] == "group") {
                                    foreach ($sub_field['sub_fields'] as &$sub2_field) {
                                        if ($sub2_field['type'] == 'select') {
                                            foreach ($sub2_field['choices'] as $choice) {
                                                pll_register_string('form_field_group' . $field['ID'] . '_choice_' . $choice . '_' . $sub2_field['name'], $choice, 'acf_form_fields');
                                            }
                                        }
                                        pll_register_string('form_field_group' . $field['ID'] . '_instructions_' . $sub2_field['name'], $sub2_field['instructions'], 'acf_form_fields');
                                        pll_register_string('form_field_group' . $field['ID'] . '_label_' . $sub2_field['name'], $sub2_field['label'], 'acf_form_fields');
                                    }
                                    
                                }
                            }
                        }
                        pll_register_string('form_field_group' . $group['ID'] . '_instructions_' . $field['name'], $field['instructions'], 'acf_form_fields');
                        pll_register_string('form_field_group' . $group['ID'] . '_label_' . $field['name'], $field['label'], 'acf_form_fields');
                    }
                }
            }
            pll_register_string('archive_competition_title', "Διαγωνισμοί!", 'archive_competition');
            pll_register_string('archive_competition_title', "Διαγωνισμοί που υποστηρίζουν την θεματική περιοχή", 'archive_competition');
            pll_register_string('home_call_to_action', "Υποστήριξε επιχειρηματικές ιδέες!", 'home_page_texts');
            pll_register_string('home_call_to_action_register', "Γίνετε μέρος της κοινότητας!", 'home_page_texts');
            pll_register_string('home_call_to_action_idea', "Ανέβασε την επιχειρηματική σου ιδέα!", 'home_page_texts');
            pll_register_string('home_call_to_action_idea', "Δες τις επιχειρηματικές ιδέες των Aegean Startups!", 'home_page_texts');
            pll_register_string('home_call_to_action_idea', "Γίνε μέλος της κοινότητας των Aegean Startups!", 'home_page_texts');

            
            pll_register_string('section_community_title', "", 'section_community_texts');
            pll_register_string('submit_keyword', "Submit","submit_keyword");
            pll_register_string('section_community_member_title', "Μέλος", 'section_community_texts');
            pll_register_string('section_community_member_desc', "Τα μέλη έχουν δεξιότητες. Κάποιο μέλος μπορεί να υποβάλλει μία ιδέα, στα πλαίσια κάποιου διααγωνισμού ή και εκτός αυτού.", 'section_community_texts');
            pll_register_string('section_community_member_button', "Εγγραφή", 'section_community_texts');

            pll_register_string('section_community_mentor_title', "Μέντορας", 'section_community_texts');
            pll_register_string('section_community_mentor_desc', "Ο μέντορας είναι άμισθος βοηθός στη διαμόρφωση μίας ιδέας. Οι μέντορες προέρχονται απο την κοινότητα του ΠΑ ή είναι εξωτερικοί.", 'section_community_texts');
            pll_register_string('section_community_mentor_button', "Εγγραφή", 'section_community_texts');

            pll_register_string('section_community_angel_title', "Άγγελος", 'section_community_texts');
            pll_register_string('section_community_angel_desc', "Ο Άγγελος είναι επενδυτής που υποστηρίζει μία ιδέα χρηματοδοτώντας την σε πολύ αρχικό στάδιο.", 'section_community_texts');
            pll_register_string('section_community_angel_button', "Επένδυσε σε ιδέα", 'section_community_texts');

            pll_register_string('section_community_supporter_title', "Υποστηρικτής - Χορηγός", 'section_community_texts');
            pll_register_string('section_community_supporter_desc', "Ο Υποστηρικτής είναι πρόσωπο ή οργανισμός εκτός της κοινότητας του Παν. Αιγαίου.", 'section_community_texts');
            pll_register_string('section_community_supporter_button', "Υποστήριξη ομάδων", 'section_community_texts');

            pll_register_string('section_community_teams_title', "Υποστήριξη ομάδων", 'section_community_texts');
            pll_register_string('section_community_teams_desc', "Υπάρχουσες επιχειρήσεις του Αιγαίου που δίνουν απαιτήσεις στα Aegean Startups.", 'section_community_texts');
            pll_register_string('section_community_teams_button', "Βοήθησε σε ιδέα", 'section_community_texts');

            pll_register_string('section_thematikes_title', "", 'section_thematikes_texts');

            pll_register_string('section_thematikes_title', "Θεματικές", 'section_thematikes_texts');
            pll_register_string('section_thematikes_title', "Θεματική", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Περιβάλλον", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Υγεία", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Οικονομία", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Αθλητισμός", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Άλλη Θεματική", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_title', "Άλλη Θεματική", 'section_thematikes_texts');
            pll_register_string('section_thematikes_member_button', "Περισσότερα", 'section_thematikes_texts');

            pll_register_string('section_dayresearch_title', "", 'section_dayresearch_texts');

            pll_register_string('section_dayresearch_title', "Ημέρα Ερευνητών Πανεπιστημίου Αιγαίου «Δημήτρης Εδουάρδος Γαρδίκης»", 'section_dayresearch_texts');
            pll_register_string('section_dayresearch_button', "Μάθε περισσότερα!", 'section_dayresearch_texts');
            pll_register_string('section_dayresearch_text', "Η Ημέρα Ερευνητών Πανεπιστημίου Αιγαίου «Δημήτρης Εδουάρδος Γαρδίκης»
    είναι μία ετήσια εκδήλωση που στοχεύει στην προώθηση της ερευνητικής συνεργασίας ανάμεσα στα Τμήματα και τις Σχολές του Πανεπιστημίου Αιγαίου, στην προώθηση της διεπιστημονικότητας, στην ανάδειξη των ερευνητικών αποτελεσμάτων και στη γενικότερη διάδοση της έρευνας εντός και εκτός του Πανεπιστημίου Αιγαίου. Οι προτάσεις συλλέφονται με την υποβολή παρουσίασης και σύντομου κειμένου (abstract) στα αγγλικά, σε σαφώς καθορισμένο πρότυπο. Ανέβασε την πρότασή σου!", 'section_dayresearch_texts');

            pll_register_string('section_businessideas_title', "", 'section_businessideas_texts');
           
            pll_register_string('section_businessideas_button', "Περισσότερα", 'section_businessideas_texts');

            pll_register_string('section_program_title', "", 'section_program_texts');

            pll_register_string('section_program_title', "Το πρόγραμμα", 'section_program_texts');
            pll_register_string('section_program_text', "Το πρόγραμμα είναι μια πρωτοβουλία του Πανεπιστημίου Αιγαίου. Τα μέλη υποβάλλουν προτάσεις καινοτόμου επιχειρηματικότητας, ανά κλάδο παρέμβασης και με διάφορα επίπεδα ανάλυσης (ιδέα, σκοπιμότητα, καινοτομία, πλήρες επιχειρηματικό σχέδιο). Οι προτάσεις ελέγχονται και αξιολογούνται, μέσω συνεργασίας με ειδικούς εντός και εκτός του Πανεπιστημίου Αιγαίου και προωθείται η συνεργασία ανάμεσα σε ομάδες από διαφορετικά νησιά και τμήματα του Πανεπιστημίου Αιγαίου. Όλα τα παρακάτω γίνονται ανοιχτά, με διαφάνεια και παρακολουθείται η πορεία των Επιχειρηματικών Ιδεών και των Μελών σε βάθος χρόνου", 'section_program_texts');
            pll_register_string('section_program_button', "Μάθε περισσότερα ", 'section_program_texts');

            pll_register_string('section_counts_title', "", 'section_counts_texts');

            pll_register_string('section_counts_title', "Μετρήσεις", 'section_counts_texts');

            pll_register_string('section_counts_title', "Μέλη", 'section_counts_texts');
            pll_register_string('section_counts_title', "Μέντορες", 'section_counts_texts');
            pll_register_string('section_counts_title', "Δράσεις", 'section_counts_texts');

            pll_register_string('section_bepart_title', "", 'section_bepart_texts');

            pll_register_string('section_bepart_title', "Γίνε μέρος της κοινότητας", 'section_bepart_texts');
            pll_register_string('section_bepart_text', "Είσαι φοιτητής στο Πανεπιστήμιο Αιγαίου και θέλεις να υποβάλλεις μια ιδέα; Είσαι μέντορας και θέλεις να βοηθήσεις μια ιδέα να εξελιχθεί; Είσαι επενδυτής και θέλεις να χρηματοδοτήσεις μια ιδεα; Έχεις επιχείρηση στο Αιγαίο και μπορείς να δώσεις απαιτήσεις για ιδέες; Αυτή η πλατφόρμα είναι για σένα! Κάνε την εγγραφή σου και δες μια ιδέα να γίνεται επιχείρηση, με την βοήθειά σου!
    Εγγραφή!", 'section_bepart_texts');
            pll_register_string('section_bepart_button', "Εγγραφή!", 'section_bepart_texts');

            pll_register_string('section_news_title', "", 'section_news_texts');

            pll_register_string('section_news_title', "Νέα", 'section_news_texts');
            pll_register_string('section_news_button', "Όλα τα νέα", 'section_news_texts');

            pll_register_string('section_feedback_button', "Συμπλήρωσε την φόρμα", 'section_feedback_texts');

            pll_register_string('section_foreis_title', "", 'section_foreis_texts');

            pll_register_string('section_foreis_title', "Συνεργαζόμενοι φορείς", 'section_foreis_texts');

            pll_register_string('section_about_title', "", 'section_about_texts');

            pll_register_string('section_about_title', "Σχετικά με το Αιγαίο", 'section_about_texts');
            pll_register_string('section_about_text', "Περίληψη σχετικά με το Αιγαίο", 'section_about_texts');
            pll_register_string('section_about_button', "Στοιχεία για το Αιγαίο >", 'section_about_texts');

            pll_register_string('section_footer_title', "", 'section_footer_texts');

            pll_register_string('section_footer_title', "Το Πρόγραμμα", 'section_footer_texts');
            pll_register_string('section_footer_title', "Σχετικά με το πρόγραμμα", 'section_footer_texts');
            pll_register_string('section_footer_title', "Στοιχεία για το Αιγαίο", 'section_footer_texts');
            pll_register_string('section_footer_title', "Βιβλιοθήκη", 'section_footer_texts');
            pll_register_string('section_footer_title', "Συχνές ερωτήσεις", 'section_footer_texts');
            pll_register_string('section_footer_title', "Κανονισμός", 'section_footer_texts');
            pll_register_string('section_footer_title', "Λογοδοσία", 'section_footer_texts');
            pll_register_string('section_footer_title', "Διαγωνισμοί", 'section_footer_texts');
            pll_register_string('section_footer_title', "Αρχείο Διαγωνισμών", 'section_footer_texts');
            pll_register_string('section_footer_title', "Κοινότητα", 'section_footer_texts');
            pll_register_string('section_footer_title', "Μέντορες", 'section_footer_texts');
            pll_register_string('section_footer_title', "Γίνε χορηγός", 'section_footer_texts');
            pll_register_string('section_footer_title', "Επιχειρήσεις του Αιγαίου", 'section_footer_texts');
            pll_register_string('section_footer_title', "Συνεργαζόμενοι Φορείς", 'section_footer_texts');
            pll_register_string('section_footer_title', "Συνεργαζόμενες Θερμοκοιτίδες", 'section_footer_texts');
            pll_register_string('section_footer_title', "Υποβολή Επιχειρηματικής Ιδέας", 'section_footer_texts');
            pll_register_string('section_footer_title', "Αρχείο Επιχειρηματικών Ιδεών", 'section_footer_texts');
            pll_register_string('section_footer_title', "Αρχείο Παλαιότερων Ιδεών", 'section_footer_texts');
            pll_register_string('section_footer_title', "Δράσεις", 'section_footer_texts');
            pll_register_string('section_footer_title', "Υποβολή δράσης", 'section_footer_texts');
            pll_register_string('section_footer_title', "Υποβολή Δράσης >", 'section_footer_texts');
            pll_register_string('section_footer_title', "Αρχείο δράσεων", 'section_footer_texts');
            pll_register_string('section_footer_title', "Κοινωνικό Αποτύπωμα Δράσεων", 'section_footer_texts');
            pll_register_string('section_footer_title', "Φιλικοί Σύνδεσμοι", 'section_footer_texts');
            pll_register_string('section_footer_title', "Πανεπιστήμιο Αιγαίου", 'section_footer_texts');
            pll_register_string('section_footer_title', "Open Aegean", 'section_footer_texts');
            pll_register_string('section_footer_title', "Επικοινωνία", 'section_footer_texts');
            pll_register_string('section_footer_title', "Νέα", 'section_footer_texts');
            pll_register_string('section_footer_title', "Επικοινωνία", 'section_footer_texts');
            pll_register_string('section_footer_title', "Στείλτε μας τις προτάσεις σας", 'section_footer_texts');

            pll_register_string('section_submitidea_title', "", 'section_submitidea_texts');

            pll_register_string('section_submitidea_title', "Υποβολή Επιχειρηματικής Ιδέας", 'section_submitidea_texts');
            pll_register_string('section_submitidea_text', "Εδώ, μπορείτε να υποβάλλετε την επιχειρηματική σας ιδέα, στα πλαίσια ενός διαγωνισμού ή στα πλαίσια ανοιχτής υποβολής. Είναι η 1η φάση υποβολής επιχειρηματικών ιδεών. Η ιδέα σας θα εμφανιστεί δημόσια μετά από την έγκριση των διαχειριστών.", 'section_submitidea_texts');
            pll_register_string('section_submitidea_button', "Πίσω", 'section_submitidea_texts');
            pll_register_string('section_submitidea_button', "Επόμενο βήμα", 'section_submitidea_texts');

            pll_register_string('submitideatemplate_title', "", 'submitideatemplate_texts');

            pll_register_string('submitideatemplate_title', "Υποβολή Επιχειρηματικής Ιδέας", 'submitideatemplate_texts');
            pll_register_string('submitideatemplate_title', "Δεν είσαι συνδεδεμένος", 'submitideatemplate_texts');
            pll_register_string('submitideatemplate_title', "Πρέπει να συνδεθείς για να υποβάλεις επιχειρηματική Ιδέα!", 'submitideatemplate_texts');
            pll_register_string('submitideatemplate_button', "Σύνδεση ή Εγγραφή", 'submitideatemplate_texts');
            pll_register_string('submitideatemplate_button', "Υποβολή Ιδέας", 'submitideatemplate_texts'); 
            pll_register_string('submitideatemplate_button', "Υποβολή Ιδέας >", 'submitideatemplate_texts');

            pll_register_string('successideatemplate_title', "", 'successideatemplate_texts');

            pll_register_string('successideatemplate_title', "Επιτυχία υποβολής", 'successideatemplate_texts');
            pll_register_string('successideatemplate_title', "Επόμενη φάση:", 'successideatemplate_texts');
            pll_register_string('successideatemplate_title', "Αξιολόγηση", 'successideatemplate_texts');
            pll_register_string('successideatemplate_text', "Συγχαρητήρια για την υποβολή της επιχειρηματικής σου ιδέας!", 'successideatemplate_texts');
            pll_register_string('successideatemplate_text', "Όταν αξιολογηθεί η ιδέα σου, θα λάβεις ειδοποίηση για την εξέλιξή της.", 'successideatemplate_texts');
            pll_register_string('successideatemplate_button', "Αρχική σελίδα", 'successideatemplate_texts');



            pll_register_string('section_submitaction_title', "", 'section_submitaction_texts');

            pll_register_string('section_submitaction_title', "Υποβολή Δράσης", 'section_submitaction_texts');
            pll_register_string('section_submitaction_text', "Εδώ, μπορείτε να υποβάλλετε τη Δράση σας. Κάθε Δράση μπορεί να είναι αυτόνομη ή να υπόκειται στα πλαίσια ενός διαγωνισμού. Η δράση σας θα εμφανιστεί δημόσια μετά από την έγκριση των διαχειριστών. Για τις Δράσεις που έχουν υποβληθεί στα πλαίσια κάποιου Διαγωνισμού των Aegean Startups και μετά το πέρας αυτού, οι νικητήριες Δράσεις ενδέχεται να προχωρήσουν σε Crowdfunding.", 'section_submitaction_texts');
            pll_register_string('section_submitaction_button', "Πίσω", 'section_submitaction_texts');
            pll_register_string('section_submitaction_button', "Επόμενο βήμα", 'section_submitaction_texts');

            pll_register_string('submitactiontemplate_title', "", 'section_submitactiontemplate_texts');

            pll_register_string('submitactiontemplate_title', "Υποβολή Δράσης", 'submitactiontemplate_texts');
            pll_register_string('submitactiontemplate_title', "Δεν είσαι συνδεδεμένος", 'submitactiontemplate_texts');
            pll_register_string('submitactiontemplate_title', "Πρέπει να συνδεθείς για να υποβάλεις την δράση!", 'submitactiontemplate_texts');
            pll_register_string('submitactiontemplate_button', "Σύνδεση ή Εγγραφή", 'submitactiontemplate_texts');
            pll_register_string('submitactiontemplatee_button', "Υποβολή Δράσης", 'submitactiontemplate_texts');

            pll_register_string('successactiontemplate_title', "", 'successsubmitactiontemplate_texts');

            pll_register_string('successactiontemplate_title', "Επιτυχία υποβολής", 'successsubmitactiontemplate_texts');
            pll_register_string('successactiontemplate_title', "Επόμενη φάση:", 'successsubmitactiontemplate_texts');
            pll_register_string('successactiontemplate_title', "Αξιολόγηση", 'successsubmitactiontemplate_texts');
            pll_register_string('successactiontemplate_text', "Συγχαρητήρια για την υποβολή της δράσης σου!", 'successsubmitactiontemplate_texts');
            pll_register_string('successactiontemplate_text', "Όταν αξιολογηθεί η δράση σου, θα λάβεις ειδοποίηση για την εξέλιξή της.", 'successsubmitactiontemplate_texts');
            pll_register_string('successactiontemplate_button', "Αρχική σελίδα", 'successsubmitactiontemplate_texts');

            pll_register_string('section_submitneed_title', "", 'section_submitneed_texts');

            pll_register_string('section_submitneed_title', "Υποβολή Aνάγκης Επιχείρησης", 'section_submitneed_texts');
            pll_register_string('section_submitneed_text', "Στο σημείο αυτό, καλούνται οι επιχειρήσεις που ήδη λειτουργούν, να δηλώσουν τις ανάγκες τις οποίες πιστεύουν ότι θα μπορούσαν να καλύψουν νεοφυείς επιχειρήσεις.", 'section_submitneed_texts');

            pll_register_string('submitneedtemplate_title', "", 'section_submitneedtemplate_texts');

            pll_register_string('submitneedtemplate_title', "Υποβολή Ανάγκης", 'submitneedtemplate_texts');
            pll_register_string('submitneedtemplate_title', "Δεν είσαι συνδεδεμένος", 'submitneedtemplate_texts');
            pll_register_string('submitneedtemplate_title', "Πρέπει να συνδεθείς για να υποβάλεις την ανάγκη", 'submitneedtemplate_texts');
            pll_register_string('submitneedtemplate_button', "Σύνδεση ή Εγγραφή", 'submitneedtemplate_texts');
            pll_register_string('submitneedtemplate_button', "Υποβολή Ανάγκης", 'submitneedtemplate_texts');
            pll_register_string('submitneedtemplate_button', "Υποβολή Ανάγκης >", 'submitneedtemplate_texts');

            pll_register_string('successneedtemplate_title', "", 'successsubmitneedtemplate_texts');

            pll_register_string('successneedtemplate_title', "Επιτυχία υποβολής", 'successsubmitneedtemplate_texts');
            pll_register_string('successneedtemplate_title', "Επόμενη φάση:", 'successsubmitneedtemplate_texts');
            pll_register_string('successneedtemplate_title', "Αξιολόγηση", 'successsubmitneedtemplate_texts');
            pll_register_string('successneedtemplate_text', "Συγχαρητήρια για την υποβολή της ανάγκης σου!", 'successsubmitneedtemplate_texts');
            pll_register_string('successneedtemplate_text', "Όταν αξιολογηθεί η ανάγκη σου, θα λάβεις ειδοποίηση για την εξέλιξή της.", 'successsubmitneedtemplate_texts');
            pll_register_string('successneedtemplate_button', "Αρχική σελίδα", 'successsubmitneedtemplate_texts');

            pll_register_string('successfeedbacktemplate_title', "", 'successfeedbackneedtemplate_texts');

            pll_register_string('successfeedbacktemplate_title', "Επιτυχία υποβολής πρότασης", 'successfeedbackneedtemplate_texts');
            pll_register_string('successfeedbacktemplate_text', "Παρακαλώ, κοιτάξτε τα email σας", 'successfeedbackneedtemplate_texts');
            pll_register_string('successfeedbacktemplate_button', "Αρχική σελίδα", 'successfeedbackneedtemplate_texts');

            pll_register_string('successfeedbacktemplate_title', "", 'successfeedbackneedtemplate_texts');

            pll_register_string('successfeedbacktemplate_title', "Στείλτε μας τις προτάσεις σας!", 'successfeedbackneedtemplate_texts');
            pll_register_string('successfeedbacktemplate_title', "Εδώ, μπορείτε να υποβάλλετε τις προτάσεις σας.", 'successfeedbackneedtemplate_texts');
            pll_register_string('successfeedbacktemplate_button', "Υποβολή Πρότασης", 'successfeedbackneedtemplate_texts');

            pll_register_string('section_submitorgneed_title', "", 'section_submitorgneed_texts');

            pll_register_string('section_submitorgneed_title', "Υποβολή Aνάγκης Οργανισμου", 'section_submitorgneed_texts');
            pll_register_string('section_submitorgneed_text', "Στο σημείο αυτό, καλούνται οι οργανισμοί που ήδη λειτουργούν, 
    να δηλώσουν τις ανάγκες τις οποίες πιστεύουν ότι θα μπορούσαν να καλύψουν νεοφυείς επιχειρήσεις.", 'section_submitorgneed_texts');

            pll_register_string('underconstruction_title', "", 'underconstruction_texts');

            pll_register_string('underconstruction_title', "Η σελίδα είναι υπό κατασκευή", 'underconstruction_texts');
            pll_register_string('underconstruction_title', "Σύντομα κοντά σας", 'underconstruction_texts');
            pll_register_string('underconstruction_title', "Λυπούμαστε, η σελίδα είναι υπο κατασκευή.", 'underconstruction_texts');
            pll_register_string('underconstruction_button', "Αρχική σελίδα", 'underconstruction_texts');


            pll_register_string('ideas_title', "", 'ideas_texts');

            pll_register_string('ideas_title', "Επιχειρηματικές Ιδέες", 'ideas_texts');
            pll_register_string('ideas_title', "Εδώ μπορείτε να βρείτε όλες τις επιχειρηματικές ιδέες", 'ideas_texts');
            pll_register_string('ideas_title', "Φίλτρα", 'ideas_texts');
            pll_register_string('ideas_title', "Διαγωνισμός", 'ideas_texts');
            pll_register_string('ideas_title', "Τύπος Προϊόντος - Συστήματος", 'ideas_texts');
            pll_register_string('ideas_title', "Ανήκει σε διαγωνισμό", 'ideas_texts');
            pll_register_string('ideas_title', "Κλάδος", 'ideas_texts');
            pll_register_string('ideas_title', "Στάδιο", 'ideas_texts');
            pll_register_string('ideas_title', "Εχει ιδρυθεί η επιχείρηση", 'ideas_texts');
            pll_register_string('ideas_title', "Τύπος ανάγκης", 'ideas_texts');

            pll_register_string('actions_title', "", 'actions_texts');

            pll_register_string('actions_title', "Δράσεις", 'actions_texts');
            pll_register_string('actions_title', "Φίλτρα", 'actions_texts');
            pll_register_string('actions_title', "Ανήκει σε διαγωνισμό", 'actions_texts');
            pll_register_string('actions_title', "Τύπος Δράσης", 'actions_texts');
            pll_register_string('actions_title', "Έχει υποβληθεί η δράση σε άλλο διαγωνισμό", 'actions_texts');
            pll_register_string('actions_title', "Θα έχει εσοδα", 'actions_texts');

            pll_register_string('needs_title', "", 'needs_texts');

            pll_register_string('needs_title', "Ανάγκες Επιχειρήσεων", 'needs_texts');
            pll_register_string('needs_title', "Εδώ μπορείτε να βρείτε όλες τις ανάγκες επιχειρήσεων", 'needs_texts');
            pll_register_string('needs_title', "Φίλτρα", 'needs_texts');
            pll_register_string('needs_title', "No posts found", 'needs_texts');
            pll_register_string('needs_title', "Ανάγκες", 'needs_texts');
            pll_register_string('needs_title', "Κλάδος Επιχείρησης", 'needs_texts');
            pll_register_string('needs_title', "Έδρα της επιχείρησης", 'needs_texts');
            pll_register_string('needs_title', "Η επιχείρηση έχει παρουσία σε άλλα νησιά;", 'needs_texts');

            pll_register_string('login_title', "Σύνδεση", 'login_texts');

            pll_register_string('contentidea_title', "", 'contentidea_texts');

            pll_register_string('contentidea_title', "Περιγραφή", 'contentidea_texts');
            pll_register_string('contentidea_title', "Επεξεργασία Ιδέας", 'contentidea_texts');
            pll_register_string('contentidea_title', "Μέλη", 'contentidea_texts');
            pll_register_string('contentidea_title', "Τύπος Προϊόντος - Συστήματος", 'contentidea_texts');
            pll_register_string('contentidea_title', "Κλάδος", 'contentidea_texts');
            pll_register_string('contentidea_title', "Ανήκει σε διαγωνισμό", 'contentidea_texts');
            pll_register_string('contentidea_title', "Στάδιο", 'contentidea_texts');
            pll_register_string('contentidea_title', "Μέντορες", 'contentidea_texts');
            pll_register_string('contentidea_title', "Tύπος Ανάγκης", 'contentidea_texts');
            pll_register_string('contentidea_title', "Στόχοι βιώσιμης ανάπτυξης", 'contentidea_texts');
            pll_register_string('contentidea_title', "1. Συνεργασία για στόχους", 'contentidea_title_texts');
            pll_register_string('contentidea_title', "2. Εξάλειψη Πείνας", 'contentidea_title_texts');
            pll_register_string('contentidea_title', "3. Καλή υγεία", 'contentidea_title_texts');
            pll_register_string('contentidea_title', "4. Ποιοτική εκπαίδευση", 'contentidea_title_texts');
            pll_register_string('contentidea_title', "5. Ισότητα των φύλων", 'contentidea_title_texts');
            pll_register_string('contentidea_title', "6. Καθαρό νερό και αποχέτευση", 'contentidea_texts');
            pll_register_string('contentidea_title', "7. Ανανεώσιμη ενέργεια", 'contentidea_texts');
            pll_register_string('contentidea_title', "8. Καλές θέσεις εργασίας και οικονομική ανάπτυξη", 'contentidea_texts');
            pll_register_string('contentidea_title', "9. Καινοτομία και υποδομές", 'contentidea_texts');
            pll_register_string('contentidea_title', "10. Μείωση των ανισοτήτων", 'contentidea_texts');
            pll_register_string('contentidea_title', "11. Αειφόρες πόλεις και κοινότητες", 'contentidea_texts');
            pll_register_string('contentidea_title', "12. Υπεύθυνη κατανάλωσ", 'contentidea_texts');
            pll_register_string('contentidea_title', "13. Δράσεις για το κλίμα", 'contentidea_texts');
            pll_register_string('contentidea_title', "14. Υποθαλάσσια ζωή", 'contentidea_texts');
            pll_register_string('contentidea_title', "15. Χερσαία ζωή", 'contentidea_texts');
            pll_register_string('contentidea_title', "16. Ειρήνη και δικαιοσύνη", 'contentidea_texts');
            pll_register_string('contentidea_title', "17. Συνεργασίες για στόχους", 'contentidea_texts');
            pll_register_string('contentidea_title', "Σχετικές Ιδέες", 'contentidea_texts');
            pll_register_string('contentidea_title', "Περισσότερα", 'contentidea_texts');

            pll_register_string('contentaction_title', "", 'contentaction_texts');

            pll_register_string('contentaction_title', "Περιγραφή Δράσης", 'contentaction_texts');
            pll_register_string('contentaction_title', "Η σχέση σας με το Αιγαίο", 'contentaction_texts');
            pll_register_string('contentaction_title', "Υποβολή σε άλλο διαγωνισμό", 'contentaction_texts');
            pll_register_string('contentaction_title', "Έσοδα απο την δράση", 'contentaction_texts');
            pll_register_string('contentaction_title', "Ανήκει σε διαγωνισμό", 'contentaction_texts');
            pll_register_string('contentaction_title', "Web site της δράσης", 'contentaction_texts');
            pll_register_string('contentaction_title', "Σχετικές Δράσεις", 'contentaction_texts');

            pll_register_string('contentcompetition_title', "", 'contentcompetition_texts');

            pll_register_string('contentcompetition_title', "Συνεργασία για στόχους", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Βραβεία", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Κοινοποίηση", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Είμαι μέλος", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Είμαι επιχείρηση / οργανισμός", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Είμαι μέντορας", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Στάδιο", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Κατηγορία", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Επιχειρηματικές ιδέες διαγωνισμού", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "'Ολες οι ιδέες", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Υποβολή Διαγωνισμού >", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Όχι", 'contentcompetition_texts');
            pll_register_string('contentcompetition_title', "Ναι", 'contentcompetition_texts');

            pll_register_string('contentpage_title', "", 'contentpage_texts');

            pll_register_string('contentpage_title', "Σύντομα κοντά σας", 'contentpage_texts');
            pll_register_string('contentpage_title', "Λυπούμαστε, η σελίδα είναι υπο κατασκευή", 'contentpage_texts');
            pll_register_string('contentpage_button', "Αρχική σελίδα", 'contentpage_texts');

            pll_register_string('createcompetition_title', "Δημιουργία Διαγωνισμού", 'createcompetition_texts');
            pll_register_string('createcompetition_text', "Περίληψη Διαγωνισμού", 'createcompetition_texts');

            pll_register_string('organizationneed_title', "", 'organizationneed_texts');

            pll_register_string('organizationneed_title', "Αριθμός εργαζομένων της επιχείρησης", 'organizationneed_texts');
            pll_register_string('organizationneed_title', "Περιγραφή Επιχείρησης", 'organizationneed_texts');
            pll_register_string('organizationneed_title', "Έδρα Επιχείρησης", 'organizationneed_texts');
            pll_register_string('organizationneed_title', "Tύπος Ανάγκης", 'organizationneed_texts');
            pll_register_string('organizationneed_title', "Σχετικές Ανάγκες", 'organizationneed_texts');

            pll_register_string('404_title', "", '404_texts');

            pll_register_string('404_title', "Η σελίδα δεν βρέθηκε", '404_texts');
            pll_register_string('404_title', "Λυπούμαστε, η σελίδα δεν βρέθηκε. Δοκιμάστε ξανά.", '404_texts');

            pll_register_string('search_button', "Αναζήτηση", 'search_texts');

            pll_register_string('header_title', "Σύνδεση/", 'header_texts');
            pll_register_string('header_title', "Εγγραφή", 'header_texts');
            pll_register_string('header_title', "Προφίλ", 'header_texts');
            pll_register_string('header_title', "Έξοδος", 'header_texts');

            pll_register_string('editidea_title', "Επεξεργασία Επιχειρηματικής Ιδέας", 'editidea_texts');
            pll_register_string('editidea_title', "Ενημέρωση", 'editidea_texts');

            pll_register_string('ulmember_title', "", 'ulmember_texts');

            pll_register_string('ulmember_title', "Το προφίλ μου", 'ulmember_texts');
            pll_register_string('ulmember_title', "Ρόλος:", 'ulmember_texts');
            pll_register_string('ulmember_title', "Προσθήκη Ιδέας", 'ulmember_texts');
            pll_register_string('ulmember_title', "Επεξεργασία Προφίλ", 'ulmember_texts');
            pll_register_string('ulmember_title', "Αποσύνδεση", 'ulmember_texts');
            pll_register_string('ulmember_title', "Ιδιότητα", 'ulmember_texts');
            pll_register_string('ulmember_title', "Τμήμα ΑΕΙ / ΤΕΙ", 'ulmember_texts');
            pll_register_string('ulmember_title', "Έτος ΑΕΙ/ ΤΕΙ", 'ulmember_texts');
            pll_register_string('ulmember_title', "Κλάδος Επιχείρησης", 'ulmember_texts');
            pll_register_string('ulmember_title', "Έδρα Επιχείρησης", 'ulmember_texts');
            pll_register_string('ulmember_title', "Επεξεργασία προφίλ >", 'ulmember_texts');
            pll_register_string('ulmember_title', "Κλάδος ενδιαφέροντος", 'ulmember_texts');
            pll_register_string('ulmember_title', "Νησί δραστηριοποίησης", 'ulmember_texts');
            pll_register_string('ulmember_title', "Δεξιότητες", 'ulmember_texts');
            pll_register_string('ulmember_title', "Αριθμός Εργαζομένων της Επιχείρησης", 'ulmember_texts');
            pll_register_string('ulmember_title', "Περιγραφή Επιχείρησης", 'ulmember_texts');
            pll_register_string('ulmember_title', "Οι επιχειρηματικές μου ιδέες", 'ulmember_texts');
            pll_register_string('ulmember_title', "Δεν έχεις προσθέσει καμία ιδέα. Κάνε την αρχή!", 'ulmember_texts');
            pll_register_string('ulmember_title', "Ανέβασε την ιδέα σου", 'ulmember_texts');
            pll_register_string('ulmember_title', "Αποθηκευμένες επιχειρηματικές ιδέες", 'ulmember_texts');
            pll_register_string('ulmember_title', "Οι δράσεις μου", 'ulmember_texts');
            pll_register_string('ulmember_title', "Δεν έχεις υποβάλει καμία δράση. Κάνε την αρχή!", 'ulmember_texts');
            pll_register_string('ulmember_title', "Υποβολή Δράσεων", 'ulmember_texts');
            pll_register_string('ulmember_title', "Επιχειρηματικές Ιδέες", 'ulmember_texts');
            pll_register_string('footer_title', "Σχεδιασμός και υλοποίηση από την", 'section_about_texts');

            pll_register_string('customfields_title', "1 field requires attention", 'customfield_texts');
            pll_register_string('customfield_title', "%d fields require attention", 'customfield_texts');
            pll_register_string('customfields_title', "Validation failed", 'customfield_texts');
            pll_register_string('customfield_title', "Validation successful", 'customfield_texts');
            pll_register_string('inner_business_idea', "Υποβάλετε τα σχολιά σας", 'inner_business_idea_texts');
            
            pll_register_string('Evaluation_Form_Title', "Φόρμα Αξιολόγησης Ιδέας", 'evaluation_form_inner_text');
            pll_register_string('Evaluation_Form_subtitle', "H φόρμα είναι τελική, μετά την υποβολή, δεν μπορείτε να την επεξεργαστείτε", 'evaluation_form_inner_text');
            
            pll_register_string('admin_table_title', "Οι ιδέες διαγωνισμών", 'ideas_admin_table');
            
            pll_register_string('evaluation_admin_table_title', "Αξιολόγηση Ιδεών", 'evaluation_admin_table');
            pll_register_string('evaluation_admin_table_subtitle', "Δείτε όλες τις ιδέες που έχουν αξιολογηθεί", 'evaluation_admin_table');
            
            pll_register_string('interest_admin_table_title', "Εκδήλωση ενδιαφέροντος σε επιχειρηματική ανάγκη", 'interest_admin_table');
            pll_register_string('interest_admin_table_subtitle', "Δείτε όλες τις εκδηλώσεις ενδιαφέροντος που έκαναν οι χρήστες σε ανάγκες επιχειρήσεων!", 'interest_admin_table');

            pll_register_string('plan', "Λεζάντα πλάνου", 'plan_texts');
        });

        add_filter('acf/prepare_field', function ($field) {
            if (!is_admin()) {
                $field['label'] = pll__($field['label']);
                $field['instructions'] = pll__($field['instructions']);
                if ($field['type'] == "select") {
                    foreach ($field['choices'] as $choice) {
                        $field['choices'][$choice] = pll__($choice);
                    }
                }
            }
            return $field;
        }, 10, 1);

        function default_image()
        {
            $files = get_children('post_parent=' . get_the_ID() . '&post_type=attachment
    &post_mime_type=image&order=desc');
            if ($files) :
                $keys = array_reverse(array_keys($files));
                $j = 0;
                $num = $keys[$j];
                $image = wp_get_attachment_image($num, 'large', true);
                $imagepieces = explode('"', $image);
                $imagepath = $imagepieces[1];
                $main = wp_get_attachment_url($num);
                $template = get_template_directory();
                $the_title = get_the_title();
                print "<img src='$main' alt='$the_title' class='frame' />";
            endif;
        }


        function mentors_submit_request_form($post_id)
        {

            // check if this is to be a new post
            if ($post_id != 'mentors_request_form') {

                return $post_id;
            }
            if (is_user_logged_in()) {
                $prev_requested = um_user('mentor_requested');
                if (!$prev_requested) {
                    $idiotita = $_POST['acf']['field_5fc7ac80d1f20'];
                    $biografioko = $_POST['acf']['field_5fc7acbfd1f21'];
                    $linkedin = $_POST['acf']['field_5fc7acdbd1f22'];

                    add_user_meta(get_current_user_id(), "mentor_requested", "true", true);
                    if (um_user('mentor_req_idiotita')) {
                        update_user_meta(get_current_user_id(), "mentor_req_idiotita", $idiotita);
                    } else {
                        add_user_meta(get_current_user_id(), "mentor_req_idiotita", $idiotita, true);
                    }

                    if (um_user('mentor_req_biografiko')) {
                        update_user_meta(get_current_user_id(), "mentor_req_biografiko", $biografioko);
                    } else {
                        add_user_meta(get_current_user_id(), "mentor_req_biografiko", $biografioko, true);
                    }

                    if (um_user('mentor_req_linkedin')) {
                        update_user_meta(get_current_user_id(), "mentor_req_linkedin", $linkedin);
                    } else {
                        add_user_meta(get_current_user_id(), "mentor_req_linkedin", $linkedin, true);
                    }
                }
            }
            return "no_new_post";
        }

        add_filter('acf/pre_save_post', 'mentors_submit_request_form', 10, 1);

        function add_custom_column_name($columns)
        {
            $columns['columns_array_name'] = 'Requested to be Mentor';
            return $columns;
        }
        function show_custom_column_values($value, $column_name, $user_id)
        {
            if ('columns_array_name' == $column_name)
                return get_user_meta($user_id, 'mentor_requested', true);
            return $value;
        }

        add_filter('manage_users_columns', 'add_custom_column_name');
        add_action('manage_users_custom_column', 'show_custom_column_values', 10, 3);

        /*** Sort and Filter Users ***/
        add_action('restrict_manage_users', 'filter_by_mentor_request');

        function filter_by_mentor_request($which)
        {
            // template for filtering
            $st = '<select name="mentor_request_%s" style="float:none;margin-left:10px;">
            <option value="">%s</option>%s</select>';

            // generate options
            $options = '<option value="true">Requested to be a mentor</option>';

            // combine template and options
            $select = sprintf($st, $which, __('Mentor Status'), $options);

            // output <select> and submit button
            echo $select;
            submit_button(__('Filter'), null, $which, false);
        }

        add_filter('pre_get_users', 'filter_users_by_mentor_request_section');

        function filter_users_by_mentor_request_section($query)
        {
            global $pagenow;
            if (is_admin() && 'users.php' == $pagenow) {
                // figure out which button was clicked. The $which in filter_by_job_role()
                $top = isset($_GET['mentor_request_top']) ? $_GET['mentor_request_top'] : null;
                $bottom = isset($_GET['mentor_request_bottom']) ? $_GET['mentor_request_bottom'] : null;
                if (!empty($top) or !empty($bottom)) {
                    $section = !empty($top) ? $top : $bottom;

                    // change the meta query based on which option was chosen
                    $meta_query = array(array(
                        'key' => 'mentor_requested',
                        'value' => $section,
                        'compare' => 'LIKE'
                    ));
                    $query->set('meta_query', $meta_query);
                }
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

        add_filter('acf/fields/post_object/query/key=field_5ffd848b44d64', 'my_acf_fields_post_object_query', 10, 3);
        function my_acf_fields_post_object_query($args, $field, $post_id)
        {

            $competition_id = $_POST['competition_id'];

            // $competition_data = get_post($competition_id);
            $thematikes_diagonismou = get_field("field_5fc63d446878a", $competition_id);
            $thematikes_id = [];
            if ($thematikes_diagonismou != null) {
                foreach ($thematikes_diagonismou as $thematiki) {
                    array_push($thematikes_id, $thematiki->ID);
                }
            } else {
                $thematikes_id = [-1];
            }

            $args['post__in'] = $thematikes_id;

            return $args;
        }

        function admin_idea_edit_add_thematiki($hook)
        {

            global $post;

            if ($hook == 'post-new.php' || $hook == 'post.php') {
                if ('businessidea' === $post->post_type) {
                    wp_enqueue_script('myscript', get_stylesheet_directory_uri() . '/js/idea_thematikes.js');
                }
            }
        }
        add_action('admin_enqueue_scripts', 'admin_idea_edit_add_thematiki', 50, 1);

        function custom_remove_admin_menu()
        {

            $user_roles = um_user('roles');

            if (is_user_logged_in() && in_array("aegean_admin", $user_roles)) {
                remove_menu_page('edit.php?post_type=aoc_popup');
                remove_menu_page('admin.php?page=ultimatemember');
                remove_menu_page('themes.php');
                remove_menu_page('plugins.php');
                remove_menu_page('tools.php');
                remove_menu_page('edit.php?post_type=acf-field-group');
                remove_menu_page('admin.php?page=ultimate-blocks-settings');
                remove_menu_page('admin.php?page=mlang');
                remove_menu_page('admin.php?page=maxmegamenu');
            } else if (is_user_logged_in() && in_array("translator", $user_roles)) {
                remove_menu_page('edit-comments.php');
                remove_menu_page('edit.php?post_type=page');
                remove_menu_page('edit.php?post_type=katigoria');
                remove_menu_page('edit.php?post_type=thematiki');
                remove_menu_page('edit.php?post_type=organizationneed');
                remove_menu_page('edit.php?post_type=businessneed');
                remove_menu_page('edit.php?post_type=action');
                remove_menu_page('edit.php?post_type=businessidea');
                remove_menu_page('edit.php?post_type=competition');
                remove_menu_page('edit.php');
                remove_menu_page('edit.php?post_type=aoc_popup');
                remove_menu_page('themes.php');
                remove_menu_page('plugins.php');
                remove_menu_page('tools.php');
                remove_menu_page('edit.php?post_type=acf-field-group');
                remove_menu_page('options-general.php');
                remove_menu_page('upload.php');
            }
        }

        function send_email($to, $subject, $template, $render_object)
        {

            $headers = array('Content-Type: text/html; charset=UTF-8');
            $GLOBALS["use_html_content_type"] = TRUE;
            ob_start();
            include($template);
            $body = ob_get_contents();
            ob_end_clean();

            wp_mail($to, $subject, $body, $headers);
        }

        $phpmailerInitAction = function (&$phpmailer) {
            $phpmailer->AddEmbeddedImage(wp_get_upload_dir()["basedir"] . '/2021/01/aegean-startups-logo-new-blue.png', 'site_logo');
        };
        add_action('phpmailer_init', $phpmailerInitAction);

        add_action('admin_menu', 'custom_remove_admin_menu');

        function new_comment()
        {
            // print_r($_POST);
            $idea_id = $_POST['idea_id'];
            $message = $_POST['text'];
            $comment_author = wp_get_current_user();

            $row = array(
                'message' => $message,
                'author'   => $comment_author->data->ID,
                'date_submited'  => date("d/m/Y h:i a")
            );
            echo add_row('field_6003575aadbf3', $row, $idea_id);

            //Send Email to Idea Author
            $idea_author_id = get_post_field('post_author', $idea_id);
            $to = get_the_author_meta('user_email', $idea_author_id);
            $subject = 'A New Comment has been submited';
            $template = "email_templates/new_comment.php";

            $row['idea_id'] = $_POST['idea_id'];
            send_email($to, $subject, $template, $row);

            //Send Email to comment author
            $to = $comment_author->user_email;
            $subject = 'Your comment has been submited';
            $template = "email_templates/generic.php";
            send_email($to, $subject, $template, array('text' => "Your comment has been submited."));
            die;
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
                                    <img src="<?php echo get_avatar_url($comment["author"]["ID"]); ?>" alt="" class="rounded-circle" width="40" height="40">

                                    <h4><?php echo $comment["author"]["nickname"]; ?></h4> 
                                    <span color = "#909192" >
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
                            <img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="" class="rounded-circle" width="40" height="40">
                            <h4><?php echo wp_get_current_user()->data->user_nicename; ?></h4> <br><br><br>
                            <?php wp_editor("", "new_comment", ["textarea_rows" => 6]); ?>
                            <div id="new_comment"></div>

                            <button onclick="submitComment(<?php echo $idea_id; ?>)" class="primary_btn float-right" style="margin:2rem auto 1rem;"><?php echo pll__("Submit");?></button>
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
                                        beforeSend: function(xhr) {
                                            // filter.find('span').text('Processing...'); // changing the button label
                                        },
                                        success: function(data) {
                                            window.location.reload();
                                        },
                                        error: function(error) {
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
        <?php   }
     }
    // Checks if user is logged in and if he has checked the "I am business" field in profile form
    // $epix = um_user('is_business');
    // $profile_ID = um_profile_id();
    // if( isset( $epix ) ){

    //     $current_user = um_profile_id();
    //     $user = get_userdata( $current_user ); 
    //     $user_id = $user->ID;
    //     $user_roles = $user->roles;
    
    //     $u = new WP_User( $user_id );
    
            
        
    //     $u->set_role( 'business' );
    // }
    
    function register_my_menus()
{
    register_nav_menus(
        array(
            'footer-menu'  => __('Footer Menu'),
            'footer-menu-2'  => __('Footer Menu-2'),
            'footer-menu-3'  => __('Footer Menu-3'),
            'footer-menu-4'  => __('Footer Menu-4'),
        )
    );
}
add_action('init', 'register_my_menus');


//Sends an email to everyteam member that the user registers in the form
function submit_idea_pre_save($post_id){

    //This breaks the 'My Business Idees' section in /mentors page for mentors
    // if($post_id != 'new'){

    //     $args = array(
    //         'ID' => $post_id,
    //         'post_status' => 'draft'
    //       );
    //     wp_update_post($args);
    //     return $post_id;

    // }

    if(get_post_type($post_id) !== 'businessidea'){
        return $post_id;
    }

    $extra_members_field =  ($_POST['acf']['field_5ef9aad213336']);
    $fields = get_fields($post_id);
    $users_email = array();
    
    $before_members_emails = array();
    $before = (int)$fields['επιπλεον_μελη']['πόσα_μέλη_έχει_η_ομαδα_σας'];
    $before_members = $fields['επιπλεον_μελη'];
    
    $after_members_emails = array();
    $after = (int)$_POST['acf']['field_5ef9aad213336']['field_5eff6f51e849f'];
    $after_members = $_POST['acf']['field_5ef9aad213336'];
    
    foreach($before_members as $before_member){
        if(strpos($before_member, '@')){
            array_push($before_members_emails, $before_member);
        }
    }

   foreach($after_members as $after_member){
       if(strpos($after_member, '@')){
           array_push($after_members_emails, $after_member);
       }
   }
   

   $diff_members_email = array_diff($after_members_emails, $before_members_emails);
  

    // foreach($extra_members_field as $field){

    //     if( strpos($field, '@') ){
    //         array_push($users_email, $field);
    //     }
    // }
    
    if(!empty($diff_members_email)){

        foreach($diff_members_email as $email){
            $subject = 'Υποβολή Επιχειρηματικής Ιδέας';
            $template = "email_templates/needlogin.php";
            send_email( $email, $subject, $template, array('text' => "Your team has submitted an Idea") );
        }
        
    }

}
add_filter('acf/save_post','submit_idea_pre_save',1);
add_filter('acf/save_post','submit_idea_pre_save',20);


add_action( 'show_user_profile', 'um_extra_fields' );
add_action( 'edit_user_profile', 'um_extra_fields' );
function um_extra_fields( $user ) {
?>
  <table class="form-table">
    <tr>
      <th><label for="linkedin">Linkedin</label></th>
      <td>
        <input type="text" name="linkedin" id="linkedin" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
  </table>
<?php
}

add_action( 'personal_options_update', 'update_um_extra_fields' );
add_action( 'edit_user_profile_update', 'update_um_extra_fields' );
function update_um_extra_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    $saved = true;
  }
  return true;
}

function add_author_support_to_posts() {
    add_post_type_support( 'businessneed', 'author' ); 
    add_post_type_support( 'businessidea', 'author' ); 
 }
 add_action( 'init', 'add_author_support_to_posts' );

 // Insert Fb og properties
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');
function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="'. get_bloginfo( 'name' ) . '"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image= get_stylesheet_directory_uri(); //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '/img/aegeanstartups-social_share.jpg"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

add_action('acf/enqueue_scripts', 'af_translation_fix', 10, 0);

function af_translation_fix()
{
	if(!is_admin())
	{
		acf_localize_text(array(
				
			// unload
			'The changes you made will be lost if you navigate away from this page'	=> __('The changes you made will be lost if you navigate away from this page', 'acf'),
			
			// media
			'Select.verb'			=> _x('Select', 'verb', 'acf'),
			'Edit.verb'				=> _x('Edit', 'verb', 'acf'),
			'Update.verb'			=> _x('Update', 'verb', 'acf'),
			'Uploaded to this post'	=> __('Uploaded to this post', 'acf'),
			'Expand Details' 		=> __('Expand Details', 'acf'),
			'Collapse Details' 		=> __('Collapse Details', 'acf'),
			'Restricted'			=> __('Restricted', 'acf'),
			'All images'			=> __('All images', 'acf'),
			
			// validation
			'Validation successful'			=> pll__('Validation successful', 'acf'),
			'Validation failed'				=> pll__('Validation failed', 'acf'),
			'1 field requires attention'	=> pll__('1 field requires attention', 'acf'),
			'%d fields require attention'	=> pll__('%d fields require attention', 'acf'),
			
			// tooltip
			'Are you sure?'			=> __('Are you sure?','acf'),
			'Yes'					=> __('Yes','acf'),
			'No'					=> __('No','acf'),
			'Remove'				=> __('Remove','acf'),
			'Cancel'				=> __('Cancel','acf'),
			
			// conditions
			'Has any value'				=> __('Has any value', 'acf'),
			'Has no value'				=> __('Has no value', 'acf'),
			'Value is equal to'			=> __('Value is equal to', 'acf'),
			'Value is not equal to'		=> __('Value is not equal to', 'acf'),
			'Value matches pattern'		=> __('Value matches pattern', 'acf'),
			'Value contains'			=> __('Value contains', 'acf'),
			'Value is greater than'		=> __('Value is greater than', 'acf'),
			'Value is less than'		=> __('Value is less than', 'acf'),
			'Selection is greater than'	=> __('Selection is greater than', 'acf'),
			'Selection is less than'	=> __('Selection is less than', 'acf'),
			
			// misc
			'Edit field group'	=> __('Edit field group', 'acf'),
		));
	}
}

//add to the user the meta 'sociallogin' in order to do actions when user is connected with Nextend social login

function social_user_meta( $user_id ) {
	add_user_meta( $user_id, 'sociallogin', true);
}

//add the providers that exists on your website (here we have Facebook and Google)
add_action('nsl_google_link_user', 'social_user_meta',10,1);
add_action('nsl_facebook_link_user','social_user_meta',10,1);


// Delete UM account without the need of the password verification (except if is admin or has the 'sociallogin' meta )

function um_delete_account_no_password(){
    //If current user is admin, then enable password vcrification for deleting the account
    $current_user_id = get_current_user_id();
    $user_meta = get_user_meta($current_user_id,'sociallogin');
    if(current_user_can('administrator') || !$user_meta ){
        return true;
        //othwerise, let user delete his account without the need of a password
    }else{
        return false;
    }
}
add_filter('um_account_delete_require_current','um_delete_account_no_password');

//Disable the required password for privacy tab on UM and disable the change password tab.

function disable_password_for_social_users(){
     $current_user_id = get_current_user_id();
     $user_meta = get_user_meta($current_user_id,'sociallogin');
     if($user_meta){
         return false;
     }else{
         return true;
     }
}

//disable the password change for social users
add_filter("um_get_option_filter__account_tab_password","disable_password_for_social_users");

//disable the required password for social users
add_filter("um_account_general_require_current","disable_password_for_social_users");

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
                <td> <a href="<?php echo get_home_url();?>/user/<?php echo $user_display_name;?>">  <?php echo $name; ?> <a> </td>
                <td> <?php echo $email; ?> </td>
                <td> <?php echo $phone_number; ?> </td>
                <!-- <td style="width:60%;"> < echo get_words( $cv, 10); ?> </td> -->
                <td style="width:60%;"> <?php echo $description ?> </td>
                <td> <?php echo $submition_date; ?> </td>
                <td class="text-center"> <a href="<?php echo get_home_url();?>/wp-admin/post.php?post=<?php echo $need_id;?>&action=edit" target="_blank"> <i class="fas fa-user-cog"></i> <a> </td>
                <td> <?php echo $display_name; ?> </td>
                <td> <?php echo $author_email; ?> </td>
            </tr>
        
        <?php }
    }

    die();
}
add_action('wp_ajax_showInterestTable_action', 'showInterestTable');
add_action('wp_ajax_nopriv_showInterestTable_action', 'showInterestTable');

function my_posts_where( $where ) {
	
	$where = str_replace("meta_key = 'ekdilosi_endiaferontos_$", "meta_key LIKE 'ekdilosi_endiaferontos_%", $where);
	$where = str_replace("meta_key = 'evaluation_form_$", "meta_key LIKE 'evaluation_form_%", $where);

	return $where;
}

add_filter('posts_where', 'my_posts_where');

function updateStage(){
    $idea_id = $_POST['id'];
    $stage_value = $_POST['value'];

    if($idea_id == NULL || $stage_value == NULL){
        return;
    }
    
    update_field('field_60c0c1b9a9cbd', $stage_value, $idea_id);
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

/////////////////////////////////////////////////////////////////////////////////
function updateJudges(){
    $idea_id = (int)$_POST['id'];
    $judge_value = $_POST['value'];
    

    if($idea_id == NULL){
        return;
    }

        update_field('field_60c1a2c828caf', $judge_value, $idea_id );

    wp_send_json_success(array('id' => $idea_id));

    die();
}
add_action('wp_ajax_changeJudges', 'updateJudges');

//////////////////////////////////////////////////////////////////////////////////

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
    $stage = get_field('field_60c0c1b9a9cbd',$idea_id);
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

    $stages = get_field_object('field_60c0c1b9a9cbd',$idea_id);
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

    $to = 'tsetsisc@crowdpolicy.com';
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
            update_field('field_60c0c1b9a9cbd', $next_stage, $idea_id);
        }

    }

    // send_email($to, $subject, $template, $evaluation );
    die();
}
add_action('wp_ajax_sendEmail_action', 'SendEvaluationEmail');

//Business plan

function business_plan_save_post($post_id){
    if($post_id == 'new'){
        return $post_id;
    }

    $id = $_GET['id'];
    $stoixeia = wp_strip_all_tags($_POST['acf']['field_60c30c546e51e']);
    $analysi = wp_strip_all_tags($_POST['acf']['field_60c30d3e6e522']);
    $analysi_epixeirhshs = wp_strip_all_tags($_POST['acf']['field_60c30cc26e520']);
    $prosdiorismos = wp_strip_all_tags($_POST['acf']['field_60c30e8c6e526']);
    $proioda = wp_strip_all_tags($_POST['acf']['field_60c30dd96e524']);
    $stratigiki_marketing = wp_strip_all_tags($_POST['acf']['field_60c30f086e52a']);
    $stratigiki_poliseon = wp_strip_all_tags($_POST['acf']['field_60c30ed26e528']);
    $stratigiki_paragogis = wp_strip_all_tags($_POST['acf']['field_60c30f696e52c']);
    $stratigiki_an_dynamikou = wp_strip_all_tags($_POST['acf']['field_60c30f9c6e52e']);

    $oik_stoixeia = wp_strip_all_tags($_POST['acf']['field_60c30fe26e530']);

    $plano_drashs = wp_strip_all_tags($_POST['acf']['field_60c310290843f']);
    $parartimata = wp_strip_all_tags($_POST['acf']['field_60c3106508441']);


    update_field('field_60c30c546e51e', $stoixeia, $id);
    update_field('field_60c30d3e6e522', $analysi, $id);
    update_field('field_60c30cc26e520', $analysi_epixeirhshs, $id);
    update_field('field_60c30e8c6e526', $prosdiorismos, $id);
    update_field('field_60c30dd96e524', $proioda, $id);
    update_field('field_60c30f086e52a', $stratigiki_marketing, $id);
    update_field('field_60c30ed26e528', $stratigiki_poliseon, $id);
    update_field('field_60c30f696e52c', $stratigiki_paragogis, $id);
    update_field('field_60c30f9c6e52e', $stratigiki_an_dynamikou, $id);

    // update_field('field_60c30fe26e530', $oik_stoixeia, $id);

    update_field('field_60c310290843f', $plano_drashs, $id);
    update_field('field_60c3106508441', $parartimata, $id);


    // var_dump($post_id);
    // var_dump($stoixeia);
    // var_dump($analysi);
    // var_dump($_GET['id']);
    // die();
}
add_filter('acf/save_post', 'business_plan_save_post', 10, 1);
    // function business_plan_save_post($post_id){
    //      if($post_id == 'new_post'){
    //         return $post_id;
    //     }
    //     $stoixeia = wp_strip_all_tags($_POST['acf']['field_5fc6467aa4cae']);
    //     $analysi = wp_strip_all_tags($_POST['acf']['field_5fc6480ba4caf']);
    //     var_dump_pre($stoixeia);
    //     var_dump_pre($analysi);
    //     update_field('field_5fc6467aa4cae', $stoixeia, $post_id);
    //     update_field('field_5fc6480ba4caf', $analysi, $post_id);
    // }