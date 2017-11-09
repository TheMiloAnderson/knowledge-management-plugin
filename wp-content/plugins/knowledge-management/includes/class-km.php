<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    knowledge-management
 * @subpackage knowledge-management/includes
 * @author     Milo Anderson <themiloanderson@gmail.com>
 */
class Knowledge_Management {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'KNOWLEDGE_MANAGEMENT_VERSION' ) ) {
			$this->version = KNOWLEDGE_MANAGEMENT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'knowledge-management';
		$this->load_dependencies();
        $this->set_locale();
        $this->define_hooks();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
        $path = plugin_dir_path(dirname(__FILE__));
        require_once $path . 'admin/class-km-admin.php';
		require_once $path . 'includes/class-km-loader.php';
        require_once $path . 'includes/class-km-taxonomies.php';
        require_once $path . 'includes/class-km-posts.php';
        require_once $path . 'includes/class-km-i18n.php';
		require_once $path . 'public/class-km-public.php';
		$this->loader = new Knowledge_Management_Loader();
	}
    
	private function set_locale() {
		$km_i18n = new Knowledge_Management_i18n();
		$this->loader->add_action( 'plugins_loaded', $km_i18n, 'load_plugin_textdomain' );
	}
    
    private function define_hooks() {
        $taxonomies = new Knowledge_Management_Taxonomies();
        $this->loader->add_action('init', $taxonomies, 'unregister');
        $this->loader->add_action('init', $taxonomies, 'subjects');
        $this->loader->add_action('init', $taxonomies, 'teams');
        $posts = new Knowledge_Management_Posts();
        $this->loader->add_filter('template_include', $posts, 'posts');
    }

	private function define_admin_hooks() {
		$plugin_admin = 
            new Knowledge_Management_Admin($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	private function define_public_hooks() {
		$plugin_public = 
            new Knowledge_Management_Public($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}