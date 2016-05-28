<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */

get_header(); ?>
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
					<header class="archive-header">
						<?php if ( category_description() ) : // Show an optional category description ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					</header><!-- .archive-header -->

					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php wpcustomtheme_paging_nav(); ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

				</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
