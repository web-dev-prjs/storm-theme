<?php get_header(); ?>

<h6>This is a index.php file</h6>
<section class="content p-md-5">
    <div class="container d-flex justify-content-end align-items-center">
        <div class="blog-nav nav-link nav nav-justified py-md-1">
            <?php the_posts_pagination( array(
                'screen_reader_text' => ' ',
                'mid_size'  => 5,
                'before_page_number' => '<span class="blog-nav nav-link">',
                'after_page_number' => '</span>',
                'prev_next' => true,
                'prev_text' => '<span class="blog-nav nav-link">« Previous</span>',
                'next_text' => '<span class="blog-nav nav-link">Next »</span>',
                ) ); ?>
        </div>
    </div>
    <hr>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
    <?php get_template_part( './template-parts/content', 'archive' ); ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php dynamic_sidebar('om-fsn'); ?>
</section>

<?php get_footer(); ?>

