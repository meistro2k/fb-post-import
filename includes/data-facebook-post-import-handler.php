<?php
/**
 * Import Handler
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 */

/**
 * The Import handler plugin class
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Handler {
    public function handle_import_facebook_feed($json_data_feed)
    {
        try {
            $feed = new Facebook_Post_Import_Model_Feed(json_decode($json_data_feed));
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Invalid Facebook_Post_Import_Data_Feed data:' . $e);
        }

        // TODO: Build is_valid and error validation output
        if (!$feed->is_valid()) {
            wp_die('Cannot import due to the following errors: ' . $feed->get_errors_as_string());
        }

        $import = new Facebook_Post_Import_Importer();

        return $import->import_feed($feed);
    }
}
