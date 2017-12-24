/*jQuery(document).ready(function($){
  var $form_modal = $('.cd-user-modal'),
      $form_login = $form_modal.find('#cd-login'),
      $form_signup = $form_modal.find('#cd-signup'),
      $form_forgot_password = $form_modal.find('#cd-reset-password'),
      $form_modal_tab = $('.cd-switcher'),
      $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
      $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
      $forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
      $back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
      $main_nav = $('.main-nav');

      //open modal
      $main_nav.on('click', function(event) {

        if( $(event.target).is($main_nav) ) {
          $(this).children('ul').toggleClass('is-visible');
        } else {
          $main_nav.children('ul').removeClass('is-visible');

          $form_modal.addClass('is-visible');


          ($(event.target).is('.cd-signup')) ? signup_selected() : login_selected();
        }
      });

      //close modal
      $('.cd-user-modal').on('click', function(event) {
        if($(event.target).is($form_modal) || $(event.target).is('.close-form-modal')) {
          $form_modal.removeClass('is-visible');
        }
      });

      //close modal on esc key
      $(document).keyup(function(event){
        if(event.which=='27') {
          $form_modal.removeClass('is-visible');
        }
      });

      //switching nav
      $form_modal_tab.on('click', function(event) {
        event.preventDefault();
        ( $(event.target).is($tab_login)) ? login_selected() : signup_selected();
      });

      //hide or show Password
      $('.hide-password').on('click', function() {
        var $this= $(this),
            $password_field = $this.prev('input');

        ( 'password' == $password_field.attr('type')) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
        ( 'Hide' == $this.text() ) ? $this.text('Show') :$this.text('Hide');
        //focus and move cursor to the end of input field
        $password_field.putCursorAtEnd();
      });

      //show forgot-password form
      $forgot_password_link.on('click', function(event) {
        event.preventDefault();
        forgot_password_selected();
      });

      //back to login from the forgot-password form
      $back_to_login_link.on('click', function(event) {
        event.preventDefault();
        login_selected();
      });

      function login_selected() {
        $form_login.addClass('is-selected');
        $form_signup.removeClass('is-selected');
        $form_forgot_password.removeClass('is-selected');
        $tab_login.addClass('selected');
        $tab_signup.removeClass('selected');
      }

      function signup_selected() {
        $form_login.removeClass('is-selected');
        $form_signup.addClass('is-selected');
        $form_forgot_password.removeClass('is-selected');
        $tab_login.removeClass('selected');
        $tab_signup.addClass('selected');
      }

      function forgot_password_selected() {
        $form_login.removeClass('is-selected');
        $form_signup.removeClass('is-selected');
        $form_forgot_password.addClass('is-selected');
      }

      //show error messages
      $form_login.find('input[type="submit"]').on('click', function(event) {
        event.preventDefault();
        $form_login.find('input[type="password"]').toggleClass('has-error').next('span').toggleClass('is-visible');
      });

      $form_signup.find('input[type="submit"]').on('click', function(event) {
        event.preventDefault();
        $form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
      })



});*/

jQuery(document).on('click', '.top-header-menu .menu-item.display_name', function(event) {
  var x = document.getElementById("user-options-container");

  if(x.style.display === "none") {
    x.style.display = "block"
  } else {
    x.style.display = "none";
  }
});
