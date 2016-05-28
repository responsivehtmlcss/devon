<?php
/**
 * WP Custom Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see wpcustomtheme_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 960;

/**
 * WP Custom Theme only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * WP Custom Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * WP Custom Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_setup() {
	/*
	 * Makes WP Custom Theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on WP Custom Theme, use a find and
	 * replace to change 'wpcustomtheme' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'wpcustomtheme', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css' ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'wpcustomtheme' ) );
	register_nav_menu( 'footermenu', __( 'Footer Menu', 'wpcustomtheme' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'wpcustomtheme_setup' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript file with functionality specific to WP Custom Theme.
	wp_enqueue_script( 'bx-slider', get_template_directory_uri() . '/js/bx-slider/jquery.bxslider.min.js', array( 'jquery' ), '20150330', true );	
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'lightboxhelper', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js', array( 'jquery' ), '1', true );
	
	wp_enqueue_script( 'wpcustomtheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );
	wp_enqueue_style( 'bx-slider', get_template_directory_uri() . '/js/bx-slider/jquery.bxslider.css', array(), '1' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '1' );
	// Loads our main stylesheet.
	wp_enqueue_style( 'wpcustomtheme-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'wpcustomtheme-ie', get_template_directory_uri() . '/css/ie.css', array( 'wpcustomtheme-style' ), '2013-07-18' );
	wp_style_add_data( 'wpcustomtheme-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'wpcustomtheme_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since WP Custom Theme 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function wpcustomtheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wpcustomtheme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wpcustomtheme_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'wpcustomtheme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'wpcustomtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Top', 'wpcustomtheme' ),
		'id'            => 'footer-top',
		'description'   => __( 'Appears in the footer top section of the site.', 'wpcustomtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Tweetter widget', 'wpcustomtheme' ),
		'id'            => 'footer-tweeter',
		'description'   => __( 'Appears in the footer 2nd column', 'wpcustomtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-column-title twitter">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Instagram widget', 'wpcustomtheme' ),
		'id'            => 'footer-instagram',
		'description'   => __( 'Appears in the footer 4rth column', 'wpcustomtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-column-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'wpcustomtheme_widgets_init' );

if ( ! function_exists( 'wpcustomtheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'wpcustomtheme' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wpcustomtheme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wpcustomtheme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wpcustomtheme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since WP Custom Theme 1.0
*/
function wpcustomtheme_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'wpcustomtheme' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'wpcustomtheme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'wpcustomtheme' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wpcustomtheme_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own wpcustomtheme_entry_meta() to override in a child theme.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'wpcustomtheme' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		wpcustomtheme_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wpcustomtheme' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wpcustomtheme' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'wpcustomtheme' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'wpcustomtheme_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own wpcustomtheme_entry_date() to override in a child theme.
 *
 * @since WP Custom Theme 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function wpcustomtheme_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'wpcustomtheme' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'wpcustomtheme' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'wpcustomtheme_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since WP Custom Theme 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'wpcustomtheme_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since WP Custom Theme 1.0
 *
 * @return string The Link format URL.
 */
function wpcustomtheme_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'wpcustomtheme_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since WP Custom Theme 1.4
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function wpcustomtheme_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpcustomtheme' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'wpcustomtheme_excerpt_more' );
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since WP Custom Theme 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function wpcustomtheme_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'wpcustomtheme_body_class' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since WP Custom Theme 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wpcustomtheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wpcustomtheme_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since WP Custom Theme 1.0
 */
function wpcustomtheme_customize_preview_js() {
	wp_enqueue_script( 'wpcustomtheme-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'wpcustomtheme_customize_preview_js' );

// Website Logo
function wpcustomtheme_theme_customizer( $wp_customize ) {
  	$wp_customize->add_section( 'wpcustomtheme_logo_section' , array(
    'title'       => __( 'Logo', 'wpcustomtheme' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'wpcustomtheme_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcustomtheme_logo', array(
    'label'    => __( 'Logo', 'wpcustomtheme' ),
    'section'  => 'wpcustomtheme_logo_section',
    'settings' => 'wpcustomtheme_logo',
) ) );
}
add_action( 'customize_register', 'wpcustomtheme_theme_customizer' );
