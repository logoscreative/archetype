<?php
/**
 * Header Template
 * @version	1.0
 * @since 	1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		<?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
		<a href="#main" class="sr-only top-element" title="<?php esc_attr_e( 'Skip to content', 'archetype' ); ?>"><?php _e( 'Skip to content', 'archetype' ); ?></a>
		<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					Menu
				</button>
				<a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <?php echo apply_filters( 'archetype_brand', get_bloginfo('name') ); ?>
                </a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">

				<?php
				$options = array(
					'container'       => false,
					'menu_class'      => 'navbar-nav',
					'items_wrap'      => '<ul id="%1$s" class="nav nav-menu %2$s">%3$s</ul>',
					'fallback_cb'	  => null,
					'walker'		  => new Archetype_Nav_Walker()
				);

				wp_nav_menu($options); ?>

			</div>

		</nav>
