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

			<div id="main" class="col-md-12 clearfix" role="main">

				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop', get_post_format() ); ?>

						<?php get_template_part( 'pagination '); ?>

						<?php comments_template( '', true ); ?>

				 	<?php } // end while ?>

				<?php } // end if ?>
			</div><!-- /#main -->

		</div> <!-- /row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>
