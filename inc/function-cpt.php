<?php

//create categories for the post type "teachers"
function om_create_category_taxonomies()
{
    $singular_name = 'Category';
    $pupular_name = 'Categories';
    $labels = array(
        'name' => __($pupular_name),
        'singular_name' => __($singular_name),
        'search_items' =>  __("Search $singular_name"),
        'popular_items' => __("Popular $pupular_name"),
        'all_items' => __("All $pupular_name"),
        'parent_item' => __("Parent $singular_name"),
        'parent_item_colon' => __("Parent $singular_name"),
        'edit_item' => __("Edit $singular_name"),
        'update_item' => __("Update $singular_name"),
        'add_new_item' => __("Add New $singular_name"),
        'new_item_name' => __("New $singular_name Name"),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove categories'),
        'choose_from_most_used' => __('Choose from the most used categories'),
        'menu_name' => __($pupular_name),
    );

    //create categories for the post type "teachers"
    $om_teachers_post_type = 'teachers';
    register_taxonomy(
        $om_teachers_post_type . '_categories',
        $om_teachers_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_teachers_post_type,
                'with_front' => false,
            ),
        )
    );
    
    //create categories for the post type "courses"
    $om_courses_post_type = 'courses';
    register_taxonomy(
        $om_courses_post_type . '_categories',
        $om_courses_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_courses_post_type,
                'with_front' => false,
            ),
        )
    );

    //create categories for the post type "sample-videos"
    $om_sample_videos_post_type = 'sample-videos';
    register_taxonomy(
        $om_sample_videos_post_type . '_categories',
        $om_sample_videos_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_sample_videos_post_type,
                'with_front' => false,
            ),
        )
    );

    //create categories for the post type "landing-pages"
    $om_landing_pages_post_type = 'landing-pages';
    register_taxonomy(
        $om_landing_pages_post_type . '_categories',
        $om_landing_pages_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_landing_pages_post_type,
                'with_front' => false,
            ),
        )
    );
}
add_action('init', 'om_create_category_taxonomies', 0);


// Filter Teachers Post-Type Link Category
function filter_teachers_post_type_link_category($link, $post)
{
    if ($post->post_type !== 'teachers') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'teachers_categories')) {
        $link = str_replace('%teachers_categories%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_teachers_post_type_link_category', 10, 2);


// Filter Courses Post-Type Link Category
function filter_courses_post_type_link_category($link, $post)
{
    if ($post->post_type !== 'courses') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'courses_categories')) {
        $link = str_replace('%courses_categories%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_courses_post_type_link_category', 10, 2);


// Filter Sample_video Post-Type Link Category
function filter_sample_videos_post_type_link_category($link, $post)
{
    if ($post->post_type !== 'sample-videos') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'sample-videos_categories')) {
        $link = str_replace('%sample-videos_categories%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_sample_videos_post_type_link_category', 10, 2);


// Filter landing-pages Post-Type Link Category
function filter_landing_pages_post_type_link_category($link, $post)
{
    if ($post->post_type !== 'landing-pages') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'landing-pages_categories')) {
        $link = str_replace('%landing-pages_categories%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_landing_pages_post_type_link_category', 10, 2);


//create tags for the post type "teachers"
function om_create_tag_taxonomies()
{
    $singular_name = 'Tag';
    $pupular_name = 'Tags';
    $labels = array(
        'name' => __($pupular_name),
        'singular_name' => __($singular_name),
        'search_items' =>  __("Search $singular_name"),
        'popular_items' => __("Popular $pupular_name"),
        'all_items' => __("All $pupular_name"),
        'parent_item' => __("Parent $singular_name"),
        'parent_item_colon' => __("Parent $singular_name"),
        'edit_item' => __("Edit $singular_name"),
        'update_item' => __("Update $singular_name"),
        'add_new_item' => __("Add New $singular_name"),
        'new_item_name' => __("New $singular_name Name"),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove tags'),
        'choose_from_most_used' => __('Choose from the most used tags'),
        'menu_name' => __("$pupular_name"),
    );

    //create tags for the post type "teachers"
    $om_teachers_post_type = 'teachers';
    register_taxonomy(
        $om_teachers_post_type . '_tags',
        $om_teachers_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_teachers_post_type,
                'with_front' => false,
            ),
        )
    );

    //create tags for the post type "courses"    
    $om_courses_post_type = 'courses';
    register_taxonomy(
        $om_courses_post_type . '_tags',
        $om_courses_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_courses_post_type,
                'with_front' => false,
            ),
        )
    );

    //create tags for the post type "sample-videos"
    $om_sample_videos_post_type = 'sample-videos';
    register_taxonomy(
        $om_sample_videos_post_type . '_tags',
        $om_sample_videos_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_sample_videos_post_type,
                'with_front' => false,
            ),
        )
    );

    //create tags for the post type "landing-pages"
    $om_landing_pages_post_type = 'landing-pages';
    register_taxonomy(
        $om_landing_pages_post_type . '_tags',
        $om_landing_pages_post_type,
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => $om_landing_pages_post_type,
                'with_front' => false,
            ),
        )
    );
}
add_action('init', 'om_create_tag_taxonomies', 0);


// Filter Teachers Post-Type Link Tag
function filter_teachers_post_type_link_tag($link, $post)
{
    if ($post->post_type !== 'teachers') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'teachers_tags')) {
        $link = str_replace('%teachers_tags%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_teachers_post_type_link_tag', 10, 2);


// Filter Courses Post-Type Link Tag
function filter_courses_post_type_link_tag($link, $post)
{
    if ($post->post_type !== 'courses') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'courses_tags')) {
        $link = str_replace('%courses_tags%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_courses_post_type_link_tag', 10, 2);


// Filter sample-videos Post-Type Link Tag
function filter_sample_videos_post_type_link_tag($link, $post)
{
    if ($post->post_type !== 'sample-videos') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'sample-videos_tags')) {
        $link = str_replace('%sample-videos_tags%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_sample_videos_post_type_link_tag', 10, 2);


// Filter landing-pages Post-Type Link Tag
function filter_landing_pages_post_type_link_tag($link, $post)
{
    if ($post->post_type !== 'landing-pages') {
        return $link;
    }
    if ($cats = get_the_terms($post->ID, 'landing-pages_tags')) {
        $link = str_replace('%landing-pages_tags%', array_pop($cats)->slug, $link);
    }
    return $link;
}
add_filter('post_type_link', 'filter_landing_pages_post_type_link_tag', 10, 2);


/**
 * ---------------------------------------------------------------------------------------------
 * @package Teachers Post Type
 * @author: webbmakerr
 * @link https://webbmakerr.info
 */

// Registering teachers Custom Post-Type
function om_create_teachers_post_type()
{
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'author',
        'revisions',
        'custom-fields',
        'page-attributes',
    );

    $labels = array(
        'name' => __('Teachers'),
        'singular_name' => __('Teacher'),
        'all_items' => __('All Teachers'),
        'add_new' => __('Add Teacher'),
        'add_new_item' => __('Add New Teacher'),
        'edit_item' => __('Edit Teacher'),
        'new_item' => __('New Teacher'),
        'view_item' => __('View Teacher'),
        'search_items' => __('Search Teacher'),
        'not_found' => __('No Teacher found'),
        'not_found_in_trash' => __('No Teacher found in Trash'),
        'parent_item_colon' => __('Parent Teacher:'),
        'menu_name' => __('Teachers'),
        'name_admin_bar' => __('Teacher'),
    );
    
    $slug = 'teachers/%teachers_categories%';
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Add Teachers Section',   // Description
        'show_ui' => true,  // Displays an interface for this post type
        'show_in_menu' => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus' => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar' => true,  // Displays in the black admin bar
        'menu_position' => 11,  // The position number in the left menu
        'menu_icon' => 'dashicons-groups',    // The URL for the icon used for this post type
        'publicly_queryable' => true,  // Allows queries to be performed on the front-end part if set to true
        'exclude_from_search' => false,  // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'can_export' => true,  // Allows content export using Tools -> Export
        'public' => true,  // Makes the post type public
        'has_archive' => false,
        'capability_type' => 'page',
        'query_var' => true,
        'show_in_rest' => true,
        'rest_base' => 'teachers',
        'rewrite' => array('slug' => $slug, 'with_front' => false),
    );
    register_post_type('teachers', $args); // max 20 character cannot contain capital letters and spaces
}
add_action('init', 'om_create_teachers_post_type', 20);


/**
 * ---------------------------------------------------------------------------------------------
 * @package Courses Post Type
 * @author: webbmakerr
 * @link https://webbmakerr.info
 */

 // Registering courses Custom Post-Type 
function om_create_courses_post_type()
{
    $supports = array(
        'title',
        'excerpt',
        'thumbnail',
        'author',
        'revisions',
        'page-attributes',
    );

    $labels = array(
        'name' => __('Courses'),
        'singular_name' => __('Course'),
        'all_items' => __('All Courses'),
        'add_new' => __('Add Course'),
        'add_new_item' => __('Add New Course'),
        'edit_item' => __('Edit Course'),
        'new_item' => __('New Course'),
        'view_item' => __('View Course'),
        'search_items' => __('Search Course'),
        'not_found' => __('No Course found'),
        'not_found_in_trash' => __('No Course found in Trash'),
        'parent_item_colon' => __('Parent Course:'),
        'menu_name' => __('Courses'),
        'name_admin_bar' => __('Course'),
    );
    
    $slug = 'courses/%courses_categories%';
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Add Courses Section',   // Description
        'show_ui' => true,  // Displays an interface for this post type
        'show_in_menu' => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus' => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar' => true,  // Displays in the black admin bar
        'menu_position' => 12,  // The position number in the left menu
        'menu_icon' => 'dashicons-welcome-learn-more',    // The URL for the icon used for this post type
        'publicly_queryable' => true,  // Allows queries to be performed on the front-end part if set to true
        'exclude_from_search' => false,  // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'can_export' => true,  // Allows content export using Tools -> Export
        'public' => true,  // Makes the post type public
        'has_archive' => false,
        'capability_type' => 'page',
        'query_var' => true,
        'show_in_rest' => true,
        'rest_base' => 'courses',
        'rewrite' => array('slug' => $slug, 'with_front' => false),
    );
    register_post_type('courses', $args); // max 20 character cannot contain capital letters and spaces
}
add_action('init', 'om_create_courses_post_type', 20);


/**
 * ---------------------------------------------------------------------------------------------
 * @package Sample-videos Post Type
 * @author: webbmakerr
 * @link https://webbmakerr.info
 */

 // Registering sample-videos Custom Post-Type 
 function om_create_sample_videos_post_type()
 {
     $supports = array(
         'title',
         'excerpt',
         'thumbnail',
         'author',
         'revisions',
         'page-attributes',
     );
 
     $labels = array(
         'name' => __('Sample Videos'),
         'singular_name' => __('Sample Video'),
         'all_items' => __('All Sample Videos'),
         'add_new' => __('Add Sample Video'),
         'add_new_item' => __('Add New Sample Video'),
         'edit_item' => __('Edit Sample Video'),
         'new_item' => __('New Sample Video'),
         'view_item' => __('View Sample Video'),
         'search_items' => __('Search Sample Video'),
         'not_found' => __('No Sample Video found'),
         'not_found_in_trash' => __('No Sample Video found in Trash'),
         'parent_item_colon' => __('Parent Sample Video:'),
         'menu_name' => __('Sample Videos'),
         'name_admin_bar' => __('Sample Video'),
     );
     
     $slug = 'sample-videos/%sample-videos_categories%';
     
     $args = array(
         'supports' => $supports,
         'labels' => $labels,
         'hierarchical' => true,
         'description' => 'Add Sample Videos Section',   // Description
         'show_ui' => true,  // Displays an interface for this post type
         'show_in_menu' => true,  // Displays in the Admin Menu (the left panel)
         'show_in_nav_menus' => true,  // Displays in Appearance -> Menus
         'show_in_admin_bar' => true,  // Displays in the black admin bar
         'menu_position' => 13,  // The position number in the left menu
         'menu_icon' => 'dashicons-video-alt2',    // The URL for the icon used for this post type
         'publicly_queryable' => true,  // Allows queries to be performed on the front-end part if set to true
         'exclude_from_search' => false,  // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
         'can_export' => true,  // Allows content export using Tools -> Export
         'public' => true,  // Makes the post type public
         'has_archive' => false,
         'capability_type' => 'page',
         'query_var' => true,
         'show_in_rest' => true,
         'rest_base' => 'sample-videos',
         'rewrite' => array('slug' => $slug, 'with_front' => false),
     );
     register_post_type('sample-videos', $args); // max 20 character cannot contain capital letters and spaces
 }
 add_action('init', 'om_create_sample_videos_post_type', 20);

 /**
 * ---------------------------------------------------------------------------------------------
 * @package Landing-pages Post Type
 * @author: webbmakerr
 * @link https://webbmakerr.info
 */

 // Registering landing-pages Custom Post-Type 
function om_create_landing_pages_post_type()
{
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'author',
        'revisions',
        'page-attributes',
    );

    $labels = array(
        'name' => __('Landing Pages'),
        'singular_name' => __('Landing Page'),
        'all_items' => __('All Landing Pages'),
        'add_new' => __('Add Landing Page'),
        'add_new_item' => __('Add New Landing Page'),
        'edit_item' => __('Edit Landing Page'),
        'new_item' => __('New Landing Page'),
        'view_item' => __('View Landing Page'),
        'search_items' => __('Search Landing Page'),
        'not_found' => __('No Landing Page found'),
        'not_found_in_trash' => __('No Landing Page found in Trash'),
        'parent_item_colon' => __('Parent Landing Page:'),
        'menu_name' => __('Landing Pages'),
        'name_admin_bar' => __('Landing Page'),
    );
    
    $slug = 'landing-pages/%landing-pages_categories%';
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Add Landing Pages Section',   // Description
        'show_ui' => true,  // Displays an interface for this post type
        'show_in_menu' => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus' => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar' => true,  // Displays in the black admin bar
        'menu_position' => 14,  // The position number in the left menu
        'menu_icon' => 'dashicons-airplane',    // The URL for the icon used for this post type
        'publicly_queryable' => true,  // Allows queries to be performed on the front-end part if set to true
        'exclude_from_search' => false,  // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'can_export' => true,  // Allows content export using Tools -> Export
        'public' => true,  // Makes the post type public
        'has_archive' => false,
        'capability_type' => 'Landing Page',
        'query_var' => true,
        'show_in_rest' => true,
        'rest_base' => 'landing-pages',
        'rewrite' => array('slug' => $slug, 'with_front' => false),
    );
    register_post_type('landing-pages', $args); // max 20 character cannot contain capital letters and spaces
}
add_action('init', 'om_create_landing_pages_post_type', 20);
