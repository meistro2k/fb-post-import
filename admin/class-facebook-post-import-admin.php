<?php
/**
 * Admin functionality of the plugin.
 *
 * @link       http://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/admin
 */

/**
 * Admin functionality of the plugin.
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/admin
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Admin {
    const REQUIRED_CAPABILITY = 'administrator';

    private $facebook_post_import;
    private $version;
    private $capability;

    /**
     * The constructor
     *
     * @param string    $facebook_post_import The name of this plugin.
     * @param string    $version              The version of this plugin.
     * @param string    $capability           Minimum capability required
     */
    public function __construct( $facebook_post_import, $version, $capability ) {
        $this->plugin_name = $facebook_post_import;
        $this->version = $version;
        $this->capability = $capability;
    }

    /**
     * Add admin option to the 'Tools' menu.
     */
    public function admin_menu() {
        add_submenu_page(
            'tools.php',
            FPI_NAME . ' Settings',
            FPI_NAME,
            $this->capability,
            'fpi_settings',
            array('Facebook_Post_Import_Admin', 'render_index_page')
        );
    }

    /**
     * Renders the index page.
     */
    public function render_index_page()
    {
        if (!current_user_can(self::REQUIRED_CAPABILITY)) {
            wp_die('Access denied.');
        }

        echo Facebook_Post_Import_View_Model::render(
            'admin/partials/facebook-post-import-admin-partial.php'
        );
    }

    /**
     * Process importing of the feed
     */
    public function process_import()
    {
        $url = $_POST['feed_url'];

        // TODO: Use cURL to fetch URL and get the JSON data.
        $facebook_json_data = isset($url) ? Facebook_Post_Import_Fetch_Service::get_feed_data($url) : null;

        if (is_wp_error ($facebook_json_data)) {
            wp_die('No feed found');
        }

        $handler = new Facebook_Post_Import_Handler();
        $result = $handler->import($facebook_json_data);

        echo Facebook_Post_Import_View_Model::render(
            'admin/partials/facebook-post-import-process-import-partial.php',
            $result
        );
    }
}