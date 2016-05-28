<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
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

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">							
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpcustomtheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>							
						</div><!-- .entry-content -->

						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'wpcustomtheme' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</article><!-- #post -->

				<?php endwhile; ?>

			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>