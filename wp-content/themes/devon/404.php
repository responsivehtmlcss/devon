<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */

get_header(); ?>
	<?php 
   		$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
   		$url = $src[0];
		?>
		<?php if ( $url != "" ) : ?>
		<div class="page-banner" style="background-image:url(<?php echo $url; ?>);">
			<?php the_post_thumbnail('full'); ?>
			<div class="banner-curve"></div> 
		</div>
	   <?php else : ?>
	   <div class="page-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/common_banner.jpg);">
	   		<img src="<?php echo get_template_directory_uri(); ?>/images/common_banner.jpg" alt="<?php the_title(); ?>"> 
	   		<div class="banner-curve"></div>  	
	   </div>   
	<?php endif; ?>
	<div id="primary" class="content-area">
		<div class="site-width">
			<div id="content" class="site-content site-content-left" role="main">

				<header class="page-header">
					<h1 class="entry-title"><?php _e( 'Not Found', 'wpcustomtheme' ); ?></h1>
				</header>

				<div class="page-wrapper">
					<div class="page-content">
						<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'wpcustomtheme' ); ?></h2>
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpcustomtheme' ); ?></p>

					</div><!-- .page-content -->
				</div><!-- .page-wrapper -->

			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>