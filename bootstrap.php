<?php
/*
Plugin Name: Facebook Post Importer
Plugin URI:  https://github.com/meistro2k/fb-posts-import
Description: Imports Facebook posts and creates them as Wordpress posts
Version:     0.1
Author:      Peter Tran
Author URI:  http://petertran.com.au
*/

if (!defined('ABSPATH')) {
    die('Access denied');
}

define('FPI_NAME', 'Facebook Post Importer');

require_once( 'app/controllers/fpi-main-controller.php' );

if ( class_exists( 'FpiMainController' ) ) {
    $GLOBALS['fpi'] = new FpiMainController();
}
