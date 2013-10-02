<?php
/**
 * The template for displaying single pages.
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
							<div id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
								<div class="post-header clearfix">
									<?php if ( !is_front_page() ) { ?>
										<h1 class="post-title entry-title"><?php the_title(); ?></h1>
									<?php } ?>
								</div> <!-- /.post-header -->
								<div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
									<div class="content">
										<?php the_content(); ?>
									</div><!-- /.entry-content -->
								</div><!-- /.entry-content -->
							</div> <!-- /#post -->
						<?php } // end while ?>
					<?php } // end if ?>
					<?php comments_template( '', true ); ?>
				</div><!-- /#main -->

				<?php if ( 'right_sidebar_layout' == $presentation_options['layout'] ) {  ?>
					<?php get_sidebar(); ?>
				<?php } // end if ?>

		</div><!--/ row -->
	</div><!--/container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>
