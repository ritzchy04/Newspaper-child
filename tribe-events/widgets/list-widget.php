<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.4
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>

	<ol class="tribe-list-widget">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">
				<?php
				if (
					tribe( 'tec.featured_events' )->is_featured( get_the_ID() )
					&& get_post_thumbnail_id( $post )
				) {
					/**
					 * Fire an action before the list widget featured image
					 */
					do_action( 'tribe_events_list_widget_before_the_event_image' );

					/**
					 * Allow the default post thumbnail size to be filtered
					 *
					 * @param $size
					 */
					$featured_image = apply_filters( 'tribe_events_list_widget_thumbnail_size', 'featured-image' );
					?>
					<div class="tribe-event-image" >
						<?php the_post_thumbnail( $featured_image ); ?>
						
					</div>
				<!-- Event Time -->

				<!-- <?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?> -->

					<div class="tribe-event-duration">
						<?php echo tribe_events_event_schedule_details(); ?>
					</div>
					<?php

					/**
					 * Fire an action after the list widget featured image
					 */
					do_action( 'tribe_events_list_widget_after_the_event_image' );
				}
				?>

				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<div class="featured-event-widget-list">
					<div class="be-tribe-event-title">
					<h4 class="tribe-event-title">
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h4>
					</div>
					
						
					<div class="tribe-events-venue-details">		
						
						<a href="<?php echo esc_url (tribe_get_map_link()); ?>" target="_blank">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</a>
						
						
						
							
																	
								<?php
									$event_id = get_the_id();
									$venue_url = tribe_get_event_meta( tribe_get_venue_id( $event_id ), '_VenueURL', true );
									$venue_name = get_the_title( tribe_get_venue_id( $event_id  ) );
									if ( $venue_url ) {
										echo '<a href="' . esc_url( $venue_url ) . '">' . esc_html( $venue_name ) . '</a>';
									} else {
										echo esc_html( $venue_name );
									}
								?>
					</div>
					<div class="be-social-wrapper">
						<span class="fa fa-star" aria-hidden="true"></span>
						<span class="number-going">191 INTERESTED</span> 
					</div>
					
				</div>
				


				
							
				
				</div>
				


			<!-- Venue Display Info -->
			<!-- -->

			<!-- Facebook Going -->
			

			
			</div> <!-- .tribe-events-venue-details -->
			

			
			
		</div>

				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				<!-- Event Time -->

				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

				

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .tribe-list-widget -->

	

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
