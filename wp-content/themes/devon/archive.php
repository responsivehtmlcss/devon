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

get_header("archivepages"); ?>
	<div class="page-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/common_banner.jpg);">
   		<img src="<?php echo get_template_directory_uri(); ?>/images/common_banner.jpg" alt="<?php the_title(); ?>"> 
   		<div class="banner-curve"></div>  	
   </div>
	<div id="primary" class="content-area content-full">
		<div class="site-width">
			<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">			
				<h1 class="entry-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'wpcustomtheme' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'wpcustomtheme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpcustomtheme' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'wpcustomtheme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpcustomtheme' ) ) );
					else :
						_e( 'Archives', 'wpcustomtheme' );
					endif;
				?></h1>
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
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>
