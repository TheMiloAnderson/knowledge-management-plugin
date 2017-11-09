<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Knowledge_Management
 *
 * @wordpress-plugin
 * Plugin Name:       Knowledge Management
 * Plugin URI:        http://example.com/knowledge-management-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Milo Anderson
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       knowledge-management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'KNOWLEDGE_MANAGEMENT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-km-activator.php
 */
function activate_knowledge_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-km-activator.php';
    Knowledge_Management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-km-deactivator.php
 */
function deactivate_knowledge_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-km-deactivator.php';
	Knowledge_Management_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_knowledge_management' );
register_deactivation_hook( __FILE__, 'deactivate_knowledge_management' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-km.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_knowledge_management() {
	$plugin = new Knowledge_Management();
	$plugin->run();
}
run_knowledge_management();