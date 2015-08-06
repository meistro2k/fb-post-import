<?php
/*
Plugin Name: Facebook Post Import
Plugin URI:  https://github.com/meistro2k/fb-post-import
Description: Imports Facebook posts and creates them as Wordpress posts
Version:     0.1
Author:      Peter Tran
Author URI:  http://petertran.com.au
*/

if ( !defined( 'ABSPATH' ) ) {
    die( 'Access denied' );
}

define( 'FPI_NAME' , 'Facebook Post Importer' );

function activate_facebook_post_import()
{
    require_once ( plugin_dir_path ( __FILE__ ) . 'includes/class-facebook-post-import-activator.php' );
    Facebook_Post_Import_Activator::activate();
}

function deactivate_facebook_post_import()
{
    require_once ( plugin_dir_path ( __FILE__ ) . 'includes/class-facebook-post-import-deactivator.php' );
    Facebook_Post_Import_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_facebook_post_import' );
register_deactivation_hook( __FILE__, 'deactivate_facebook_post_import' );

// Hooks inclusion
require ( plugin_dir_path( __FILE__ ) . 'includes/class-facebook-post-import.php' );

function run_facebook_post_import()
{
    $fpi = new Facebook_Post_Import();
    $fpi->run();
}

run_facebook_post_import();