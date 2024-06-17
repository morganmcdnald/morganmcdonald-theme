<?php
//==============================================//
//                                              //
//        Morgan McDonald Portfolio Site        //
//           Theme Specific Functions           //
//                                              //
//              Created: 03/02/24               //
//                                              //
//==============================================//

add_theme_support('post-thumbnails');

// ------------------------------
// ENQUEUEING CSS AND JS
// Added: 03/02/24
// ------------------------------

function my_stylesheets()
{
    wp_register_style('info_style', get_template_directory_uri() . '/style.css', '', 1.0, 'all');
    wp_register_style('main_stylesheet', get_template_directory_uri() . '/css/main.css', '', 1.0, 'all');
    wp_enqueue_style('info_style');
    wp_enqueue_style('main_stylesheet');
}

add_action('wp_enqueue_scripts', 'my_stylesheets');

function my_scripts()
{
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', '', 1.0, true);
    wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'my_scripts');


//==============================
// Gutenberg Options
// Added: 03/02/24
//==============================
function mm_gutenberg_color_palette()
{
    add_theme_support('editor-font-sizes', array()); //Remove font sizes
    add_theme_support('disable-custom-font-sizes'); //Remove custom font size options
    add_theme_support('editor-color-palette'); //Remove colour pallet
    add_theme_support('disable-custom-colors'); //Remove custom colour support
}
add_action('after_setup_theme', 'mm_gutenberg_color_palette');
remove_action('wp_head', 'wp_generator'); //Remove WordPress version from sourcecode


//==============================
// Disable Comments Site Wide
// Added: 03/02/24
//==============================
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
add_filter('comments_open', '__return_false', 20, 2); // Close comments on the front-end
add_filter('pings_open', '__return_false', 20, 2); //Close comments on front end
add_filter('comments_array', '__return_empty_array', 10, 2); // Hide existing comments
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
}); // Remove comments page in menu 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

//==============================
// Create Custom Post Types
// Added: 17/06/24
//==============================

function register_project_cpt()
{
    $labels = array(
        'name'                  => _x('Projects', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Project', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Projects', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Projects', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Project', 'textdomain'),
        'new_item'              => __('New Project', 'textdomain'),
        'edit_item'             => __('Edit Project', 'textdomain'),
        'view_item'             => __('View Project', 'textdomain'),
        'all_items'             => __('All Projects', 'textdomain'),
        'search_items'          => __('Search Projects', 'textdomain'),
        'parent_item_colon'     => __('Parent Project:', 'textdomain'),
        'not_found'             => __('No Projects found.', 'textdomain'),
        'not_found_in_trash'    => __('No Projects found in Trash.', 'textdomain'),
        'featured_image'        => _x('Featured Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Projects', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into Project', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this Project', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter Project list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Project list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'textdomain'),
        'items_list'            => _x('Project list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'query_var'           => true,
        'with_front'          => true,
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'exclude_from_search' => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-desktop',
        'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions'),
    );

    register_post_type('projects', $args);
    unset($labels);
    unset($args);
}
add_action('init', 'register_project_cpt');

function create_technology_taxonomy()
{

    $labels = array(
        'name' => _x('Technologies', 'taxonomy general name'),
        'singular_name' => _x('Technology', 'taxonomy singular name'),
        'search_items' =>  __('Search Technologies'),
        'all_items' => __('All Technologies'),
        'parent_item' => __('Parent Technology'),
        'parent_item_colon' => __('Parent Technology:'),
        'edit_item' => __('Edit Technology'),
        'update_item' => __('Update Technology'),
        'add_new_item' => __('Add New Technology'),
        'new_item_name' => __('New Technology Name'),
        'menu_name' => __('Technologies'),
    );

    register_taxonomy('technologies', array('projects'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        //   'show_admin_column' => false,
        'query_var' => true,
        'show_in_rest' => true,
    ));
    unset($labels);
}

add_action('init', 'create_technology_taxonomy', 0);


//==============================
// Customise Login Screen
// Updated: 04/12/23
//==============================
function cad_login()
{ ?>
    <style type="text/css">
        body.login {
            background-color: #fff;
            color: #292F38;
        }

        body.login #login p.message {
            border-color: #60269E;
        }

        body.login #loginform,
        body.login #lostpasswordform {
            color: #292F38;
            background-color: #fff;
            border: none;
            box-shadow: none;
            border-color: #292F38;
            border-radius: 4px;
        }

        body.login #nav a,
        body.login #backtoblog a,
        body.login #nav a:hover,
        body.login #backtoblog a:hover {
            color: #292F38;
        }

        body.login #wp-submit,
        body.login #loginform #wp-submit,
        body.login input.button {
            padding: 2px 25px;
            border: 2px solid #0091D2;
            color: #ffffff;
            text-transform: uppercase;
            appearance: none;
            font-weight: bold;
            background: none;
            background-color: #0091D2;
            transition: background-color 0.15s, color 0.15s;
        }

        body.login #loginform input[type="text"],
        body.login #loginform input[type="password"],
        body.login #lostpasswordform input[type="text"] {
            background-color: #FFFFFF;
            color: #292F38;
            border-color: #292F38;
        }

        body.login input#wp-submit:hover,
        body.login input.button:hover,
        body.login #loginform #wp-submit:hover {
            background-color: #0091D2;
            color: #FFFFFF;
        }

        body.login #loginform input:focus {
            border-color: #0091D2;
            box-shadow: 0 0 0 1px #292F38;
        }

        body.login #loginform .dashicons {
            color: #000;
        }

        #login h1 a,
        .login h1 a {

            height: 120px;
            width: 90px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }

        body.login #language-switcher {
            display: flex;
            justify-content: center;
        }

        body.login .language-switcher form#language-switcher {
            display: none;
        }

        body.login p#backtoblog {
            display: none;
        }

        body.login #login p#nav {
            text-align: center;
            margin-top: 1rem
        }

        body.login #login p#nav a {
            color: #000;
        }

        body.login #login form#loginform p.submit {
            width: 100%;
            position: relative;
            display: flex;
            justify-content: center;
            padding-top: 3rem;
        }

        body.login #login form#loginform {
            padding-bottom: 0.5rem;
        }

        body.login #wp-submit,
        body.login #loginform #wp-submit,
        body.login input.button {
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.25rem 2rem;
            border: 2px solid #000;
            background-color: #FFF;
            color: #000;
            border-radius: 25px;
            transition: background-color 0.35s, color 0.35s;
        }

        body.login input#wp-submit:hover,
        body.login input.button:hover,
        body.login #loginform #wp-submit:hover {
            background-color: #000;
            color: #FFFFFF;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'cad_login');

//Update logo URL
function cad_login_url()
{
    return home_url();
}
add_filter('login_headerurl', 'cad_login_url');

//Update logo title (hover)
function cad_login_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertext', 'cad_login_url_title');

//Update login Title
function cad_login_title($login_title)
{
    return 'Login - Cole AD';
}
add_filter('login_title', 'cad_login_title');
