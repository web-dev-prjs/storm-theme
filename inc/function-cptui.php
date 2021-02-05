<?php

function cptui_register_my_cpts_courses() {

	/**
	 * Post Type: Courses.
	 */

	$labels = [
		"name" => __( "Courses", "storm-theme" ),
		"singular_name" => __( "Course", "storm-theme" ),
		"menu_name" => __( "Courses", "storm-theme" ),
		"all_items" => __( "All Courses", "storm-theme" ),
		"add_new" => __( "Add Course", "storm-theme" ),
		"add_new_item" => __( "Add New Course", "storm-theme" ),
		"edit_item" => __( "Edit Course", "storm-theme" ),
		"new_item" => __( "New Course", "storm-theme" ),
		"view_item" => __( "View Course", "storm-theme" ),
		"view_items" => __( "View Courses", "storm-theme" ),
		"search_items" => __( "Search Courses", "storm-theme" ),
		"not_found" => __( "No Courses found", "storm-theme" ),
		"not_found_in_trash" => __( "No Courses found in trash", "storm-theme" ),
		"parent" => __( "Parent Course", "storm-theme" ),
		"featured_image" => __( "Featured image for this courses", "storm-theme" ),
		"set_featured_image" => __( "Set featured image for this courses", "storm-theme" ),
		"remove_featured_image" => __( "Remove featured image for this courses", "storm-theme" ),
		"use_featured_image" => __( "Use as featured image for this courses", "storm-theme" ),
		"archives" => __( "Course archives", "storm-theme" ),
		"insert_into_item" => __( "Insert into course", "storm-theme" ),
		"uploaded_to_this_item" => __( "Uploaded to this course", "storm-theme" ),
		"filter_items_list" => __( "Filter courses list", "storm-theme" ),
		"items_list_navigation" => __( "Courses list navigation", "storm-theme" ),
		"items_list" => __( "Courses list", "storm-theme" ),
		"attributes" => __( "Courses attributes", "storm-theme" ),
		"name_admin_bar" => __( "Course", "storm-theme" ),
		"item_published" => __( "Course published", "storm-theme" ),
		"item_published_privately" => __( "Course published privately", "storm-theme" ),
		"item_reverted_to_draft" => __( "Course reverted to draft", "storm-theme" ),
		"item_scheduled" => __( "Course scheduled", "storm-theme" ),
		"item_updated" => __( "Course updated", "storm-theme" ),
		"parent_item_colon" => __( "Parent Course", "storm-theme" ),
	];

	$args = [
		"label" => __( "Courses", "storm-theme" ),
		"labels" => $labels,
		"description" => "This is a courses post type",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "courses",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "courses-archive",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "courses/courses_categories", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 3,
		"menu_icon" => "dashicons-nametag",
		"supports" => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'author',
            'comments',
            'revisions',
            'page-attributes',
            'custom-fields',
        ],
		"taxonomies" => [ "category", "post_tag", "product_cat", "product_tag", "product_shipping_class", "portfolio_categories", "portfolio_tags" ],
	];

	register_post_type( "courses", $args );
}

add_action( 'init', 'cptui_register_my_cpts_courses' );
