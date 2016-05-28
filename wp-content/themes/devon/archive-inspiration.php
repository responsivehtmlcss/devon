<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, WP Custom Theme
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
				<?php if ( have_posts() ) : ?>
					<h1 class="entry-title">Inspiration</h1>

					<?php /* The loop */ ?>
					<div class="watchnow-listing clearfix">
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>   
		            	<div class="watchnow-list-view">
		                	<div class="watchnow-list-content">         	
		                        <div class="watchnow-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { echo "<img src='" . $video_thumbnail . "' /><i class='fa fa-play-circle-o'></i>"; } ?></a></div>		                        		                        
		                    </div>
		                </div>
					<?php endwhile; ?>
					</div>
					<?php wpcustomtheme_paging_nav(); ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
