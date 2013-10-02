<?php
/**
 * The template for displaying a single post and its related content. Uses
 * get_post_format to render the appropriate template.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>
<?php get_header(); ?>

<div id="wrapper">
	<div class="container">
		<div class="row">

			<?php if ( 'left_sidebar_layout' == $presentation_options['layout'] ) { ?>
				<?php get_sidebar(); ?>
			<?php } // end if ?>

			<div id="main" class="col-md-12 clearfix" role="main">

				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop', get_post_format() ); ?>

						<?php get_template_part( 'pagination '); ?>

						<div id="author-box" class="well clearfix">
							<div class="author-box-image">
								<?php echo get_avatar( get_the_author_meta( 'user_email', $post->post_author, '80' ) ); ?>
							</div><!-- /.author-box-image -->
							<h4 class="author-box-name"><?php the_author_meta( 'display_name' ); ?></h4>
							<p>
								<a class="author-link author-posts-url" href="<?php echo trailingslashit( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?> <?php _e( 'Posts', 'archetype'); ?>"><?php _e( 'Posts', 'archetype' ); ?></a>

							<?php if( strlen( trim( get_the_author_meta( 'user_url' ) ) ) > 0 ) { ?>
								<a class="author-link author-url" href="<?php echo trailingslashit( the_author_meta( 'user_url' ) ); ?>" title="<?php _e( 'Website', 'archetype'); ?>" target="_blank" rel="author"><?php _e( 'Website', 'archetype' ); ?></a>
							<?php } // end if ?>

							<?php if( strlen( trim( get_user_meta( get_the_author_meta( 'ID' ), 'twitter', true ) ) ) > 0 ) { ?>
								<a class="author-link icn-twitter" href="<?php echo trailingslashit( get_user_meta( get_the_author_meta( 'ID' ), 'twitter', true ) ); ?>" title="<?php _e( 'Twitter', 'archetype'); ?>" target="_blank"><?php _e( 'Twitter', 'archetype'); ?></a>
							<?php } // end if ?>

							<?php if( strlen( trim( get_user_meta( get_the_author_meta( 'ID' ), 'facebook', true ) ) ) > 0 ) { ?>
								<a class="author-link icn-facebook" href="<?php echo trailingslashit( get_user_meta( get_the_author_meta( 'ID' ), 'facebook', true ) ); ?>" title="<?php _e( 'Facebook', 'archetype'); ?>" target="_blank"><?php _e( 'Facebook', 'archetype'); ?></a>
							<?php } // end if ?>

							<?php
								// Get the Google+ ID based on if we're using Standard's SEO or WordPress SEO
								$google_plus = trailingslashit( get_user_meta( get_the_author_meta( 'ID' ), 'googleplus', true ) );
							?>

							<?php if( 1 < strlen( trim( $google_plus ) ) ) { ?>
								<a class="author-link icn-gplus" rel="author" href="<?php echo $google_plus; ?>" title="<?php _e( 'Google+', 'archetype'); ?>" target="_blank"><?php _e( 'Google+', 'archetype'); ?></a>
							<?php } // end if ?>
							</p>
							<?php if( strlen( trim( the_author_meta( 'description' ) ) > 0 ) ) { ?>
								<div class="author-box-description">
									<p><?php the_author_meta( 'description' ); ?></p>
								</div><!-- /.author-box-description -->
							<?php } // end if ?>
						</div><!-- /.author-box -->

						<?php get_template_part( 'pagination' ); ?>

						<?php comments_template( '', true ); ?>

				 	<?php } // end while ?>

				<?php } // end if ?>
			</div><!-- /#main -->

			<?php if ( 'right_sidebar_layout' == $presentation_options['layout'] ) { ?>
				<?php get_sidebar(); ?>
			<?php } // end if ?>

		</div> <!-- /row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>
