<?php
/**
 * WP Custom Theme back compat functionality
 *
 * Prevents WP Custom Theme from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */

/**
 * Prevent switching to WP Custom Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'wpcustomtheme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wpcustomtheme_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * WP Custom Theme on WordPress versions prior to 3.6.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_upgrade_notice() {
	$message = sprintf( __( 'WP Custom Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'wpcustomtheme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_customize() {
	wp_die( sprintf( __( 'WP Custom Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'wpcustomtheme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'wpcustomtheme_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'WP Custom Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'wpcustomtheme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'wpcustomtheme_preview' );
