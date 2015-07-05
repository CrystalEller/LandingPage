<?php

if (!function_exists('landing_setup')) :

    function landing_setup()
    {
        load_theme_textdomain('landing', get_template_directory() . '/languages');

        add_theme_support("title-tag");
        add_theme_support('menus');
        add_theme_support('post-thumbnails');

        $menu_name = 'landing';

        $menu_exists = wp_get_nav_menu_object($menu_name);

        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Обо мне', 'landing'),
                'menu-item-url' => home_url('/#about'),
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Резюме', 'landing'),
                'menu-item-url' => home_url('/#resume'),
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Портволио', 'landing'),
                'menu-item-url' => home_url('/#portfolio'),
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Контакты', 'landing'),
                'menu-item-url' => home_url('/#contacts'),
                'menu-item-status' => 'publish'));

        }


        $menu_name = 'social';

        $menu_exists = wp_get_nav_menu_object($menu_name);

        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Twitter profile', 'landing'),
                'menu-item-target' => '_blank',
                'menu-item-url' => '#',
                'menu-item-classes' => 'fa fa-twitter',
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Facebook profile', 'landing'),
                'menu-item-target' => '_blank',
                'menu-item-url' => '#',
                'menu-item-classes' => 'fa fa-facebook',
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Github profile', 'landing'),
                'menu-item-target' => '_blank',
                'menu-item-url' => '#',
                'menu-item-classes' => 'fa fa-github',
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Vk profile', 'landing'),
                'menu-item-target' => '_blank',
                'menu-item-url' => '#',
                'menu-item-classes' => 'fa fa-vk',
                'menu-item-status' => 'publish'));

        }
    }
endif; // landing_setup
add_action('after_setup_theme', 'landing_setup');


/**
 * Enqueue scripts and styles.
 */

function landing_scripts()
{

    remove_action('wp_head', 'wp_generator');

    wp_enqueue_style('landing-style', get_stylesheet_uri());
    wp_enqueue_style('tomato', get_template_directory_uri() . '/css/skins/tomato.css');
    wp_enqueue_style('media-script', get_template_directory_uri() . '/css/media.css');
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/libs/animate/animate.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');
    wp_enqueue_style('linea_basic', get_template_directory_uri() . '/libs/linea_basic/_ICONFONT/styles.css');

    wp_enqueue_script('landing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true);
    wp_enqueue_script('landing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true);
    wp_enqueue_script('common-script', get_template_directory_uri() . '/js/common.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'landing_scripts');


function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


function remove_wp_nodes()
{
    global $wp_admin_bar;

    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-page');
    $wp_admin_bar->remove_menu('comments');
}

add_action('admin_bar_menu', 'remove_wp_nodes', 999);

function my_remove_menu_pages()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'my_remove_menu_pages');




require get_template_directory() . '/inc/portfolio.php';

require get_template_directory() . '/inc/nav-menu-walker/social-walker.php';

require get_template_directory() . '/inc/theme-settings.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
