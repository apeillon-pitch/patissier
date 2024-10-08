<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('menu')->enqueue();
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Add favicons to <head>.
 *
 */
add_action('wp_head', function () {
    $favicon_path = get_template_directory_uri() . '/resources/images';
    ?>
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-57x57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-60x60.png" sizes="60x60">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-72x72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-114x114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-120x120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-144x144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-152x152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?php echo $favicon_path; ?>/apple-icon-180x180.png" sizes="180x180">
    <link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>/android-icon-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo $favicon_path; ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="msapplication-TileImager" content="ms-icon-144x144">
    <meta name="theme-color" content="#fff">
    <?php
});
