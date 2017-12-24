<!-- LOGIN MODAL -->
<?php


if (td_util::get_option('tds_login_sign_in_widget') == 'show') {

    //check if admin allow registration
    $users_can_register = get_option('users_can_register');
  	$fb_login = do_shortcode('[Wow-Facebook-Login]');



    //add the Register tab to the modal window if `Anyone can register` check
    $users_can_register_link = '';
    $users_can_register_form = '';
    if($users_can_register == 1){
        $users_can_register_link = '<a id="register-link">' . __td('Create an account', TD_THEME_NAME) . '</a>';
        $users_can_register_form = '
                <div id="td-register-div" class="td-login-form-div td-display-none">
                    <div class="td-login-panel-title">' . __td('Create an account', TD_THEME_NAME) . '</div>
                    <div class="td-login-panel-descr">' . __td('Welcome! Register for an account', TD_THEME_NAME) .'</div>
                    '.$fb_login.'
                    <div class="td-login-panel-descr">' . __td('OR', TD_THEME_NAME) .'</div>
                    <div class="td_display_err"></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_email" id="register_email" value="" required><label>' . __td('your email', TD_THEME_NAME) .'</label></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_user" id="register_user" value="" required><label>' . __td('your username', TD_THEME_NAME) .'</label></div>
                    <input type="button" name="register_button" id="register_button" class="wpb_button btn td-login-button" value="' . __td('Register', TD_THEME_NAME) . '">
                    <div class="td-login-info-text">' . __td('A password will be e-mailed to you.', TD_THEME_NAME) . '</div>
                </div>';
    }




   echo '
           <div  id="login-form" class="white-popup-block mfp-hide mfp-with-anim">
               <div class="td-login-wrap">
                   <a href="#" class="td-back-button"><i class="td-icon-modal-back"></i></a>
                   <div id="td-login-div" class="td-login-form-div td-display-block">
                       <div class="td-login-panel-title">' . __td('Sign in', TD_THEME_NAME) . '</div>
                       <div class="td-login-panel-descr">' . __td('Welcome! Log into your account', TD_THEME_NAME) . '</div>
                       '.$fb_login.'
                       <div class="td-login-panel-descr">' . __td('OR', TD_THEME_NAME) .'</div>
                       <div class="td_display_err"></div>
                       <div class="td-login-inputs"><input class="td-login-input" type="text" name="login_email" id="login_email" value="" required><label>' . __td('your username', TD_THEME_NAME) . '</label></div>
                     <div class="td-login-inputs"><input class="td-login-input" type="password" name="login_pass" id="login_pass" value="" required><label>' . __td('your password', TD_THEME_NAME) . '</label></div>
                       <input type="button" name="login_button" id="login_button" class="wpb_button btn td-login-button" value="' . __td('Login', TD_THEME_NAME) . '">
                       <div class="td-login-info-text"><a href="#" id="forgot-pass-link">' . __td('Forgot your password? Get help', TD_THEME_NAME) . '</a></div>

                   </div>



                    <div id="td-forgot-pass-div" class="td-login-form-div td-display-none">
                       <div class="td-login-panel-title">' . __td('Password recovery', TD_THEME_NAME) . '</div>
                       <div class="td-login-panel-descr">' . __td('Recover your password', TD_THEME_NAME) . '</div>
                       <div class="td_display_err"></div>
                       <div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email" id="forgot_email" value="" required><label>' . __td('your email', TD_THEME_NAME) . '</label></div>
                       <input type="button" name="forgot_button" id="forgot_button" class="wpb_button btn td-login-button" value="' . __td('Send My Password', TD_THEME_NAME) . '">
                       <div class="td-login-info-text">' . __td('A password will be e-mailed to you.', TD_THEME_NAME) . '</div>
                   </div>
               </div>
           </div>

          <div  id="signup-form" class="white-popup-block mfp-hide mfp-with-anim">
              <div class="td-login-wrap">
                <div id="be-register-div" class="td-login-form-div">
                    <div class="td-login-panel-title">' . __td('Create an account', TD_THEME_NAME) . '</div>
                    <div class="td-login-panel-descr">' . __td('Welcome! Register for an account', TD_THEME_NAME) .'</div>
                    '.$fb_login.'
                    <div class="td-login-panel-descr">' . __td('OR', TD_THEME_NAME) .'</div>
                    <div class="td_display_err"></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_email" id="register_email" value="" required><label>' . __td('your email', TD_THEME_NAME) .'</label></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="register_user" id="register_user" value="" required><label>' . __td('your username', TD_THEME_NAME) .'</label></div>
                    <input type="button" name="register_button" id="register_button" class="wpb_button btn td-login-button" value="' . __td('Register', TD_THEME_NAME) . '">
                    <div class="td-login-info-text">' . __td('A password will be e-mailed to you.', TD_THEME_NAME) . '</div>
                </div>
              </div>
          </div> ';
}


  /*          <div class="cd-user-modal">
              <div class="cd-user-modal-container">

                <ul class="cd-switcher">
                  <li><a href="#0">Sign in</a></li>
                  <li><a href="#0">New Account</a></li>
                </ul>
                <div id="cd-login">
                  <form action="" class="cd-form">
                    '.$fb_login.'
                    <p class="fieldset">
                      <label for="signin-username" class="image-replace cd-username">
                        ' . __td('Username', TD_THEME_NAME).'
                      </label>
                      <input type="text" class="fullwidth has-padding has-border" id="signin-username" placeholder="Username" required />
                      <span class="cd-error-message"></span>
                    </p>

                    <p class="fieldset">
                      <label for="signin-password" class="image-replace cd-password">
                        ' . __td('Password', TD_THEME_NAME). '
                      </label>
                      <input type="password" class="fullwidth has-padding has-border" id="signin-password" placeholder="Password" required/>
                      <span class="cd-error-message"></span>
                    </p>

                    <p class="fieldset">
                      <input type="checkbox" id="remember-me" required/>
                      <label for="remember-me">
                        Remember
                      </label>
                    </p>

                    <p class="fieldset">
                      <input type="submit" class="fullwidth" value="' . __td('Login', TD_THEME_NAME) . '"/>
                    </p>

                    <p class="cd-form-bottom-message">
                      <a href="#0">Forgot Password?</a>
                    </p>
                  </form>
                </div>

                <div id="cd-signup">
                  <form action="" class="cd-form">
                    <p class="fieldset">
                      <label for="signup-username" class="image-replace cd-username">
                        ' . __td('Username', TD_THEME_NAME). '
                        <input type="text" class="fullwidth has-padding has-border" id="signup-username" value="" placeholder="Username" required />
                        <span class="cd-error-message">Error Message here!</span>
                      </label>
                    </p>

                    <p class="fieldset">
                      <label for="signup-password" class="image-replace cd-password">
                        ' . __td('Password', TD_THEME_NAME). '
                        <input type="password" class="fullwidth has-padding has-border" id="signup-password" value="" placeholder="Password" required />
                        <a href="#0" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error Message here!</span>
                      </label>
                    </p>

                    <p class="fieldset">
                      <input type="checkbox" id="accept-terms" />
                      <label for="accept-terms">
                        I agree to the <a href="#0">Terms</a>
                      </label>
                    </p>

                    <p class="fieldset">
                      <input type="submit" value="Register" class="full-width has-padding" />
                    </p>
                  </form>
                </div>

                <div id="cd-reset-password">
                  <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                  <form action="" class="cd-form">
                    <p class="fieldset">
                      <label for="reset-email" class="image-replace cd-email">Email</label>
                      <input type="email" id="reset-email" placeholder="E-mail" class="full-width has-padding has-border" />
                      <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                      <input type="submit" value"Reset password" class="full-width has-padding" />
                    </p>
                  </form>

                  <p class="cd-form-bottom-message">
                    <a href="#0" class="cd-close-form">Back to log-in</a>
                  </p>
                </div>
              </div>
            </div>*/
