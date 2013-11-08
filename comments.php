<?php
/**
 * The template for displaying comments, pings, and trackbacks on posts, pages, and attachments.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>
<?php
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( __( 'This file cannot be loaded directly.', 'archetype' ) );
} // end if
?>

<?php if ( post_password_required() ) { ?>
    <div id="comments">
        <h3 class="nopassword"><?php _e( 'This post is password protected. Enter the password to view comments.', 'archetype' ); ?></h3>
    </div><!-- #comments -->
    <?php return; ?>
<?php } // end if	?>

<?php if ( have_comments() ) { ?>

    <?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
        <div id="comments" class="clearfix">
            <h3><?php comments_number( __( 'No responses', 'archetype' ), __( 'One response', 'archetype' ), __( '% responses', 'archetype' ) );?> <?php _e( 'to',  'archetype' ); ?> "<?php the_title(); ?>"</h3>
            <ol class="commentlist">
                <?php wp_list_comments( 'avatar_size=50&type=comment' ); ?>
            </ol>
            <div class="comment-navigation clearfix">
                <div class="comment-prev-nav">
                    <?php previous_comments_link( '<i class="fa fa-chevron-left"></i>' . __( 'Previous Comments', 'archetype' ) ); ?>
                </div>
                <div class="comment-next-nav">
                    <?php next_comments_link( __( 'Next Comments', 'archetype' ) . '<i class="fa fa-chevron-right"></i>'); ?>
                </div>
            </div>
        </div><!-- /#comments -->
    <?php } // end if ?>

    <?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>
        <div id="pings">
            <h3>
                <?php _e( 'Trackbacks and Pingbacks:', 'archetype' ); ?>
            </h3>
            <ol class="pinglist">
                <?php wp_list_comments( 'type=pings&per_page=-1' ); ?>
            </ol>
        </div><!-- /#pings -->
    <?php } // end if ?>

<?php } else { ?>

    <?php if( comments_open() ) { ?>
        <div id="no-comments" class="clearfix">
            <p class="title"><?php _e( 'No Comments', 'archetype' ); ?></p>
            <p><?php _e( 'Be the first to start the conversation.', 'archetype' ); ?></p>
        </div><!-- /#no-comments -->
    <?php } // end if ?>

<?php } // end if ?>

<?php comment_form(); ?>
