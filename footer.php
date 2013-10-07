<?php
/**
 * The template for rendering the footer.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>

		<div id="footer" class="clearfix">
			<div id="sub-floor" class="clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="footer-links">
								<?php
								$options = array(
									'container'       => false,
									'menu_class'      => 'nav-justified',
									'items_wrap'      => '<ul id="%1$s" class="nav nav-menu %2$s">%3$s</ul>',
									'fallback_cb'	  => null,
									'depth'           => 1,
									'walker'		  => new Archetype_Nav_Walker()
								);

								wp_nav_menu($options); ?>
							</div><!-- /#footer-links -->

							<div id="credit">

								<?php printf( __( '&copy; %1$s %2$s', 'archetype' ), date( 'Y' ), '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>' ); ?>

							</div><!-- /#credits -->
						</div><!--/col-md-12-->
					</div><!-- /row -->
				</div><!-- /.container -->
			</div><!-- /#sub-floor -->
		</div><!-- /#footer -->
		<?php wp_footer(); ?>
	</body>
</html>
