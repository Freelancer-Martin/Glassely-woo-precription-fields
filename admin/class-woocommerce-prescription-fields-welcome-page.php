<?php

/**
 * Welcome Logic
 *
 * @since 1.0.0
 * @package WPW
 */

if ( ! defined( 'WPINC' ) ) {

    die;

}

/**
 * Welcome page redirect.
 *
 * Only happens once and if the site is not a network or multisite.
 *
 * @since 1.0.0
 */
function wpw_safe_welcome_redirect() {

    // Bail if no activation redirect transient is present.
    if ( ! get_transient( '_welcome_redirect_wpw' ) ) {

        return;

    }

  // Delete the redirect transient.
  delete_transient( '_welcome_redirect_wpw' );

  // Bail if activating from network or bulk sites.
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {

    return;

  }

  // Redirect to Welcome Page.
  // Redirects to `your-domain.com/wp-admin/plugin.php?page=wpw_welcome_page`.
  wp_safe_redirect( add_query_arg( array( 'page' => 'wpw_welcome_page' ), admin_url( 'plugins.php' ) ) );

}

add_action( 'admin_init', 'wpw_safe_welcome_redirect' );

/**
 * Adds welcome page sub menu.
 *
 * @since 1.0.0
 */
function wpw_welcome_page() {

  global $wpw_sub_menu;

  $wpw_sub_menu = add_submenu_page(
      'plugins.php', // The slug name for the parent menu (or the file name of a standard WordPress admin page).
      __( 'Welcome Page', 'wpw' ), // The text to be displayed in the title tags of the page when the menu is selected.
      __( 'Welcome Page', 'wpw' ), // The text to be used for the menu.
      'read', // The capability required for this menu to be displayed to the user.
      'wpw_welcome_page', // The slug name to refer to this menu by (should be unique for this menu).
      'wpw_welcome_page_content' // The function to be called to output the content for this page.
  );

}

add_action( 'admin_menu', 'wpw_welcome_page' );

/**
 * Welcome page content.
 *
 * @since 1.0.0
 */
function wpw_welcome_page_content() {  ?>

        <style>
          .svg .wp-badge.welcome__logo {
            background: url('../img/logo.png') center 24px no-repeat #0092f9;
            background-size: contain;
            color: #fff;
          }

          /* Responsive Youtube Video*/
          .embed-container {
            height: 0;
            max-width: 100%;
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
          }

          .embed-container iframe,
          .embed-container object,
          .embed-container embed {
            top: 0;
            height: 100%;
            left: 0;
            position: absolute;
            width: 100%;
          }
        </style>

        <div class="wrap about-wrap">

        <h1><?php printf( __( 'WordPress Product &nbsp; %s', 'WPW' ), PLUGIN_NAME_VERSION ); ?></h1>

        <div class="about-text">
            <?php printf( __( "WordPress Product's welcome page boilerplate for WordPress plugins.", 'WPW' ), PLUGIN_NAME_VERSION ); ?>
        </div>

        <div class="wp-badge welcome__logo"></div>

        <div class="feature-section one-col">
            <h3><?php _e( 'Get Started', 'WPW' ); ?></h3>
            <ul>
                <li><strong><?php _e( 'Step #1:', 'WPW' ); ?></strong> <?php _e( 'It looks wonderful ! but I need to know what do you mean by resave permalink because I have the 404 issue with my new tab
No problem at all Sebastien. Go to “/wp-admin/options-permalink.php” and click on “Save Changes”', 'WPW' ); ?></li>
                <li><strong><?php _e( 'Step #2:', 'WPW' ); ?></strong> <?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'WPW' ); ?></li>
                <li><strong><?php _e( 'Step #3:', 'WPW' ); ?></strong> <?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'WPW' ); ?></li>
            </ul>
         </div>

        <div class="feature-section one-col">
            <h3><?php _e( 'What is Inside?', 'WPW' ); ?></h3>
            <div class="headline-feature feature-video">
                <div class='embed-container'>
                    <iframe src='https://www.youtube.com/embed/3RLE_vWJ73c' frameborder='0' allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="feature-section two-col">
            <div class="col">
                <img src="http://placehold.it/600x180/0092F9/fff?text=WELCOME" />
                <h3><?php _e( 'Some Feature', 'WPW' ); ?></h3>
                <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.', 'WPW' ); ?></p>
            </div>
            <div class="col">
                <img src="http://placehold.it/600x180/0092F9/fff?text=WELCOME" />
                <h3><?php _e( 'Some Feature', 'WPW' ); ?></h3>
                <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.', 'WPW' ); ?></p>
            </div>
        </div>

        <div class="feature-section two-col">
            <div class="col">
                <img src="http://placehold.it/600x180/0092F9/fff?text=WELCOME" />
                <h3><?php _e( 'Some Feature', 'WPW' ); ?></h3>
                <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.', 'WPW' ); ?></p>
            </div>

            <div class="col">
                <img src="http://placehold.it/600x180/0092F9/fff?text=WELCOME" />
                <h3><?php _e( 'Some Feature', 'WPW' ); ?></h3>
                <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.', 'WPW' ); ?></p>
            </div>
        </div>

      </div>
      <?php
}

/**
 * Enqueue Styles.
 *
 * @since 1.0.0
 */
function wpw_styles( $hook ) {

    global $wpw_sub_menu;

    // Add style to the welcome page only.
    if ( $hook != $wpw_sub_menu ) {

      return;

    }

    // Welcome page styles.
    wp_enqueue_style(
      'wpw_style',
       __FILE__ . '/welcome/css/style.css',
      array(),
       __FILE__,
      'all'
    );

}

// Enqueue the styles.
add_action( 'admin_enqueue_scripts', 'wpw_styles' );
