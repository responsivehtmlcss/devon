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

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
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
			<div class="watchnow-listing clearfix">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>   
            	<div class="watchnow-list-view">
                	<div class="watchnow-list-content">         	
                        <div class="watchnow-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { echo "<img src='" . $video_thumbnail . "' /><i class='fa fa-play-circle-o'></i>"; } ?></a></div>
                        <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>                        
                        <div class="watchnow-short-des"><?php the_excerpt(); ?></div>
                        <a class="button_learn_more" href="<?php the_permalink(); ?>">Watch Now</a>
                    </div>
                </div>
			<?php endwhile; ?>
			</div>
			<?php wpcustomtheme_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
