<?php
/**
 * The template for rendering the sidebar.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>
<div id="sidebar" class="col-md-4">
	<?php if ( ! dynamic_sidebar( 'sidebar-0' ) ) { ?>

		<div class="widget">
			<?php get_search_form(); ?>
		</div><!-- /.widget -->

	<?php } // end if ?>
</div><!-- /#sidebar -->
