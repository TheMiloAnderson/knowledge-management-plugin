<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 * @author     Milo Anderson <email@example.com>
 */
class Knowledge_Management_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        unregister_taxonomy('channels');
        unregister_taxonomy('teams');
	}

}
