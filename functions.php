<?php
/**
 * Theme Functions
 * @version	1.0
 * @since 	1.0
 */

/* ----------------------------------------------------------- *
 * Localization
 * ----------------------------------------------------------- */

function archetype_set_theme_localization() {
	load_theme_textdomain( 'archetype', get_stylesheet_directory() . '/lang' );
} // set_theme_localization
add_action( 'after_setup_theme', 'archetype_set_theme_localization' );

/* ----------------------------------------------------------- *
 * Scripts
 * ----------------------------------------------------------- */

function archetype_enqueue_bootstrap() {

	if ( !defined('ARCHETYPE_ENQUEUE') ) {

		wp_enqueue_style( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' );

		wp_enqueue_script( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array( 'jquery' ) );

		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	} elseif ( defined('ARCHETYPE_ENQUEUE') && ARCHETYPE_ENQUEUE === 'bower' ) {

		wp_enqueue_style( 'archetype-styles', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );

		wp_enqueue_script( 'archetype-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/scripts.min.js', array('jquery'), false, true );

	}

}

add_action( 'wp_enqueue_scripts', 'archetype_enqueue_bootstrap' );

/* ----------------------------------------------------------- *
 * Non-equeuable Scripts
 * ----------------------------------------------------------- */

function archetype_head_markup() {

	// Favicon
	$output = '<link rel="shortcut icon" href="' . apply_filters( 'archetype_shortcut_icon', get_stylesheet_directory_uri() . '/assets/favicon.ico' ) . '" />';

	// Touch Icon
	$output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . apply_filters( 'archetype_touch_icon', get_stylesheet_directory_uri() . '/assets/dist/img/touch-icon.png' ) . '" />';

	if ( !defined('ARCHETYPE_ENQUEUE') ) {

		// Help IE
		$output .= '
		<!--[if lt IE 9]>
			<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<link href="http://maxcdn.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
			<link href="' . get_template_directory_uri() . '/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
			<script src="' . get_template_directory_uri() . '/cross-domain/respond.proxy.js"></script>
			<![endif]-->';

	} else {

		// Help IE
		$output .= '
		<!--[if lt IE 9]>
			<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->';

	}

	echo $output;

}

add_action( 'wp_head', 'archetype_head_markup' );

/* ----------------------------------------------------------- *
 * Theme Support & Registration
 * ----------------------------------------------------------- */

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
register_nav_menu( 'main', 'Main Menu' );
register_sidebar(array(
	'name' => __( 'Main Sidebar' ),
	'id' => 'main-sidebar'
));

/* ----------------------------------------------------------- *
 * Menu Walker
 * ----------------------------------------------------------- */

class Archetype_Nav_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		if($depth >= 1) {
			$output .= apply_filters( 'walker_nav_menu_start_lvl', '<ul class="dropdown-menu submenu-hide">', $depth, $args );
		} else {
			$output .= apply_filters( 'walker_nav_menu_start_lvl', '<ul class="dropdown-menu">', $depth, $args );
		} // end if/else
	} // end start_lvl

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$css_classes = implode( ' ', $item->classes );

		// If the target is specified, then let's add it to the anchor
		$target = isset( $item->target ) && '' != $item->target ? ' target="_blank" ' : '';

		// If a title was specified, let's add it to the anchor
		$title = '' == $item->attr_title ? 'title="' . $item->title . '"' : 'title="' . $item->attr_title . '"';

		// If the XFN was specified, add it to the anchor
		$xfn = '' == $item->xfn ? '' : 'rel="' . $item->xfn . '"';

		// If the current menu item has children, we need to set the proper class names on the list items
		// and the anchors. Parent menu items can't have blank targets.
		if( $args->has_children ) {

			if( $item->menu_item_parent == 0 ) {

				$menu_item = get_permalink() == $item->url ? '<li class="dropdown ' . $css_classes . '">' : '<li class="dropdown ' . $css_classes . '">';
				$menu_item .= '<a href="' . $item->url . '" class="dropdown-toggle" data-toggle="dropdown"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

			} else {

				$menu_item = '<li class="dropdown submenu ' . $css_classes . '">';
				$menu_item .= '<a href="' . $item->url . '" class="dropdown-toggle" data-toggle="dropdown"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

			} // end if/else

			// Otherwise, it's business as usual.
		} else {

			$menu_item = get_permalink() == $item->url ? '<li class="active ' . $css_classes . '">' : '<li class="' . $css_classes . '">';
			$menu_item .= '<a href="' . $item->url . '"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

		} // end if

		// Render the actual menu title
		$menu_item .= $item->title;

		// If the item has children, display the dropdown image
		if($args->has_children) {
			$menu_item .= '<b class="caret"></b>';
		} // end if

		// Close the anchor
		$menu_item .= '</a>';

		$output .= apply_filters ( 'nav_walker_start_el', $menu_item, $item, $depth, $args );

	} // end start_el

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

		$id_field = $this->db_fields['id'];
		if( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		} // end if

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

	} // end display_element

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= apply_filters( 'nav_walker_end_el', '</li>', $item, $depth, $args );
	} // end end_el

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= apply_filters( 'nav_walker_end_lvl', '</ul>', $depth, $args );
	} // end end_lvl

}
