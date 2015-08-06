<?php 
/**
 * Bootstrap process for unit tests
 */
$GLOBALS['wp_tests_options'] = array(
    'active_plugins' => array( 'fb-post-import/facebook-post-import.php' ),
);

$wp_tests_config = realpath(dirname(__FILE__)) . '/bootstrap.php';

require $wp_tests_config;
