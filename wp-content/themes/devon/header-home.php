<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */
?><!DOCTYPE html>
<!--[if lt 9]>    <html class="oldie ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="https://use.fontawesome.com/0243d61e2d.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<?php 
       $menucolor = CFS()->get( 'main_menu_color' );
	?>
	<?php if ( $menucolor !="" ) : ?>
	<style type="text/css">
	.main-menu > li > a,
	.main-menu > li:hover > a,
	.main-menu > li > a:focus,
	.header .social_links a  {
		color:<?php echo $menucolor; ?>;
	}
	</style>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>	
    <div class="menusection">
		<div id="navbar" class="navbar">
			<div class="watch-video">
				<h2 class="section-title">Watch Video</h2>
				<div class="video-container">
					<iframe width="240" height="135" src="https://www.youtube.com/embed/NRO2EvLR7cY" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
            <nav id="site-navigation" class="navigation main-navigation clearfix" role="navigation">
                <button class="menu-toggle"><?php _e( 'Menu', 'wpcustomtheme' ); ?></button>                        
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu clearfix' ) ); ?>	                        
            </nav><!-- #site-navigation -->	
            <div class="header-top-right">
				<?php 
                   $facebookurl = ot_get_option( 'facebook' );	                   
                   $twitterurl = ot_get_option( 'twitter' );
                   $instagramurl = ot_get_option( 'instagram' );
                   $youtubeurl = ot_get_option( 'youtube' );
				?>
				<div class="social_links">
					<?php if ( $facebookurl !="" ) : ?>
						<a href="<?php echo $facebookurl ?>" target="_blank">
							<span class="social-icon"><i aria-hidden="true" class="fa fa-facebook"></i></span>
						</a>
					<?php endif; ?>	
					<?php if ( $twitterurl !="" ) : ?>
						<a href='<?php echo $twitterurl ?>' target="_blank">
							<span class="social-icon"><i aria-hidden="true" class="fa fa-twitter"></i></span>
						</a>
					<?php endif; ?>
					<?php if ( $instagramurl !="" ) : ?>
						<a href='<?php echo $instagramurl ?>' target="_blank">
							<span class="social-icon"><i aria-hidden="true" class="fa fa-instagram"></i></span>
						</a>
					<?php endif; ?>
					<?php if ( $youtubeurl !="" ) : ?>
						<a href='<?php echo $youtubeurl ?>' target="_blank">
							<span class="social-icon"><i aria-hidden="true" class="fa fa-youtube"></i></span>
						</a>
					<?php endif; ?>
				</div>
			</div>	                    
		</div><!-- #navbar -->						
	</div>
	<div class="side_menu_button_wrapper">
		<div class="side_menu_button">
			<a href="javascript:void(0);" class="side_menu_button_link clearfix menu-toggle">
				<span>MENU</span>
				<span class="menu-baras">
					<span class="toggle-menu-bar first"></span>
					<span class="toggle-menu-bar second"></span>
					<span class="toggle-menu-bar third"></span>
				</span>
			</a>
		</div>
	</div>
	<div id="page" class="hfeed site">
		<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'wpcustomtheme' ); ?>"><?php _e( 'Skip to content', 'wpcustomtheme' ); ?></a>
		<header id="masthead" class="site-header clearfix" role="banner">
			<div class="site-width">
				<div class="header clearfix">
					<?php 
                       $logowhite = ot_get_option( 'white_logo' );
                       $logoblack = ot_get_option( 'logo' );
					?>
					<?php
						$values = CFS()->get( 'choose_logo' );
						foreach ( $values as $value => $value ) {
						    $selectedlogo = $value;
						  	echo "<a class='site-logo $selectedlogo-logo' href='/' title='' rel='home'><img class='logoimage-black' src='$logoblack' alt=''><img src='$logowhite' class='logoimage-white' alt=''></a>";
						}
					?>
				</div>
			</div>
		</header><!-- #masthead -->

		<div id="main" class="site-main">
