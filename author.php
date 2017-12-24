<?php
/*  ----------------------------------------------------------------------------
    the author template
 */

get_header();

//set the template id, used to get the template specific settings
$template_id = 'author';

//prepare the loop variables
global $loop_module_id, $loop_sidebar_position, $part_cur_auth_obj, $wpdb;
$loop_module_id = td_util::get_option('tds_' . $template_id . '_page_layout', 1); //module 1 is default
$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)


// sidebar position used to align the breadcrumb on sidebar left + sidebar first on mobile issue
$td_sidebar_position = '';
if($loop_sidebar_position == 'sidebar_left') {
	$td_sidebar_position = 'td-sidebar-left';
}
//read the current author object - used by here in title and by /parts/author-header.php
$part_cur_auth_obj = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));


//set the global current author object, used by widgets (author widget)
td_global::$current_author_obj = $part_cur_auth_obj;




?>

<?php
global $wpdb;
$get_user_saved_events = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."ulike ORDER BY id DESC");
$image_size = 'full';

?>

<div class="td-main-content-wrap td-container-wrap">
    <div class="td-container <?php echo $td_sidebar_position; ?>">
        <div class="td-crumb-container">
            <?php echo td_page_generator::get_author_breadcrumbs($part_cur_auth_obj); // generate the breadcrumbs ?>
        </div>
        <div class="td-pb-row">
            <?php
            switch ($loop_sidebar_position) {

                /*  ----------------------------------------------------------------------------
                    This is the default option
                    If you set the author template with the right sidebar the theme will use this part
                */
                default:
                    ?>
                        <div class="td-pb-span8 td-main-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header">
                                    <h1 class="entry-title td-page-title">
                                        <span><?php echo $part_cur_auth_obj->display_name; ?></span>
                                    </h1>
                                </div>




									<?php foreach ($get_user_saved_events as $get_user_saved_event) {
										$save_event_image = get_the_post_thumbnail($get_user_saved_event->post_id, $image_size);
										// Setup an array of venue details for use later in the template
										$venue_details = tribe_get_venue_details();

										// Venue
										$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

										// Organizer
										$organizer = tribe_get_organizer();

										?>


									<!--<div class="type-tribe_events">-->

											<div class="saved-event-card overlay" style="background-image: url(<?php echo get_the_post_thumbnail_url($get_user_saved_event->post_id, $image_size); ?>)" >
											<a class="saved-event-link-wrapper" href="<?php echo get_permalink($get_user_saved_event->post_id)?>"></a>
											<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>


											<div class="be-listing-container">
											<?php do_action( 'tribe_events_before_the_event_title' ) ?>
												<div class="tribe-event-schedule-details">

													<?php echo tribe_get_start_date($get_user_saved_event->post_id, false, $date_format='M d @ g:i A'). '-' . tribe_get_end_date($get_user_saved_event->post_id, false, $date_format='g:i A'); ?>
												</div>

												<div class="tribe-event-list-event-title-wrapper">
													<h2 class="tribe-event-list-event-title"><?php echo get_the_title($get_user_saved_event->post_id); ?></h2>
												</div>
												<div class="tribe-events-event-meta">
													<?php if ( $venue_details ) : ?>
													<!-- Venue Display Info -->
													<!-- -->
													<div id="tribe-events-venue-details" class="tribe-events-venue-details">

															<a class="be-icon" href="<?php echo esc_url (tribe_get_map_link($get_user_saved_event->post_id)); ?>" target="_blank">
																<i class="fa fa-map-marker" aria-hidden="true"></i>
															</a>

															<div id="pulse" class="pulse"></div>

																<?php
																	$event_id = $get_user_saved_event->post_id;
																	$venue_url = tribe_get_event_meta( tribe_get_venue_id( $event_id ), '_VenueURL', true );
																	$venue_name = get_the_title( tribe_get_venue_id( $event_id  ) );
																	if ( $venue_url ) {
																		echo '<a href="' . esc_url( $venue_url ) . '">' . esc_html( $venue_name ) . '</a>';
																	} else {
																		echo esc_html( $venue_name );
																	}
																?>

															<!-- Facebook Going -->



													</div> <!-- .tribe-events-venue-details -->

													<div class="be-social-media">
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
													</div>


													<?php endif; ?>
												</div> <!--tribe-events-event-meta-->
											</div> <!--be-listing-container-->
											</div> <!--saved-event-card"-->

										<!---</div> <!--type-tribe_events-->


									<?php } ?> <!--foreach ($get_user_saved_events as $get_user_saved_event)-->



								</div>


                            </div>

                        <div class="td-pb-span4 td-main-sidebar">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    <?php
                    break;



                /*  ----------------------------------------------------------------------------
                    If you set the author template with sidebar left the theme will render this part
                */
                case 'sidebar_left':
                    ?>
                        <div class="td-pb-span8 td-main-content <?php echo $td_sidebar_position; ?>-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header">
                                    <h1 class="entry-title td-page-title">
                                        <span><?php echo $part_cur_auth_obj->display_name; ?></span>
                                    </h1>
                                </div>

                                <?php
                                //load the author box located in - parts/page-author-box.php - can be overwritten by the child theme
                                locate_template('parts/page-author-box.php', true);
                                ?>

                                <?php locate_template('loop.php', true);?>

                                <?php echo td_page_generator::get_pagination(); // the pagination?>
                            </div>
                        </div>
		                <div class="td-pb-span4 td-main-sidebar">
			                <div class="td-ss-main-sidebar">
				                <?php get_sidebar(); ?>
			                </div>
		                </div>
                    <?php
                    break;



                /*  ----------------------------------------------------------------------------
                    If you set the author template with no sidebar the theme will use this part
                */
                case 'no_sidebar':
                    ?>
                        <div class="td-pb-span12 td-main-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header">
                                    <h1 class="entry-title td-page-title">
                                        <span><?php echo $part_cur_auth_obj->display_name; ?></span>
                                    </h1>
                                </div>

                                <?php
                                //load the author box located in - parts/page-author-box.php - can be overwritten by the child theme
                                locate_template('parts/page-author-box.php', true);
                                ?>

                                <?php locate_template('loop.php', true);?>

                                <?php echo td_page_generator::get_pagination(); // the pagination?>
                            </div>
                        </div>
                    <?php
                    break;
            }
            ?>
        </div> <!-- /.td-pb-row -->
    </div> <!-- /.td-container -->
</div> <!-- /.td-main-content-wrap -->

<?php
get_footer();
?>
