<?php
/**
 * landing Theme Customizer
 *
 * @package landing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function landing_customize_register($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('title_tagline');

    $wp_customize->remove_control('blogdescription');
    $wp_customize->remove_control('display_header_text');

    $wp_customize->add_section('title_tagline', array(
        'title' => __('Site Title & User Info', 'landing'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('username', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'EL Maxo',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_text_field($str);
        },
    ));

    $wp_customize->add_setting('userskills', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'web developer',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_text_field($str);
        },
    ));

    $wp_customize->add_setting('telephone', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '+9999999999',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_text_field($str);
        },
    ));

    $wp_customize->add_setting('address', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_text_field($str);
        },
    ));

    $wp_customize->add_setting('email', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'you@mail.ru',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_email($str);
        },
    ));

    $wp_customize->add_setting('birthday', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '1988-04-03',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_email($str);
        },
    ));

    $wp_customize->add_setting('site', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'webdesign-master.ru',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return sanitize_text_field($str);
        },
    ));

    $wp_customize->add_setting('prof_description', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Проффестональное создание сайтов: разработка дизайна, верстка, посадка на CMS WOrdPress',
        'transport' => 'postMessage',
        'sanitize_callback' => function ($str) {
            return implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $str ) ) );
        },
    ));

    $wp_customize->add_control('username', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your name', 'landing'),
    ));

    $wp_customize->add_control('userskills', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your speciality', 'landing'),
    ));

    $wp_customize->add_control('telephone', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your telephone', 'landing'),
    ));

    $wp_customize->add_control('address', array(
        'type' => 'textarea',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your address', 'landing'),
    ));

    $wp_customize->add_control('email', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your email', 'landing'),
    ));

    $wp_customize->add_control('birthday', array(
        'type' => 'date',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your birth day', 'landing'),
    ));

    $wp_customize->add_control('site', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your site (without http://)', 'landing'),
    ));

    $wp_customize->add_control('prof_description', array(
        'type' => 'textarea',
        'priority' => 10,
        'section' => 'title_tagline',
        'label' => __('Your Professional Description', 'landing'),
    ));



    $wp_customize->add_section('logo', array(
        'title' => __('Logo', 'landing'),
        'description' => __('Select Your Logo', 'landing'),
        'priority' => 90,
    ));


    $wp_customize->add_setting('logo', array(
        'type' => 'theme_mod',
        'default' => get_template_directory_uri() . '/img/logo.svg',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label' => __('Featured Logo', 'landing'),
                'section' => 'logo',
                'settings' => 'logo',
                'mime_type' => 'image'
            )
        )
    );



    $wp_customize->add_section('photo', array(
        'title' => __('Photo', 'landing'),
        'description' => __('Select Your Photo', 'landing'),
        'priority' => 90,
    ));


    $wp_customize->add_setting('photo', array(
        'type' => 'theme_mod',
        'default' => get_template_directory_uri() . '/img/photo.jpg',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'photo',
            array(
                'label' => __('Your Photo', 'landing'),
                'section' => 'photo',
                'settings' => 'photo'
            )
        )
    );


    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', 'landing_customize_register');


function landing_customize_preview_js()
{
    wp_enqueue_script('landing_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}

add_action('customize_preview_init', 'landing_customize_preview_js');
