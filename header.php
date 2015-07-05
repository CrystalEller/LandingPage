<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8"/>
    <title><?php wp_title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body>

<div class="loader">
    <div class="loader_inner"></div>
</div>

<header class="main_head main_color_bg parallax-window"
        data-parallax="scroll"
        data-image-src=<?php header_image(); ?>
        data-z-index="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo_container">
                    <img src="<?php echo get_theme_mod('logo',get_template_directory_uri() . '/img/logo.svg'); ?>"
                         width="80" height="80">
                </div>
                <button class="toggle_mnu">
                    <span class="sandwich">
                        <span class="sw-topper"></span>
                        <span class="sw-bottom"></span>
                        <span class="sw-footer"></span>
                    </span>
                </button>


                <?php
                $defaults = array(
                    'theme_location'  => 'landing',
                    'menu' => 'landing',
                    'container'       => 'nav',
                    'container_class' => 'top_mnu',
                    'items_wrap'      => '<ul>%3$s</ul>',
                );

                wp_nav_menu($defaults);
                ?>
            </div>
        </div>
    </div>
    <div class="top_wrapper">
        <div class="top_descr">
            <div class="top_centered">
                <div class="top_text">
                    <h1><?php echo get_theme_mod('username', 'EL Maxo') ?></h1>

                    <p><?php echo get_theme_mod('userskills', 'web developer') ?></p>
                </div>
            </div>
        </div>
    </div>
</header>