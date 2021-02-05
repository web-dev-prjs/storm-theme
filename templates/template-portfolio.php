<?php
/**
 * Template Name: Portfolio template
 * Template Post Type: portfolio
 * 
 * @package Portfolio
 * @author webbmakerr
 * @link https://webbmakerr.info
 */

$project_name = get_field( 'project_name' );

?>

<?php get_header(); ?>

<div class="container">
    <div class="content-body text-center my-5">
        <h1><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="blog-banner my-lg-5">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'medium' ); ?>
                </a>
                <figcaption class="mt-2 text-center image-caption">Image Credit: 
                    <a href="<?php the_post_thumbnail_url() ?>" target="_blank">URLHere</a>
                </figcaption>
            </figure>
        <?php endif; ?>
        <p><?php the_content(); ?></p>

        <?php if( $project_name ) : ?>
            <?php echo '<h2>' . $project_name . '</h2>'; ?>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>
