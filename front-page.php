<?php get_header(); ?>

<h6>This is a front-page.php file</h6>
<article class="content px-3 py-5 p-md-5">
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
        
        <p><?php the_content(); ?></p>
            
    <?php endwhile; ?>
    <?php endif; ?>
</article>

<?php get_footer(); ?>
