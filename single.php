<?php get_header(); ?>

<h6>This is a single.php file</h6>
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>
<?php get_template_part( './template-parts/content', 'article' ); ?>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
