<article class="content px-3 py-5 p-md-5">
    <div class="container">
        
        <header class="content-header">
            <div class="meta mb-3">

                <!-- POST DATE -->
                <span class="tag date">
                    <?php 
                    $format = 'F j, Y';
                    $before = '<span>Published: ';
                    $after = '</span>';
                    $echo = true;
                    the_date( $format, $before, $after, $echo );
                    ?>
                </span>

                <!-- POST TAGS -->
                <?php
                $before = '<span class="tag"><i class="fas fa-thumbtack fa-fw"></i> ';
                $sep = ' | ';
                $after = '</span>';
                the_tags( $before, $sep, $after );
                ?>

                <!-- POST CATEGORIES -->
                <span class="tag"><i class="fas fa-tag fa-fw"></i>
                <?php
                $separator = ' | ';
                $parents = '';
                $post_id = false;
                the_category( $separator, $parents, $post_id );
                ?>
                </span>

                <!-- POST COMMENTS -->
                <span class="tag comment">
                    <a href="<?php echo esc_url(get_comments_link())?>"><i class="fas fa-comment fa-fw"></i>
                    <?php
                    $zero = 'No Comment';
                    $one = '1 Comment';
                    $more = '% Comments';
                    $post_id = false;
                    comments_number( $zero, $one, $more, $post_id )
                    ?>
                    </a>
                </span>

            </div>
        </header>

        <div class="content-body text-center">
            
            <?php if ( has_post_thumbnail() ) : ?>
            <figure class="blog-banner">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'medium_large' ); ?>
                </a>
                <figcaption class="mt-2 text-center image-caption">Image Credit: 
                    <a href="<?php the_post_thumbnail_url() ?>" target="_blank">URLHere</a>
                </figcaption>
            </figure>
            <?php endif; ?>

            <div class="text-justify">
                <?php the_content(); ?>
            </div>

            <div class="text-justify">
                <?php comments_template(); ?>
            </div>

        </div>
    </div>
</article>
