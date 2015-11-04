<?php


/* ------------------------------------------------------------
    Setting Registration
------------------------------------------------------------ */
add_action('admin_init', 'tub_initialize_settings_page');

function tub_initialize_settings_page() {

  /*
   * Add Sections
   */
  add_settings_section(
    'tub_settings_general_section', // Id
    'General', // Title
    'tub_general_callback', // Callback
    'tub-settings-page' // Page
  );

  add_settings_section(
    'tub_settings_social_section',
    'Social Media',
    'tub_social_callback',
    'tub-settings-page'
  );


  /*
   * Add Fields
   */
  // General
  add_settings_field(
    'tub_book_url_link', // ID
    'Book URL', // Title
    'tub_settings_book_url_callback', // Callback
    'tub-settings-page', // Page
    'tub_settings_general_section' // Section
  );

  // Social
  add_settings_field(
    'tub_facebook_link',
    'Facebook URL',
    'tub_settings_facebook_url_callback',
    'tub-settings-page',
    'tub_settings_social_section'
  );
  add_settings_field(
    'tub_google_link',
    'Google+ URL',
    'tub_settings_google_url_callback',
    'tub-settings-page',
    'tub_settings_social_section'
  );
  add_settings_field(
    'tub_twitter_link',
    'Twitter URL',
    'tub_settings_twitter_url_callback',
    'tub-settings-page',
    'tub_settings_social_section'
  );


  /*
   * Register Fields
   */
  register_setting(
    'social-settings',
    'tub_book_url_link'
  );


  register_setting(
    'social-settings',
    'tub_facebook_link'
  );
  register_setting(
    'social-settings',
    'tub_google_link'
  );
  register_setting(
    'social-settings',
    'tub_twitter_link'
  );

}


/* ------------------------------------------------------------
    Setting Callbacks
------------------------------------------------------------ */
/*
 * Section Callbacks
 */
function tub_general_callback() {
  echo '<p>Manage random settings.</p>';
}

function tub_social_callback() {
  echo '<p>Add/Edit your social media accounts here.</p>';
}


/*
 * General Field Callbacks
 */
function tub_settings_book_url_callback() {

  $html = '<input class="large-text" type="text" id="tub_book_url_link" name="tub_book_url_link" value="' . get_option( 'tub_book_url_link', '' ) . '" />';

  echo $html;
}


/*
 * Socail Field Callbacks
 */
function tub_settings_facebook_url_callback() {

  $html = '<input class="large-text" type="text" id="tub_facebook_link" name="tub_facebook_link" value="' . get_option( 'tub_facebook_link', '' ) . '" />';

  echo $html;
}
function tub_settings_google_url_callback() {

  $html = '<input class="large-text" type="text" id="tub_google_link" name="tub_google_link" value="' . get_option( 'tub_google_link', '' ) . '" />';

  echo $html;
}
function tub_settings_twitter_url_callback() {

  $html = '<input class="large-text" type="text" id="tub_twitter_link" name="tub_twitter_link" value="' . get_option( 'tub_twitter_link', '' ) . '" />';

  echo $html;
}


/* ------------------------------------------------------------
    Setting Page
------------------------------------------------------------ */

//Add new settings pages
add_action('admin_menu', 'register_tub_settings_page');

function register_tub_settings_page() {
  add_options_page(
    'TUB Settings',
    'TUB Settings',
    'manage_options',
    'tub-settings-page',
    'tub_settings_page_content'
  );
}

// Settings page content
function tub_settings_page_content() {
?>
  <div class="wrap">
    <h2>TUB Settings</h2>

    <form method="post" action="options.php">
      <?php settings_fields( 'social-settings' ); ?>
      <?php do_settings_sections( 'tub-settings-page' ); ?>

      <hr>

      <?php submit_button(); ?>
    </form>
  </div>
<?php
}