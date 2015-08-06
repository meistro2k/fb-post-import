<?php
/**
 * Facebook Feed Paging
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 */

/**
 * Facebook Feed Paging
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Model_Feed_Paging {
    private $next;
    private $previous;

    public function __construct(array $paging) {
        if (!is_array($paging)) {
            throw new InvalidArgumentException('Invalid paging data');
        }

        isset ($paging['next']) ? $this->next = $paging['next'] : null;
        isset ($paging['previous']) ? $this->previous = $paging['previous'] : null;
    }

    public function get_next() {
        return $this->next;
    }

    public function has_next() {
        return $this->next ? true : false;
    }

    public function get_previous() {
        return $this->previous;
    }

    public function has_previous() {
        return $this->previous ? true : false;
    }
}
