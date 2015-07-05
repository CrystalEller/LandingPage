<?php
function work_post_init()
{
    $labels = array(
        'name' => 'Works',
        'singular_name' => 'Book',
        'menu_name' => 'Works',
        'name_admin_bar' => 'Work',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Work',
        'new_item' => 'New Work',
        'edit_item' => 'Edit Work',
        'view_item' => 'View Work',
        'all_items' => 'All Works',
        'not_found_in_trash' => 'No works found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'query_var' => true,
        'rewrite' => array('slug' => 'work'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 25,
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('work', $args);

    $labels = array(
        'name' => 'Portfolios',
        'singular_name' => 'Portfolio',
        'search_items' => 'Search Portfolios',
        'all_items' => 'All Portfolios',
        'edit_item' => 'Edit Portfolio',
        'update_item' => 'Update Portfolio',
        'add_new_item' => 'Add New Portfolio',
        'new_item_name' => 'New Portfolio Name',
        'menu_name' => 'Portfolio',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio'),
    );

    register_taxonomy('portfolio', array('work'), $args);
}

add_action('init', 'work_post_init');

function hide_publishing_actions()
{
    $my_post_type = 'work';
    global $post;
    if ($post->post_type == $my_post_type) {
        echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>
            ';
    }
}

add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');
