<?php
/* -------------------- THEME FILES SECTION START-------------------- */
// configure theme files
add_action( 'wp_enqueue_scripts', 'om_stormtheme_files', 10, 0 );
function om_stormtheme_files() {
    // theme styles
    $style_version = wp_get_theme()->get( 'Version' );
    $bootstrap_css_version = '4.4.1';
    $font_awesome_version = '5.13.0';
    wp_enqueue_style( 'om-custom-style', get_stylesheet_uri(), array( 'om-bootstrap' ), $style_version, 'all' );
    wp_enqueue_style( 'om-bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), $bootstrap_css_version, 'all' );
    wp_enqueue_style( 'om-fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), $font_awesome_version, 'all' );
    // theme scripts
    $js_version = wp_get_theme()->get( 'Version' );
    $jquery_version = '3.4.1';
    $popper_version = '1.16.0';
    $bootstrap_js_version = '4.4.1';
    wp_enqueue_script( 'om-custom', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), $js_version, true);
    // wp_enqueue_script( 'om-jquery', '//code.jquery.com/jquery-3.4.1.slim.min.js', array(), $jquery_version, true);
    wp_enqueue_script( 'om-popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), $popper_version, true);
    wp_enqueue_script( 'om-bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), $bootstrap_js_version, true);
}
/* -------------------- THEME FILES SECTION END-------------------- */

/* -------------------- THEME FEATURE SECTION START-------------------- */
// configure theme features
add_action( 'after_setup_theme', 'om_stormtheme_features', 10, 0 );
function om_stormtheme_features() {
    // theme menu location
    $menus_location = array(
        'primary' => 'Primary Menu',
        'secondary' => 'Secondary Menu',
        'footer' => 'Footer Menu'
    );
    register_nav_menus( $menus_location );
    // theme features
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
}
/* -------------------- THEME FEATURE SECTION END-------------------- */

/* -------------------- WIDGETS SECTION START-------------------- */
// configure widgets
add_action( 'widgets_init', 'om_stormtheme_widget_area', 10, 0 );
function om_stormtheme_widget_area() {
    $ssn_args = array(
        'name' => 'Sidbar Social Network',
        'description' => 'put your the social network widget',
        'id' => 'om-ssn',
        'class' => 'om-ssn',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    );
    register_sidebar( $ssn_args );
    $fsn_args = array(
        'name' => 'Footer Social Network',
        'description' => 'put your the social network widget',
        'id' => 'om-fsn',
        'class' => 'om-fsn',
        'before_widget' => '<section class="content p-md-5">',
        'after_widget' => '</section>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    );
    register_sidebar( $fsn_args );
}
/* -------------------- WIDGETS SECTION END-------------------- */

/* -------------------- CUSTOM POST TYPE SECTION START-------------------- */
// insert omCreateCustomPostType class
require_once( dirname(__FILE__) . '/classes/class-create-cpt.php' );
// insert omCreateTaxonomyLink class
require_once( dirname(__FILE__) . '/classes/class-create-taxonomy-link.php' );
// arguments array for creating custom post type
$post_types_array = array(
    array(
        'post_type_pupular_name' => 'portfolio', // please use lower letter
        'post_type_singular_name' => 'portfolio', // please use lower letter
        'post_type_icon' => 'dashicons-art',
        'post_type_position' => 35,
        'post_type_capability' => 'page',
        'post_type_show_in_rest' => true,
        'post_type_taxonomies' => array( 'categories', 'tags' ),
        'post_type_supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'author',
            'comments',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
    ),
    array(
        'post_type_pupular_name' => 'courses', // please use lower letter
        'post_type_singular_name' => 'course', // please use lower letter
        'post_type_icon' => 'dashicons-welcome-learn-more',
        'post_type_position' => 36,
        'post_type_capability' => 'page',
        'post_type_show_in_rest' => true,
        'post_type_taxonomies' => array( 'categories', 'tags' ),
        'post_type_supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'author',
            'comments',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
    ),
    array(
        'post_type_pupular_name' => 'projects', // please use lower letter
        'post_type_singular_name' => 'project', // please use lower letter
        'post_type_icon' => 'dashicons-hammer',
        'post_type_position' => 37,
        'post_type_capability' => 'post',
        'post_type_show_in_rest' => false,
        'post_type_taxonomies' => array( 'categories', 'tags' ),
        'post_type_supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'author',
            'comments',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
    ),
);
foreach( $post_types_array as $post_type_args ) {
    // generate custom post type
    if( ! post_type_exists( $post_type_args['post_type_pupular_name'] ) ) {
        new omCreateCustomPostType(
            // labels value
            $post_type_args['post_type_pupular_name'],
            $post_type_args['post_type_singular_name'],
            $post_type_args['post_type_icon'],
            $post_type_args['post_type_position'],
            $post_type_args['post_type_capability'],
            $post_type_args['post_type_show_in_rest'],
            $post_type_args['post_type_taxonomies'],
            // supports value
            $post_type_args['post_type_supports'],
        );
    }
    // Configure taxonomies link for custom post types
    if( count( $post_type_args['post_type_taxonomies'] ) ) {
        foreach( $post_type_args['post_type_taxonomies'] as $post_type_taxonomy ) {
            new omCreateTaxonomyLink( $post_type_taxonomy, $post_type_args['post_type_pupular_name'] );
        }
    }
}
/* -------------------- CUSTOM POST TYPE SECTION END-------------------- */

/* -------------------- CUSTOM META BOX SECTION SRATR-------------------- */
// insert omCreateMetaBox class
include_once( dirname( __FILE__ ) . '/classes/class-create-meta-box.php' );
/**
 * Calls the class on the post edit screen.
 */
function call_omCreateMetaBox() {
    $meta_box_array = array(
        array(
            'meta_box_id_and_name' => '_om_project_name', // Meta box id and name, this is private variable
            'meta_box_id' => 'om_project_name', // Meta box id
            'meta_box_title' => __( 'Project Name', 'textdomain' ), // Meta box title
            'meta_box_post_type' => 'projects', // Post type
            'meta_box_context' => 'normal', // Include each of: 'normal', 'side', 'advanced'
            'meta_box_priority' => 'high', // Meta box display location: 'high', 'low' | Default value: 'default'
            'meta_box_tag_label_text' => 'Enter your project name',
            'meta_box_start_tag_name' => 'input',
            'meta_box_tag_type' => 'text',
            'meta_box_tag_placeholder' => 'Enter your text here',
        ),
        array(
            'meta_box_id_and_name' => '_om_project_description', // Meta box id and name, this is private variable
            'meta_box_id' => 'om_project_description', // Meta box id
            'meta_box_title' => __( 'Project Description', 'textdomain' ), // Meta box title
            'meta_box_post_type' => 'projects', // Post type
            'meta_box_context' => 'advanced', // Include each of: 'normal', 'side', 'advanced'
            'meta_box_priority' => 'high', // Meta box display location: 'high', 'low' | Default value: 'default'
            'meta_box_tag_label_text' => 'Enter your project description',
            'meta_box_start_tag_name' => 'textarea',
            'meta_box_tag_type' => '',
            'meta_box_tag_placeholder' => 'Enter your text here',
        ),
        array(
            'meta_box_id_and_name' => '_om_project_image', // Meta box id and name, this is private variable
            'meta_box_id' => 'om_project_image', // Meta box id
            'meta_box_title' => __( 'Project Image', 'textdomain' ), // Meta box title
            'meta_box_post_type' => 'projects', // Post type
            'meta_box_context' => 'advanced', // Include each of: 'normal', 'side', 'advanced'
            'meta_box_priority' => 'high', // Meta box display location: 'high', 'low' | Default value: 'default'
            'meta_box_tag_label_text' => 'Enter your project image',
            'meta_box_start_tag_name' => 'input',
            'meta_box_tag_type' => 'button',
            'meta_box_tag_placeholder' => 'Enter your image here',
        ),
    );
    
    foreach( $meta_box_array as $meta_box_args ) {
        new omCreateMetaBox( $meta_box_args );
    }
}
if ( is_admin() ) {
    add_action( 'load-post.php',     'call_omCreateMetaBox' );
    add_action( 'load-post-new.php', 'call_omCreateMetaBox' );
}
/* -------------------- CUSTOM META BOX SECTION END-------------------- */
