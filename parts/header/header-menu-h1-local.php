<div id="td-header-menu" class="td-header-menu" role="navigation">
    <div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
    <div class="td-main-menu-logo td-logo-in-menu">
        <?php
        if (td_util::get_option('tds_logo_menu_upload') == '') {
            locate_template('parts/header/logo-h1.php', true, false);
        } else {
            locate_template('parts/header/logo-mobile-h1.php', true, false);
        }?>
    </div>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'menu_class'=> 'sf-menu',
        'fallback_cb' => 'td_wp_page_menu',
        'walker' => new td_tagdiv_walker_nav_menu()
    ));


    //if no menu
    function td_wp_page_menu() {
        //this is the default menu
        echo '<ul class="sf-menu">';
        echo '<li class="menu-item-first"><a href="' . esc_url(home_url( '/' )) . 'wp-admin/nav-menus.php?action=locations">Click here - to select or create a menu</a></li>';
        echo '</ul>';
    }
    ?>
</div>

<div class="menu_rightside_bar">
  <div class="td-search-wrapper">
      <div id="td-top-search">
          <!-- Search -->
          <div class="header-search-wrap">
              <div class="dropdown header-search">
                  <a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
                  <a id="td-header-search-button-mob" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
                  
              </div>
  
          </div>

      </div>
      <div class="sign-in-wrapper">
            <?php
            if ( is_user_logged_in() ) {
                //get current logd in user data
                global $current_user;

                //<span class="td-sp-ico-logout"></span>

                    echo '<ul class="top-header-menu">
                            <li class="menu-item">' . get_avatar($current_user->ID, 20) . '</li>
                            <li class="menu-item display_name">'.$current_user->display_name.' </li>
                            <i class="fa fa-caret-down"></i>

                         </ul> 
                        
                        ';
            } else {

                echo '<ul class="top-header-menu td_ul_login">
                        
                        <li class="menu-item"><a class="td-login-modal-js menu-item" href="#signup-form" data-effect="mpf-td-login-effect">' . __td('REGISTER  ', TD_THEME_NAME) . '</a>
                            <span class="td-sp-ico-login td_sp_login_ico_style"></span>
                        </li>
                        <li class="menu-item"><a class="td-login-modal-js menu-item" href="#login-form" data-effect="mpf-td-login-effect">' . __td('LOGIN', TD_THEME_NAME) . '</a>
                            <span class="td-sp-ico-login td_sp_login_ico_style"></span>
                        </li>
                     </ul>';
            } ?>
        </div>

      
  </div>
  
  </div> <!--menu right side-->
</div>


<div class="header-search-wrap">
	<div class="dropdown header-search">
		<div class="td-drop-down-search" aria-labelledby="td-header-search-button">
			<form method="get" class="td-search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
				<div role="search" class="td-head-form-search-wrap">
					<input id="td-header-search" type="text" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" /><input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="<?php _etd('Search', TD_THEME_NAME)?>" />
				</div>
			</form>
			<div id="td-aj-search"></div>
		</div>
	</div>
</div>


