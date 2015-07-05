<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package landing
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses landing_header_style()
 * @uses landing_admin_header_style()
 * @uses landing_admin_header_image()
 */
function landing_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-image'          => get_template_directory_uri().'/img/bg.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'landing_header_style',
        'uploads'       => true,
	 ) );
}
add_action( 'after_setup_theme', 'landing_custom_header_setup' );

if ( ! function_exists( 'landing_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see landing_custom_header_setup().
 */
function landing_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
        .top_wrapper .top_descr .top_text {
            color: #ffffff;
            border-color:  #ffffff;
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
        .top_wrapper .top_descr .top_centered *  {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
            border-color:  #<?php echo esc_attr( $header_text_color ); ?>;
        }
	<?php endif; ?>
	</style>
	<?php
}
endif;
