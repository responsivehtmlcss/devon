<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */

get_header(); ?>
dfhdf
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

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'media' ); ?>
					<?php wpcustomtheme_post_nav(); ?>
					<?php comments_template(); ?>

				<?php endwhile; ?>
			</div>
		<?php get_sidebar(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>