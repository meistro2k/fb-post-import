<?php
/**
 * Facebook Feed Data Collection
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 */

/**
 * Facebook Feed Data Collection
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Model_Feed_DataCollection {
    private $data_collection;

    public function __construct(array $data_collection) {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Data supplied is not a valid array');
        }

        $this->data_collection = $data_collection;
    }

    public function get_data() {
        return $this->data_collection;
    }

    public function get_single_data(int $index) {
        try {
            return $this->data_collection[$index];
        } catch (\Exception $e) {
            throw new \OutOfBoundsException('No data available with index: ' $index);
        }
    }
}
