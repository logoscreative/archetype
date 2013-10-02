<?php
/**
 * Template Name: Full-Width Template
 *
 * The template for rendering pages without sidebars.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>
<?php get_header(); ?>

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
				<div id="content-<?php the_ID(); ?>" class="entry-content">
					<?php the_content(); ?>
				</div><!-- /.entry-content -->
			</div> <!-- /#post -->
		<?php } // end while ?>
	<?php } // end if ?>
	<?php comments_template( '', true ); ?>
</div><!-- /#main -->
<?php get_footer(); ?>
