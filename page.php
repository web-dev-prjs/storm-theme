<?php get_header(); ?>

<h6>This is a page.php file</h6>
<article class="content px-3 py-5 p-md-5">
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
        <?php get_template_part( './template-parts/content', 'page' ) ?>
    <?php endwhile; ?>
    <?php endif; ?>
</article>

<?php get_footer(); ?>
