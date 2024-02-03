<?php
//==============================================//
//                                              //
//        Morgan McDonald Portfolio Site        //
//           Theme Specific Functions           //
//                                              //
//              Created: 03/02/24               //
//                                              //
//==============================================//


// ------------------------------
// ENQUEUEING CSS AND JS
// Added: 03/02/24
// ------------------------------

function my_stylesheets() {
    wp_register_style('info_style', get_template_directory_uri() . '/style.css', '', 1.0, 'all');
    wp_register_style('main_stylesheet', get_template_directory_uri() . '/css/main.css', '', 1.0, 'all');
    wp_enqueue_style('info_style');
    wp_enqueue_style('main_stylesheet');
}

add_action('wp_enqueue_scripts', 'my_stylesheets');

function my_scripts() {
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
