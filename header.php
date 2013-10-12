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
        <link rel="shortcut icon" href="<?php echo apply_filters( 'archetype_shortcut_icon', get_stylesheet_directory_uri() . '/assets/favicon.ico' ); ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo apply_filters( 'archetype_touch_icon', get_stylesheet_directory_uri() . '/assets/touch-icon.png' ); ?>" />
		<?php wp_head(); ?>
        <!--[if lt IE 9]>
		<script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
		<link href="http://netdna.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
		<link href="<?php echo get_template_directory_uri() . '/cross-domain/respond.proxy.gif'; ?>" id="respond-redirect" rel="respond-redirect" />
		<script src="<?php echo get_template_directory_uri() . '/cross-domain/respond.proxy.js'; ?>"></script>
        <![endif]-->
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
