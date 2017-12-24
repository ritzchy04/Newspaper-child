<?php
/*  ----------------------------------------------------------------------------
    the default page template
 */


get_header();


//set the template id, used to get the template specific settings
$template_id = 'page';


$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)

//get theme panel variable for page comments side wide
$td_enable_or_disable_page_comments = td_util::get_option('tds_disable_comments_pages');


//read the custom single post settings - this setting overids all of them
$td_page = td_util::get_post_meta_array($post->ID, 'td_page');
if (!empty($td_page['td_sidebar_position'])) {
    $loop_sidebar_position = $td_page['td_sidebar_position'];
}

// sidebar position used to align the breadcrumb on sidebar left + sidebar first on mobile issue
$td_sidebar_position = '';
if($loop_sidebar_position == 'sidebar_left') {
    $td_sidebar_position = 'td-sidebar-left';
}



/**
 * detect the page builder
 */
$td_use_page_builder = td_global::is_page_builder_content();




if ($td_use_page_builder) {

    // the page is rendered using the page builder template (no sidebars)
    if (have_posts()) { ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <div class="td-main-content-wrap td-main-page-wrap td-container-wrap">
                <div class="<?php if (!td_util::tdc_is_installed()) { echo 'td-container '; } ?>tdc-content-wrap">
                    <?php the_content(); ?>
                </div>
                <?php
                if($td_enable_or_disable_page_comments == 'show_comments') {
                    ?>
                    <div class="td-container">
                        <div class="td-pb-row">
                            <div class="td-pb-span12">
                                <?php comments_template('', true); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div> <!-- /.td-main-content-wrap -->


        <?php endwhile; ?>
    <?php }
} else {

     ?>

    <div class="td-main-content-wrap td-container-wrap event-container-custom" id="event-section-new" style="display:none">
        <div class="event-container-desktop">
            <div class="event-header">
                <div class="header-img" id="header-img-custom">
                </div>
                <div class="header-overlay"></div>
            </div>
            <div class="td-container tdc-content-wrap event-content">
                <div class="td-crumb-container">
                    <div class="td-pb-row">
                        <div class="td-pb-span8 td-main-content">
                            <p class="event-back">
                                <a id="event-back-custom" href=""> « All Events</a>
                            </p>

                            <div class="event-schedule">
                                <span class="event-date-start" id="event-schedule-sdatetime-custom"></span> <span style="display:none" id="event-schedule-datetime-seperator">-</span>
                                <span class="event-date-end" id="event-schedule-edatetime-custom"></span>
                            </div>
                            <div class="single-event-title" id="single-event-title-custom"></div>
                            <div class="event-meta">
                                <div class="event-venue-details">
                                    <i class="fa fa-map-marker"></i><span class="loc-name" id="event-venue-locname">South carolina state fair</span>
                                </div><!--
                                --><div class="event-social-media">
                                    <div class="event-social-wrapper">
                                        <i class="fa fa-star"></i><span class="number-going">191 going</span>
                                    </div>
                                    <div class="event-social-faces">
                                        <span class="fa fa-circle"></span>
                                        <span class="fa fa-circle"></span>
                                        <span class="fa fa-circle"></span>
                                        <span class="fa fa-circle"></span>
                                        <span class="fa fa-circle"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="event-action">
                                <div class="event-save-btn">
                                    <i class="fa fa-star"></i><span class="btn-title">save</span>
                                </div>
                                <div class="event-share-btn">
                                    share on facebook
                                </div>
                            </div>
                            <div class="event-image">
                                <!--img id="event-image-custom" src="http://localhost:8090/wp-content/uploads/2017/08/WOB-trivia-bingo-4.jpg"-->
                                <img id="event-image-custom">
                            </div>
                            <div class="event-description" id="event-description-custom">
                            </div>

                            <div class="event-detail-meta">
                                <div style="display:flex">
                                    <div class="event-left-section">
                                        <div class="event-half-part">
                                            <div class="meta-title">details</div>
                                            <div id="event-datetime-part" style="display:none">
                                                <div class="meta-content">DATE:<span id="event-start-date">Oct 11</span></div>
                                                <div class="meta-content">TIME:<span id="event-start-time">10:00AM</span></div>
                                            </div>
                                            <div id="event-dates-part" style="display:none">
                                                <div class="meta-content">START:<span id="event-date-start"></span></div>
                                                <div class="meta-content">END:<span id="event-date-end"></span></div>
                                            </div>
                                        </div><!--
                                        --><div class="event-half-part" style="padding-left:20px;">
                                            <div class="meta-title">organizer</div>
                                            <div class="meta-content" id="event-organizer-custom">South Carolina State Fair</div>
                                        </div>
                                        <div class="meta-title"> website:</div>
                                        <a class="meta-content" id="event-meta-website-custom" target="_blank"></a>

                                        <div class="event-cal-links">
                                            <a class="gcal-btn" id="event-gcal-custom">+ google calendar</a>
                                            <a class="ical-btn" id="event-ical-custom">+ ical export</a>
                                        </div>
                                    </div><!--
                                    --><div class="event-right-section">
                                        <div class="meta-title">venue</div>
                                        <div class="meta-content" id="event-address">
                                        </div>
                                        <a class="get-directions-btn" id="get-direction-btn-d" target="_blank">

                                                get directions »

                                        </a>
                                    </div>
                                </div>

                                <div id="event-venue-map" class="event-venue-map-md" style="width:100%;"></div>
                            </div>
                        </div>

                        <div class="td-pb-span4 td-main-content">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="event-container-mobile">
            <div class="event-top-detail">
                <div class="event-header-img">
                    <div class="header-img" id="header-img-custom-m">
                    </div>
                    <div class="header-overlay"></div>
                </div>
                <div class="event-header-info">
                    <a class="event-header-back" id="event-back-custom-m">« All Events</a>
                    <div class="event-header-infos">
                        <div class="event-schedule">
                            <span class="event-date-start" id="event-schedule-sdatetime-custom-m"></span><span style="display:none" id="event-schedule-datetime-seperator-m">-</span>
                            <span class="event-date-end" id="event-schedule-edatetime-custom-m"></span>
                        </div>
                        <div class="single-event-title" id="single-event-title-custom-m">title</div>
                        <div class="event-venue-details">
                            <i class="fa fa-map-marker"></i><span class="loc-name" id="event-venue-locname-m">South carolina state fair</span>
                        </div>
                        <div class="event-social-wrapper">
                            <i class="fa fa-star"></i><span class="number-going">191 going</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-main-detail">
                <div class="event-action">
                    <div class="event-save-btn">
                        <i class="fa fa-star"></i><span class="btn-title">save</span>
                    </div>
                    <div class="event-share-btn">
                        share on facebook
                    </div>
                </div>
                <div class="event-description" id="event-description-custom-m">
                </div>
            </div>

            <div class="event-detail-meta">
                <div class="meta-title">details</div>
                <div id="event-datetime-part-m" style="display:none">
                    <div class="meta-content">DATE:<span id="event-start-date-m">Oct 11</span></div>
                    <div class="meta-content">TIME:<span id="event-start-time-m">10:00AM</span></div>
                </div>
                <div id="event-dates-part-m" style="display:none">
                    <div class="meta-content">START:<span id="event-date-start-m">asdfasdf</span></div>
                    <div class="meta-content">END:<span id="event-date-end-m">asdfasdf</span></div>
                </div>

                <div class="meta-title">organizer</div>
                <div class="meta-content" id="event-organizer-custom-m">South Carolina State Fair</div>

                <div class="meta-title">venue</div>
                <div class="meta-content" id="event-address-m"></div>

                <div class="meta-title"> website:</div>
                <a class="meta-content" id="event-meta-website-custom-m" target="_blank"></a>

                <div class="event-cal-links">
                    <a class="gcal-btn" id="event-gcal-custom-m">+ google calendar</a>
                    <a class="ical-btn" id="event-ical-custom-m">+ ical export</a>
                </div>

                <div id="event-venue-map-m" class="event-venue-map-md" style="width:100%;"></div>
                <a id="get-direction-btn-m" target="_blank" class="navigate-btn">
                    navigate »
                </a>
            </div>
        </div>
    </div>
    <div class="td-main-content-wrap td-container-wrap" id="event-section-old" style="display:none">
        <div class="td-container tdc-content-wrap <?php echo $td_sidebar_position; ?>">
            <div class="td-crumb-container">
                <?php echo td_page_generator::get_page_breadcrumbs(get_the_title()); ?>
            </div>
            <div class="td-pb-row">
                <?php
                switch ($loop_sidebar_position) {
                    default:
                        ?>
                        <div class="td-pb-span8 td-main-content" role="main" test="tes">
                            <div class="td-ss-main-content">
                                <?php
                                if (have_posts()) {
                                while ( have_posts() ) : the_post();
                                ?>
                                <div class="td-page-header">
                                    <h1 class="entry-title td-page-title">
                                        <span><?php the_title() ?></span>
                                    </h1>
                                </div>
                                <div class="td-page-content">
                                    <?php
                                    the_content();
                                    endwhile;//end loop

                                    }
                                    ?>
                                </div>
                                <?php
                                if($td_enable_or_disable_page_comments == 'show_comments') {
                                    comments_template('', true);
                                }?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'sidebar_left':
                        ?>
                        <div class="td-pb-span8 td-main-content <?php echo $td_sidebar_position; ?>-content" role="main">
                            <div class="td-ss-main-content">
                                <?php

                                if (have_posts()) {
                                while ( have_posts() ) : the_post();
                                ?>
                                <div class="td-page-header">
                                    <h1 class="entry-title td-page-title">
                                        <span><?php the_title() ?></span>
                                    </h1>
                                </div>
                                <div class="td-page-content">
                                    <?php
                                    the_content();
                                    endwhile; //end loop
                                    }
                                    ?>
                                </div>
                                <?php
                                if($td_enable_or_disable_page_comments == 'show_comments') {
                                    comments_template('', true);
                                }?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'no_sidebar':
                        ?>
                        <div class="td-pb-span12 td-main-content" role="main">

                            <?php
                            if (have_posts()) {
                            while ( have_posts() ) : the_post();
                            ?>
                            <div class="td-page-header">
                                <h1 class="entry-title td-page-title">
                                    <span><?php the_title() ?></span>
                                </h1>
                            </div>
                            <div class="td-page-content">
                                <?php
                                the_content();
                                endwhile; //end loop
                                }
                                ?>
                            </div>
                            <?php
                            if($td_enable_or_disable_page_comments == 'show_comments') {
                                comments_template('', true);
                            }?>
                        </div>
                        <?php
                        break;
                }
                ?>
            </div> <!-- /.td-pb-row -->
        </div> <!-- /.td-container -->
    </div> <!-- /.td-main-content-wrap -->

    <?php
}




get_footer();
