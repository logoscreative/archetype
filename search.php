<?php
/**
 * The template for displaying search results.
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

				<?php if( '' != get_query_var( 's' ) ) { ?>

					<div id="search-page-title">
	                    <h3><?php _e( 'Search Results For "', 'archetype' ); echo get_query_var( 's' ); _e( '"', 'archetype' ); ?></h3>
	                </div>

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

			<?php } // end if ?>

		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /#wrapper -->

<?php get_footer(); ?>
