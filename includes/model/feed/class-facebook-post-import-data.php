<?php
/**
 * Facebook Feed Data
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 */

use \DateTime;

/**
 * Facebook Feed Data
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes/model/feed
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Model_Feed_Data extends Data_Transfer_Object {
    public $id;
    public $from;
    public $message;
    public $picture;
    public $link;
    public $name;
    public $caption;
    public $description;
    public $icon
    public $actions;
    public $privacy;
    public $type;
    public $status_type;
    public $application;
    public $created_time;
    public $updated_time;
    public $shares;
    public $is_hidden;
    public $likes;
    public $comments;

    // TODO: Getters, setters, 
}
