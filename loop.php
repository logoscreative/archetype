<?php
/**
 * The template for displaying standard post formats.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard clearfix' ); ?>>

	<div class="post-header clearfix">

		<?php if ( '' != get_the_post_thumbnail() ) { ?>
			<?php if ( is_single() ) { ?>
				<div class="thumbnail alignleft">
					<a class="thumbnail-link fademe" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'archetype' ), the_title_attribute( 'echo=0' ) ); ?>">
						<?php the_post_thumbnail( 'thumbnail' );	?>
					</a>
				</div> <!-- /.thumbnail -->
			<?php } // end if ?>
		<?php } // end if ?>
		<div class="title-wrap clearfix">
			<?php if( '' !== get_the_title() ) { ?>
				<?php if ( ( is_single() || is_page() ) && !is_front_page() ) { ?>
					<h1 class="post-title entry-title"><?php the_title(); ?></h1>
				<?php } else { ?>
					<h2 class="post-title entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'archetype' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
					</h2>
				<?php } // end if ?>
			<?php } // end if ?>
			<div class="post-header-meta">
				<?php if( is_multi_author() ) { ?>
					<span class="the-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo the_author_meta( 'display_name' ); ?></a>&nbsp;&mdash;&nbsp;</span>
				<?php } // end if ?>
				<?php if( strlen( trim( get_the_title() ) ) == 0 ) { ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'archetype' ), the_title_attribute( 'echo=0' ) ); ?>"><span class="the-time updated"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
				<?php } else { ?>
					<span class="the-time updated"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<?php } // end if/else ?>
				<?php if( comments_open() ) { ?>
					<span class="the-comment-link">&mdash;&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'archetype' ), __( '1 Comment', 'archetype' ), __( '% Comments', 'archetype' ), '', '' ); ?></span>
				<?php } // end if ?>
			</div><!-- /.post-header-meta -->
		</div><!-- /.title-wrap -->

	</div><!-- /.post-header -->

	<div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
		<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
			<?php the_excerpt( ); ?>
			<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'archetype' ); ?></a>
		<?php } else { ?>
			<?php the_content( __( 'Continue Reading...', 'archetype' ) ); ?>
		<?php } // end if/else ?>
		<?php
			wp_link_pages(
				array(
					'before' 	=> '<div class="page-link"><span>' . __( 'Pages:', 'archetype' ) . '</span>',
					'after' 	=> '</div>'
				)
			);
		?>
	</div><!-- /.entry-content -->

	<div class="post-meta clearfix">

		<div class="meta-date-cat-tags pull-left">

			<?php $category_list = get_the_category_list( __( ', ', 'archetype' ) ); ?>
			<?php if( $category_list ) { ?>
				<?php printf( '<span class="the-category">' . __( 'In %1$s', 'archetype' ) . '</span>', $category_list ); ?>
			<?php } // end if ?>

			<?php $tag_list = get_the_tag_list( '', __( ', ', 'archetype' ) ); ?>
			<?php if( $tag_list ) { ?>
				<?php printf( '<span class="the-tags">' . __( '%1$s', 'archetype' ) . '</span>', $tag_list ); ?>
			<?php } // end if ?>

		</div><!-- /meta-date-cat-tags -->

		<div class="meta-comment-link pull-right">
			<?php if ( '' != get_post_format() ) { ?>
				<span class="the-comment-link"><?php comments_popup_link( __( 'Leave a comment', 'archetype' ), __( '1 Comment', 'archetype' ), __( '% Comments', 'archetype' ), '', ''); ?></span>
			<?php } // end if ?>
		</div><!-- /meta-comment-link -->

	</div><!-- /.post-meta -->
</div><!-- /#post -->
