<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<?php _e( 'This post is password protected. Enter the password to view comments.', 'made' ); ?>
	<?php
		return;
	}
?>

<div id="comments">
        
    <div class="comments-header">
    
        <h2><?php comments_number('0 Comments', 'One Comment', '% Comments' );?></h2>
            
		<?php if ( comments_open() && have_comments() ) : ?>
    
            <div class="leave-comment">
            
                <a href="#respond"><?php _e( 'Leave a comment', 'made' ); ?> &raquo;</a>
            
            </div>
            
        <?php endif; ?>
        
        <br class="clearer" />
        
    </div>
    
    <?php if ( have_comments() ) : ?>
        
        <?php if (show_posts_nav(get_comments_number())) : ?>
    
            <div class="pagination-wrapper comments">
        
                <div class="left-cap">&nbsp;</div>
                
                <?php $args = array(
                    'prev_text'    => __('&laquo;','made'),
                    'next_text'    => __('&raquo;','made') );
                ?> 
                
                <div class="pagination">                	
                    <?php paginate_comments_links($args); ?>
                </div> 
                
                <div class="right-cap">&nbsp;</div>
                
            </div>
            
            <br class="clearer" />
            
        <?php endif; ?> 
        
        <ol class="commentlist">
            <?php wp_list_comments('type=comment&callback=made_comment&max_depth=10'); ?>
            <?php // use this line instead to display all comments and trackbacks instead of just comments
			//<?php wp_list_comments('type=all&callback=made_comment&max_depth=10'); ?>            
        </ol>
        
        <?php if (show_posts_nav(get_comments_number())) : ?>
    
            <div class="pagination-wrapper comments">
        
                <div class="left-cap">&nbsp;</div>
                
                <?php $args = array(
                    'prev_text'    => __('&laquo;','made'),
                    'next_text'    => __('&raquo;','made') );
                ?> 
                
                <div class="pagination">                	
                    <?php paginate_comments_links($args); ?>
                </div> 
                
                <div class="right-cap">&nbsp;</div>
                
            </div>
            
            <br class="clearer" /><br />
            
        <?php endif; ?>
        
        <br />
        
     <?php else : // this is displayed if there are no comments so far ?>
     
        <br />
    
        <?php if ( comments_open() ) : ?>
            <h3 class="be-the-first"><?php _e( 'Be the first to comment!', 'made' ); ?></h3>
    
         <?php else : // comments are closed ?>
            <h3 class="be-the-first"><?php _e( 'Comments are closed.', 'made' ); ?></h3>
    
        <?php endif; ?>
        
        <br />
        
    <?php endif; ?>
    
    <?php if ( comments_open() ) : ?>
    
        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p><?php _e( 'You must be logged in to post a comment.', 'made' ); ?></p>
        <?php else : ?>
        
        	<?php //setup comment form args			
			$fields =  array(
				'author' => '<div class="comment-form-author"><div class="label"><label for="author">' . __( 'Name','made' ) . '</label> ' . ( $req ? '<span class="required">(' . __( 'required', 'made' ) . ')</span>' : '' ) .
							'</div><div class="input-wrapper"><div class="shadow"><div class="icon"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></div></div></div></div>',
				'email'  => '<div class="comment-form-email"><div class="label"><label for="email">' . __( 'Email','made' ) . '</label> ' . ( $req ? '<span class="required">(' . __( 'required', 'made' ) . ')</span>' : '' ) .
							'</div><div class="input-wrapper"><div class="shadow"><div class="icon"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div></div></div></div>',
				'url'    => '<div class="comment-form-url"><div class="label"><label for="url">' . __( 'Website','made' ) . '</label>' .
							'</div><div class="input-wrapper"><div class="shadow"><div class="icon"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div><br class="clearer" />'
			);
						
			$commentargs = array(
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'comment_field' 	   => '<div class="comment-form-comment"><div class="label"><label for="comment">' . __( 'Comment','made' ) . '</label>' .
							'</div><div class="input-wrapper"><div class="shadow"><div class="icon"><textarea id="comment" name="comment" aria-required="true"></textarea></div></div></div></div><br class="clearer" />',
				'title_reply'          => __( 'Leave a Response','made' ),
				'title_reply_to'       => __( 'Leave a Reply to %s','made' ),
			);
			?>
        
            <?php comment_form($commentargs); ?> 
    
        <?php endif; // If registration required and not logged in ?>
    
    <?php endif; ?>
	
</div>