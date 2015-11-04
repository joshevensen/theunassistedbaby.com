<?php
/**
 * Plugin Name: Custom TUB
 * Description: Add custom functions to Wordpress such as widgets, shortcodes, and custom admin functions.
 * Version: 1.0
 * Author: Josh Evensen
 */

define( 'TUB_FUNCTIONS_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

require_once TUB_FUNCTIONS_PLUGIN_DIR . '/admin/settings.php';
require_once TUB_FUNCTIONS_PLUGIN_DIR . '/admin/admin.php';

require_once TUB_FUNCTIONS_PLUGIN_DIR . '/cpt/articles.php';
require_once TUB_FUNCTIONS_PLUGIN_DIR . '/cpt/resources.php';

require_once TUB_FUNCTIONS_PLUGIN_DIR . '/taxonomies/resource_types.php';

require_once TUB_FUNCTIONS_PLUGIN_DIR . '/shortcodes/general.php';
require_once TUB_FUNCTIONS_PLUGIN_DIR . '/shortcodes/child-menu.php';

require_once TUB_FUNCTIONS_PLUGIN_DIR . '/widgets/book.php';