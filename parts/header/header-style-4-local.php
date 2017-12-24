<!--
Header style 4
-->

<div class="td-header-wrap td-header-style-4">

    <div class="td-header-top-menu-full td-container-wrap <?php echo td_util::get_option('td_full_top_bar'); ?>">
        <div class="td-container td-header-row td-header-top-menu">
            <?php td_api_top_bar_template::_helper_show_top_bar() ?>
        </div>
    </div>

    <div class="td-banner-wrap-full td-container-wrap <?php echo td_util::get_option('td_full_header'); ?>">
        <div class="td-header-container td-header-row td-header-header">
            <div class="td-header-sp-recs">
                <?php locate_template('parts/header/ads.php', true); ?>
            </div>
        </div>
    </div>

    <div class="td-header-menu-wrap-full td-container-wrap <?php echo td_util::get_option('td_full_menu'); ?>">
        <div class="td-header-menu-wrap">
            <div class="td-container td-header-row td-header-main-menu black-menu">
                <?php locate_template('parts/header/header-menu-h1.php', true); ?>




            </div>


        </div>
    </div>

</div>
<?php 

    if ( is_user_logged_in() ) {
        global $current_user;
        
               
       

        echo '

                <div id="user-options-container" class="user-options-container" style="display: none;">
                            <ul class="user-options">
                                <li class="user-options-item"><a href="' . get_author_posts_url($current_user->ID). '">' . __td('SAVED EVENTS', TD_THEME_NAME) . '</a></li>
                                <li class="user-options-item"><a href="' . wp_logout_url () . '">'. __td('LOGOUT', TD_THEME_NAME) . '</a></li>
                            </ul>
                </div>';
    } ?>