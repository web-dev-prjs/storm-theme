<?php
/**
 * Template Name: Test template
 * Template Post Type: portfolio, courses, projects, page, post
 *
 * @package Test
 * @author webbmakerr
 * @link https://webbmakerr.info
 */

?><h3>This is a "TEST TEMPLATE"<br><hr><br></h3><?php
$om_meta_boxs = get_post_meta( $post->ID );
$om_project_name = get_post_meta( $post->ID, '_om_project_name_key', true );
$om_project_description = get_post_meta( $post->ID, '_om_project_description_key', true );
$om_first_custom_fields = get_post_meta( $post->ID, 'om_first_custom_fields', true );

?><h4><?php echo $om_project_name; ?></h4><br><hr>
<h4><?php echo $om_project_description; ?></h4><br><hr>
<h4><a href="<?php echo $om_first_custom_fields; ?>">webbmakerr</a></h4><br><hr>
<pre><?php print_r( $om_meta_boxs ); ?></pre><br><hr><?php
