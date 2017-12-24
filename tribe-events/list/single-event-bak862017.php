<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
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

<!-- Event Title -->
<div class="be-listing event-card overlay">
	<a class="acover" href="<?php echo esc_url( tribe_get_event_link() ); ?>"></a>
	<div class="be-cover-image" style="background-image: url(<?php echo tribe_event_featured_image(null, 'full', false, false); ?>);">
	
	
	

<?php do_action( 'tribe_events_before_the_event_title' ) ?>
		<div class="tribe-event-schedule-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>
<h2 class="tribe-events-list-event-title">
	<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

		<!-- Schedule & Recurrence Details -->


		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="be-icon be-icon-marker"></div>
			<a class="icon-cover" href="<?php echo esc_url (tribe_get_map_link()); ?>" target="_blank"></a>
			<div class="pulse"></div>
			
			<div class="tribe-events-venue-details">
					
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

				
			</div> <!-- .tribe-events-venue-details -->
			
		<?php endif; ?>
		
	</div>
</div><!-- .tribe-events-event-meta -->

<!-- Event Cost -->
<?php if ( tribe_get_cost() ) : ?>
	<div class="tribe-events-event-cost">
		<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
		<?php
		/**
		 * Runs after cost is displayed in list style views
		 *
		 * @since 4.5
		 */
		do_action( 'tribe_events_inside_cost' )
		?>
	</div>
<?php endif; ?>

<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Image -->
<!-- <?php echo tribe_event_featured_image( null, 'medium' ); ?> -->

<!-- Event Content  -->
<?php do_action( 'tribe_events_before_the_content' ); ?>
<!-- <div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a>
</div> --> <!-- .tribe-events-list-event-description --> 
		
	</div> <!-- .event-listing-cover-image -->
	
</div>


<?php
do_action( 'tribe_events_after_the_content' );