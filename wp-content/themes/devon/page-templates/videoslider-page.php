<?php
 /**
 * Template Name: Page With YouTube Video Gallery
 *
 * Description: WP_Custom_Theme loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
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
	<div id="primary" class="content-area content-full">
		<div class="site-width">
			<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<h1 class="entry-title"><?php the_title(); ?></h1>

							<?php the_content(); ?>
							<div class="video-slider-outer">
								<div class="vid-container">
									<iframe id="vid_frame" src="http://www.youtube.com/embed/<?php echo CFS()->get( 'default_youtube_video' );	?>?rel=0&showinfo=0&autohide=1" width="100%" height="460" frameborder="0"></iframe>
								</div>
								<ul class="video-slider clearfix">
									<li class="active">
										<a href="#play" class="vid-item" onClick="document.getElementById('vid_frame').src='http://youtube.com/embed/<?php echo CFS()->get( 'default_youtube_video' );	?>?autoplay=1&rel=0&showinfo=0&autohide=1'">
											<span class="thumb">
												<img src="http://img.youtube.com/vi/<?php echo CFS()->get( 'default_youtube_video' );	?>/0.jpg" alt="" />
											</span>
										</a>
									</li>
									
									<?php
										$fields = CFS()->get( 'youtube_videos' );
										if($fields != ""){										
										
											foreach ( $fields as $field ) {
											
												$videoid = $field['youtube_video_id'];
											    echo "<li><a href='#play' class='vid-item' onClick=\"document.getElementById('vid_frame').src='http://youtube.com/embed/$videoid?autoplay=1&rel=0&showinfo=0&autohide=1'\"><span class='thumb'><img src='http://img.youtube.com/vi/$videoid/0.jpg' alt='' /></span></a></li>";
											}
								
										}
									?>

								</ul>

							</div>

							<div class="page-content-bottom"><?php echo CFS()->get( 'other_details' ); ?></div>
							
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpcustomtheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'wpcustomtheme' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
				
			<?php endwhile; ?>

			</div><!-- #content -->
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>
