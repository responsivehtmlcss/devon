<?php
/**
 * The template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
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
				<!-- Page header-->
				<div class="entry-content">							
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div><!-- .entry-content -->

				<header class="page-header">
					<h1 class="page-title">
					<?php
					if ( eo_is_event_archive( 'day' ) ) {
						//Viewing date archive
						echo __( 'Events: ','eventorganiser' ).' '.eo_get_event_archive_date( 'jS F Y' );
					} elseif ( eo_is_event_archive( 'month' ) ) {
						//Viewing month archive
						echo __( 'Events: ','eventorganiser' ).' '.eo_get_event_archive_date( 'F Y' );
					} elseif ( eo_is_event_archive( 'year' ) ) {
						//Viewing year archive
						echo __( 'Events: ','eventorganiser' ).' '.eo_get_event_archive_date( 'Y' );
					} else {
						_e( 'Events', 'eventorganiser' );
					}
					?>
					</h1>
				</header>
				<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
				<div class="featured-events">
					<div class="events-list">
						<div class="event clearfix">
							<div class="event-date">
								<div class="month">June</div>
								<div class="date">03</div>
								<div class="year">2016</div>
							</div>
							<div class="details">
								<div class="event-title">Test Event</div>
								<div class="short-description">Lorem Ipsum simpmly dummy text for testing purpose.Lorem Ipsum simpmly dummy text for testing purpose.</div>
								<div class="address">New York City, 220012, USA</div>
							</div>
						</div>
						<div class="event clearfix">
							<div class="event-date">
								<div class="month">June</div>
								<div class="date">03</div>
								<div class="year">2016</div>
							</div>
							<div class="details">
								<div class="event-title">Test Event</div>
								<div class="short-description">Lorem Ipsum simpmly dummy text for testing purpose.Lorem Ipsum simpmly dummy text for testing purpose.</div>
								<div class="address">New York City, 220012, USA</div>
							</div>
						</div>
						<div class="event clearfix">
							<div class="event-date">
								<div class="month">June</div>
								<div class="date">03</div>
								<div class="year">2016</div>
							</div>
							<div class="details">
								<div class="event-title">Test Event</div>
								<div class="short-description">Lorem Ipsum simpmly dummy text for testing purpose.Lorem Ipsum simpmly dummy text for testing purpose.</div>
								<div class="address">New York City, 220012, USA</div>
							</div>
						</div>
						<div class="event clearfix">
							<div class="event-date">
								<div class="month">June</div>
								<div class="date">03</div>
								<div class="year">2016</div>
							</div>
							<div class="details">
								<div class="event-title">Test Event</div>
								<div class="short-description">Lorem Ipsum simpmly dummy text for testing purpose.Lorem Ipsum simpmly dummy text for testing purpose.</div>
								<div class="address">New York City, 220012, USA</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	

</div><!-- #primary -->

<!-- Call template sidebar and footer -->
<?php get_footer();
