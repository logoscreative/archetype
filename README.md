# Archetype (WordPress Theme)

<img align="right" src="./assets/touch-icon.png" title="Archetype WordPress Theme" alt="Archetype WordPress Theme" /> Forked from the now retired Standard Theme, Archetype serves as a SEO-friendly, fast-loading, Bootstrap-powered foundation for your new theme.

Includes:

1. [Bootstrap 3.3.4](http://getbootstrap.com/)
1. [Font Awesome 4.3.0](http://fortawesome.github.io/Font-Awesome/)

## Why? ##

I've been using Standard Theme as a base for a while now. Knowing that there won't be any updates, I forked it into what I wanted it to be: a bare-bones starting point for Bootstrap projects. Yes, there are other options out there, but they tend to come with too many "enhancements" for my taste. After using this theme successfully on several projects, I decided to release it.

I usually pair it with a litany of other plugins to add functionality as needed. One thing I love using with more savvy clients are these [Bootstrap shortcodes](https://github.com/logoscreative/bs-wp-shortcodes), which I've put into a plugin that I'm releasing now as well.

I see Archetype helping folks in one or both of two ways: being a base for your child theme, or being a fork-able repo for your theme. **While this isn't a difficult theme to implement, it is certainly not plug-and-play.**

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

## Constants ##

### ARCHETYPE_ENQUEUE ###

By default, Archetype pulls Bootstrap and Font Awesome files from [Bootstrap CDN](http://www.bootstrapcdn.com/). To use local resources, you'll use [Bower](http://bower.io/). Once it's installed (`npm install -g bower`), run `bower install` in Archetype's root directory to automatically install the dependencies. Then, place `define( 'ARCHETYPE_ENQUEUE', 'bower' );` in your `wp-config.php` file to enqueue those files instead.

When you use the Bower option, [Grunt](http://gruntjs.com/) lints and compiles LESS and JS files on your behalf. Once you've got the [necessary items](http://gruntjs.com/getting-started) installed, you can start by editing `assets/dev/js/main.js` and `assets/dev/less/main.less`, then run `grunt` in the child theme's directory. Run `grunt watch` to automatically run everything when you save one of the watched files.

## Pro Tip ##

You're probably building a WordPress theme and not an application. As such, you probably don't need 100% of what Bootstrap is offering. Cut down on your file sizes by using the `ARCHETYPE_ENQUEUE` functionality and editing the development files to suit your project.

1. In `Gruntfile.js`, under `uglify->build->src`, delete `bower_components/bootstrap/dist/js/bootstrap.js` as the source and invidually add the files in `bower_components/bootstrap/dist/js` that you need.
1. In `main.less`, delete `@import "../../../bower_components/bootstrap/less/bootstrap.less";` and add the files in `bower_components/bootstrap/less` that you need. You can copy the contents of `bower_components/bootstrap/less/bootstrap.less` and add them to the top of your `main.less` file, removing the imported files you no longer need.

## Troubleshooting ##

Please feel free to file an issue here if you find a bug, and I'll do my best to fix it if it betters the theme for everyone. I'll gladly review pull requests for new features, and will consider merging it—again if it betters the theme for everyone.

**For the most part, this will be unsupported.** I'll do what I can, but don't expect much.
