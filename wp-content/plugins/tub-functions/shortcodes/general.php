<?php
/**
 * Shortcode functions
 *
 * @package tub
 */


/*
 * Bloginfo Shortcode
 */
function tub_bloginfo( $atts ) {

  extract(
    shortcode_atts(
      array(
       'key' => '',
      ),
      $atts
    )
  );

  return get_bloginfo($key);
}
add_shortcode('bloginfo', 'tub_bloginfo');


/*
 * Get Option Shortcode
 */
function tub_getoption( $atts ) {

  extract(
    shortcode_atts(
      array(
       'variable' => '',
      ),
      $atts
    )
  );

  return get_option($variable);
}
add_shortcode('getoption', 'tub_getoption');


/*
 * Home Widgets Shortcode
 */
function tub_home_widgets() {
  ob_start();
  dynamic_sidebar('homewidgets');
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}
add_shortcode('homewidgets', 'tub_home_widgets');