<?php
/**
 * The template for displaying 404 pages.
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

			<div id="main" class="col-md-12 clearfix" role="main">

					<div id="nothing-found" class="no-results not-found">
						<div class="entry-content clearfix">

							<h1 class="404-title"><?php _e( '404', 'archetype' ); ?> <small><?php _e( 'We couldn\'t find what you were looking for.', 'archetype' ); ?></small></h1>
							<p>
								<?php _e( 'The specified address does not contain a page or blog post at this time', 'archetype' ); ?>.
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Page Not Found', 'archetype' ); ?>">
									<?php _e( 'Click here to return home.', 'archetype' ); ?>
								</a>
							</p>

							<?php get_search_form(); ?>

						</div><!-- .entry-content -->
					</div><!-- #post-0 -->

			</div><!-- /#main -->

		</div><!-- /row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>
