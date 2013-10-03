# Archetype (WordPress Theme)

<img align="right" src="./assets/touch-icon.png" title="Archetype WordPress Theme" alt="Archetype WordPress Theme" /> Forked from the now retired Standard Theme, Archetype serves as a SEO-friendly, fast-loading, Bootstrap-powered foundation for your new theme.

Includes:

1. [Bootstrap 3.0](http://getbootstrap.com/)
1. [Font Awesome 3.2.1](http://fortawesome.github.io/Font-Awesome/)

## Why? ##

I've been using Standard Theme as a base for a while now. Knowing that there won't be any updates, I forked it into what I wanted it to be: a bare-bones starting point for Bootstrap projects. Yes, there are other options out there, but they tend to come with too many "enhancements" for my taste. After using this theme successfully on several projects, I decided to release it.

I usually pair it with a litany of other plugins to add functionality as needed. One thing I love using with more savvy clients are these [Bootstrap shortcodes](https://github.com/logoscreative/bs-wp-shortcodes), which I've put into a plugin that I'm releasing now as well.

I see Archetype helping folks in one or both of two ways: being a base for your child theme, or being a fork-able repo for your theme.

## Hooks ##

I've put a minimal amount of hooks into the theme for your convenience (and my own). In case you're unfamiliar, you can use syntax like this code block to pass your own string to the hooks below.

```
function trogdor_custom_nav_logo() {
	return '<img src="' . get_stylesheet_directory_uri() . '/assets/css/img/favicon.png" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" height="40" />';
}

add_filter( 'archetype_brand', 'trogdor_custom_nav_logo' );
```

### archetype_shortcut_icon (shortcut icon) ###

(string) Pass the URL of your favicon

### archetype_touch_icon (apple-touch-icon-precomposed) ###

(string) Pass the URL of your 144x144 icon

### archetype_brand ###

(string) Pass whatever you want to go in the `navbar-brand` area; usually text or an `<img>`

### archetype_search_action ###

(string) Pass a custom URL for the form action; used in `searchform.php` (therefore, when you call `get_search_form()`)