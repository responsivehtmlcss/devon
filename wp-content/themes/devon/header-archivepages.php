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
	
	<?php $homeurl = esc_url( home_url( '' ) ); ?>
</head>

<body <?php body_class(); ?>>	
	<div class="side_menu_button_wrapper mobile-menu-icon-bar">
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
		<!-- header menu -->		
		<div class="innerpage-mobile-menu mobile-meenu">						
			<div class="header-top-right">
				<div class="watch-video">
					<h2 class="section-title">Watch Video</h2>
					<div class="video-container">
						<iframe width="240" height="135" src="https://www.youtube.com/embed/NRO2EvLR7cY" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<?php 
                   $facebookurl = ot_get_option( 'facebook' );	                   
                   $twitterurl = ot_get_option( 'twitter' );
                   $instagramurl = ot_get_option( 'instagram' );
                   $youtubeurl = ot_get_option( 'youtube' );
				?>
			</div>					
			<div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation clearfix" role="navigation">
                    <button class="menu-toggle"><?php _e( 'Menu', 'wpcustomtheme' ); ?></button>                        
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu clearfix' ) ); ?>	                        
                </nav><!-- #site-navigation -->
			</div><!-- #navbar -->			
			<div class="social_links">
				<?php if ( $facebookurl !="" ) : ?>
					<a href="<?php echo $facebookurl ?>" target="_blank">
						<span class="social-icon">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</span>
					</a>
				<?php endif; ?>	
				<?php if ( $twitterurl !="" ) : ?>
					<a href='<?php echo $twitterurl ?>' target="_blank">
						<span class="social-icon">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>	
					</a>
				<?php endif; ?>
				<?php if ( $instagramurl !="" ) : ?>
					<a href='<?php echo $instagramurl ?>' target="_blank">
						<span class="social-icon">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</span>
					</a>
				<?php endif; ?>
				<?php if ( $youtubeurl !="" ) : ?>
					<a href='<?php echo $youtubeurl ?>' target="_blank">
						<span class="social-icon">							
							<i class="fa fa-youtube" aria-hidden="true"></i>
						</span>
					</a>
				<?php endif; ?>
			</div>
		</div>		
		<!-- header menu end -->
		<header id="masthead" class="site-header clearfix" role="banner">
			<div class="site-width">
				<div class="header clearfix">
					<a class='site-logo logoimage-white' href='<?php echo $homeurl; ?>' title='' rel='home'><img src='<?php echo get_template_directory_uri(); ?>/images/logo_white.png' class='logoimage-white' alt=''></a>
					<div class="innerpage-mobile-menu">						
						<div class="header-top-right">
							<div class="watch-video">								
								<div class="video-container">
									<?php 
					                   $navvideo = ot_get_option( 'navigation_video' );                 
					                   echo $navvideo;
									?>
								</div>
							</div>
							<?php 
		                       $facebookurl = ot_get_option( 'facebook' );	                   
		                       $twitterurl = ot_get_option( 'twitter' );
		                       $instagramurl = ot_get_option( 'instagram' );
		                       $youtubeurl = ot_get_option( 'youtube' );
							?>
							<div class="social_links">
								<?php if ( $facebookurl !="" ) : ?>
									<a href="<?php echo $facebookurl ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<?php endif; ?>	
								<?php if ( $twitterurl !="" ) : ?>
									<a href='<?php echo $twitterurl ?>' target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<?php endif; ?>
								<?php if ( $instagramurl !="" ) : ?>
									<a href='<?php echo $instagramurl ?>' target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								<?php endif; ?>
								<?php if ( $youtubeurl !="" ) : ?>
									<a href='<?php echo $youtubeurl ?>' target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<?php endif; ?>
							</div>
						</div>					
						<div id="navbar" class="navbar">
		                    <nav id="site-navigation" class="navigation main-navigation clearfix" role="navigation">
		                        <button class="menu-toggle"><?php _e( 'Menu', 'wpcustomtheme' ); ?></button>                        
		                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu clearfix' ) ); ?>	                        
		                    </nav><!-- #site-navigation -->
						</div><!-- #navbar -->
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

		<div id="main" class="site-main">
