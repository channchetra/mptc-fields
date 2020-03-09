<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://channchetra.com
 * @since             1.0.0
 * @package           Mptc_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       PTC Custom Field Shortcode & Widgets
 * Plugin URI:        https://www.mptc.gov.kh/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Chann Chetra
 * Author URI:        https://channchetra.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mptc-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MPTC_FIELDS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mptc-fields-activator.php
 */
function activate_mptc_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mptc-fields-activator.php';
	Mptc_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mptc-fields-deactivator.php
 */
function deactivate_mptc_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mptc-fields-deactivator.php';
	Mptc_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mptc_fields' );
register_deactivation_hook( __FILE__, 'deactivate_mptc_fields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mptc-fields.php';
/**
 * Loading CMB2 file
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/cmb2/init.php';
/**
 * Loading Shortcode files
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';

/**
 * Loading Shortcode files
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mptc_fields() {

	$plugin = new Mptc_Fields();
	$plugin->run();

}
run_mptc_fields();
