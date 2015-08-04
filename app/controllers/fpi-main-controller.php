<?php
class FpiMainController
{
    public function __construct()
    {
        add_action( 'admin_menu', __CLASS__ . '::register_settings_pages' );
    }

    public static function register_settings_pages()
    {
        add_submenu_page(
            'tools.php',
            FPI_NAME . ' Settings',
            FPI_NAME,
            'administrator',
            'fpi_settings',
            __CLASS__ . '::index'
        );
    }

    public static function index()
    {
        if (current_user_can('administrator')) {
            echo 'Settings renders here';
        } else {
            wp_die('Access denied.');
        }
    }
}
