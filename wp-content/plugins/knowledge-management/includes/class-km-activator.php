<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 * @author     Milo Anderson <themiloanderson@gmail.com>
 */
class Knowledge_Management_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        //add_action('init', self::create_taxonomies());
	}
    
    public static function create_taxonomies() {
        $labels = array(
            'name'              => 'Subjects',
            'singular_name'     => 'Subject',
            'search_items'      => 'Search Subjects',
            'all_items'         => 'All Subjects',
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => 'Edit Subject',
            'update_item'       => 'Update Subject',
            'add_new_item'      => 'Add New Subject',
            'new_item_name'     => 'New Subject Name',
            'menu_name'         => 'Subject',
        );
        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'public'                => true,
            'show_ui'               => true,
            'show_in_quick_edit'    => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'subjects' ),
        );
        register_taxonomy('subjects', 'post', $args);
        //register_taxonomy('teams', 'post');
    }
}
