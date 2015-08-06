<?php
/**
 * Define the core plugin class
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 */

/**
 * The core plugin class
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import {
    protected $loader;
    protected $facebook_post_import;
    protected $version;
    protected $view;
    protected $admin_capability = 'administrator';

    /**
     * Define the core functionality of the plugin.
     *
     */
    public function __construct() {
        $this->facebook_post_import = 'facebook-post-import';
        $this->version = '0.1';
        $this->load_dependencies();
        $this->define_admin_hooks();
    }
    /**
     * Load the required dependencies for this plugin and create an instance of
     * the loader which will be used to register the hooks with WordPress.
     *
     * @access   private
     */
    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-facebook-post-import-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-facebook-post-import-view-model.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-facebook-post-import-admin.php';

        $this->loader = new Facebook_Post_Import_Loader();
    }

    /**
     * Register hooks for the admin area functionality of the plugin.
     */
    private function define_admin_hooks() {
        $facebook_post_import_admin = new Facebook_Post_Import_Admin(
            $this->get_facebook_post_import(),
            $this->get_version(),
            $this->get_admin_capability()
        );

        $this->loader->add_action( 'admin_menu', $facebook_post_import_admin, 'admin_menu');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin.
     *
     * @return string Name of the plugin.
     */
    public function get_facebook_post_import() {
        return $this->facebook_post_import;
    }

    /**
     * Reference the class that orchestrates the hooks.
     *
     * @return Facebook_Post_Import_Loader Orchestrates the hooks.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number.
     *
     * @return string The version number
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * Get the admin capability
     *
     * @return type
     */
    public function get_admin_capability() {
        return $this->admin_capability;
    }
}