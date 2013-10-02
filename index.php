<?php
/**
 * The template for starting The Loop and rendering general content features such as the breadcrumbs, pagination, and sidebars. Uses
 * get_template_part to render the appropriate template.
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

				<?php if ( is_archive() ) { ?>
	                <div id="archive-page-title">
	                    <h3>
	                        <?php _e( 'Archives For ', 'archetype' ); ?>
	                        <?php if ( is_author() ) { ?>

	                    		<?php
	                    			$author_data = get_userdata( get_query_var( 'author' ) );

	                    			echo ( null == $author_data ) ? get_query_var( 'author_name' ) : $author_data->display_name;
	                    		?>

	                        <?php } elseif ( '' == single_tag_title( '', false ) ) { ?>
	                            <?php echo get_cat_name( get_query_var( 'cat' ) ); ?>
	                        <?php } else { ?>
	                            <?php echo single_tag_title() ?>
	                        <?php } // end if/else ?>
	                    </h3>
	            <?php if( '' != category_description() ) { ?>
	                       <?php echo category_description(); ?>
	                    <?php } // end if ?>
	                </div>
	            <?php } // end if ?>

				<?php if ( have_posts() ) { ?>

					<?php while ( have_posts() ) { ?>
						<?php the_post(); ?>
						<?php get_template_part( 'loop', get_post_format() ); ?>
					<?php } // end while ?>

					<?php get_template_part( 'pagination' ); ?>

				<?php } else { ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Page or resource not found', 'archetype' ); ?></h1>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<p><?php _e( 'No results were found.', 'archetype' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php } // end if/else ?>

			</div><!-- /#main -->

			<?php if ( 'right_sidebar_layout' == $presentation_options['layout'] ) { ?>
				<?php get_sidebar(); ?>
			<?php } // end if ?>

		</div><!-- /row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->

<?php get_footer(); ?>
