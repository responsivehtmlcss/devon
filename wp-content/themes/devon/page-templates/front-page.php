<?php
 /**
 * Template Name: Front Page
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

get_header("home"); ?>
	<?php if ( $url != "" ) : ?>
	<div class="page-banner" style="background-image:url(<?php echo $url; ?>);">
	   	<?php the_post_thumbnail('full'); ?>   	
	</div>
    <?php else : ?>
    <div class="home-banner-container clearfix">                    
   		<?php 
			$fields = CFS()->get( 'slider_home' );						
			foreach ( $fields as $field ) {
				$slideimg = $field['image'];
				$slidelink =$field['banner_link'];
				$linktarget = $field['link_target'];	
				foreach ( $linktarget as $value => $value ) {	
				   if ( $slideimg !="" ){
					echo "<div class='page-banner' style='background-image:url($slideimg)'><a target='$value' href='$slidelink'><img src='$slideimg' alt='' /></a></div>";
					}
				}
										
			}
		?>
	</div>	
    <?php endif; ?>

	<div id="primary" class="content-area content-full">
		<div class="site-width-home">
			<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpcustomtheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<div class="featured-content-block clearfix">                    
	               		<?php 
							$fields = CFS()->get( 'image_buttons' );						
							foreach ( $fields as $field ) {
								$blockimg = $field['image'];
								$blockimghover = $field['image_hover'];
								$blocklink =$field['link'];
								echo "<div class='featured-block featured-block-home'>";
								if ( $blockimg !="" ){
								echo "<div class='block-img'><a href='$blocklink'><span class='thumbnail'><img src='$blockimg' alt='' /></span><span class='thumbnail-hover'><img src='$blockimghover' alt='' /></span></a></div>";
								}
								echo '</div>';						
							}
						?>
                	</div>
                </article><!-- #post -->
                </div>
            </div>
                	<div class="footer-top">
						<div class="site-width-home">
							<?php dynamic_sidebar( 'footer-top' ); ?>
						</div>
					</div>
					<div class="site-width-home">
                	<div class="featured-video-container clearfix">
                		<div class="media-section">
                			<div class="media-section-title-image"><img src="<?php echo get_template_directory_uri(); ?>/images/media.png" alt=""></div>
                			<h2 class="media-section-title">Media</h2>
                		</div>
                		<div class="featured-video-block">
	                		<ul class="featured-videos-list clearfix">
		                		<?php
									$fields = CFS()->get( 'featured_videos' );
									if($fields != ""){		

										foreach ( $fields as $field ) {
										
											$featuredvideoid = $field['featured_video_id'];
										    echo "<li><a href='http://youtube.com/embed/$featuredvideoid'\"' class='lightbox-vedio' rel='featured-videos'><span class='thumb'><img src='http://img.youtube.com/vi/$featuredvideoid/0.jpg' alt='' /></span></a></li>";
										}					
									}
								?>
	                		</ul>
                		</div>
                	</div>                	                	
					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'wpcustomtheme' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				
			
			<?php endwhile; ?>

			</div><!-- #content -->
		</div>
	</div><!-- #primary -->
<?php get_footer('home'); ?>
