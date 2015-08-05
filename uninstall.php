<?php
/**
 * Fired when uninstall occurs.
 *
 * @link       http://github.com/meistro2k/fb-posts-import
 *
 * @package    Facebook_Post_Import
 */
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Uninstall code can go here in future use