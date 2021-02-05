<div class="comments-wrapper">
    <div class="comments" id="comments">
        
        <div class="comments-inner">
            <?php 
            $comment_args = array( 
                'avatar_size' => 50, 
                'style' => 'div' 
            ); 
            ?>
            <?php wp_list_comments( $comment_args ) ?>
        </div><!-- comments-inner -->

    </div><!-- comments -->

    <hr>
    <div id="respond" class="comment-respond">
        <?php if( comments_open() ) :?>
            <?php
            $reply_comment = 'Leave a comment';
            if( have_comments() ){
                $reply_comment = 'Leave a Reply';
            }
            $form_args = array(
                'title_reply' => $reply_comment,
            );
            comment_form( $form_args ) 
            ?>
        <?php endif; ?>
    </div><!-- #respond -->
</div>