<?php
/**
 * List View Single Featured Event
 * This file contains one featured event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-featured.php
 *
 * @version 4.5.6
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<div class="be-featured-event-listing" style="background: url(<?php echo tribe_event_featured_image( null, 'featured-image', $link, false ); ?>)">
	<a class="be-listing-link" href="<?php echo esc_url(tribe_get_event_link())?>"></a>
	
	<div class="be-featured-listing-container">
		<div class="be-featured-tag">
			<h5>Featured</h5>
		</div>
		<?php do_action( 'tribe_events_before_the_event_title' ) ?>
		<div class="tribe-event-schedule-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>
		
		<div class="tribe-event-list-event-title-wrapper">
			<h2 class="tribe-event-list-event-title"><?php the_title() ?></h2>
		</div>
		
		
		<?php do_action( 'tribe_events_after_the_event_title' ) ?>
		
		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<div class="tribe-events-event-meta">
			<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<!-- -->
			<div id="tribe-events-venue-details" class="tribe-events-venue-details">
				
					<div id="be-icon" class="be-icon be-icon-marker">
						<a class="icon-cover" href="<?php echo esc_url (tribe_get_map_link()); ?>" target="_blank"></a>	
					</div>
					<div id="pulse" class="pulse"></div>
									
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

			<!-- Facebook Going -->
			
			<div class="be-social-wrapper">
				<span class="fa fa-star" aria-hidden="true"></span>
				<span class="number-going">191 GOING</span> 
			</div>
			
			<div class="be-social-media-faces">
				<span class="fa fa-circle" aria-hidden="true"></span>
				<span class="fa fa-circle" aria-hidden="true"></span>
				<span class="fa fa-circle" aria-hidden="true"></span>
				<span class="fa fa-circle" aria-hidden="true"></span>
				<span class="fa fa-circle" aria-hidden="true"></span>
			</div>
			
			</div> <!-- .tribe-events-venue-details -->
			

			
			<?php endif; ?>
		</div>
	</div> <!-- be-featured-listing-container -->

</div>	
		

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>

<?php
do_action( 'tribe_events_after_the_content' );
