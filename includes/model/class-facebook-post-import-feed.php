<?php
/**
 * Facebook Feed
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/data
 */

/**
 * Facebook Feed
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/data
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Model_Feed {
    private $data;
    private $paging;

    public function __construct(array $feed) {
        if (!isset($feed['data']) || !isset ($feed['paging'])) {
            throw new InvalidArgumentException('Missing data/paging attributes');
        }

        $this->data   =  new Facebook_Post_Import_Model_Feed_Data_Collection($feed['data']);
        $this->paging =  new Facebook_Post_Import_Model_Feed_Paging($feed['paging']);
    }

    public function get_data_collection() {
        return $this->data;
    }

    public function get_paging() {
        return $this->paging;
    }
}
