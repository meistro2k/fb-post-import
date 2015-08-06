<?php

class Facebook_Post_Import_Importer {
    private $options;

    public function import_feed(Facebook_Post_Import_Model_Feed $feed_data) {
        $post_count = 0;

        $this->initialise_pre_insert_settings();

        foreach ($feed_data->get_data_collection() as $index => $feed_data) {
            if ( $posts = $this->insert($feed_data, $args) ) {
                $post_count = count($posts);
            }
        }

        return $post_count;
    }

    private function initialise_pre_insert_settings()
    {
        $this->options = array(
            'default_author' => get_current_user_id(), // TODO: Auto create users in future
            'default_category_id' => 1, //TODO: Assign a default category
        );
    }

    private function insert($items, $args = array()) {
        $saved_posts = array();

        foreach ( $items as $item ) {
            if ( ! $this->post_exists($item) ) {

                // TODO: Sanitisation here

                // TODO: Fetch images and save it locally to the media manager, and assign it to this post
                $this->save_image_locally($item);

                // TODO: Move to a class model, for better structure. Also makes it unit testable
                $post = array(
                    'post_title' => $item->get_title(),
                    'post_content' => $item->get_message(),
                    'post_status' => Facebook_Status_Type_To_Post_Status::convert($item->get_status_type()), // TODO
                    'post_author' => $this->options['default_author'],
                    'post_category' => array($args['category_id']),
                    'post_date' => get_date_from_gmt($item->get_created_time())
                );

                $post_id = $this->save_post_to_db($post);

                array_push($saved_posts, $post_id);
            }
        }

        return $saved_posts;
    }

    /**
     * Check if a post has already been imported
     */
    private function post_exists($post) {
        // TODO: Check if existing post exists

        return false;
    }

    private function save_post_to_db($post) {
        // TODO: More validation, pre and post processing here
        $post_id = wp_insert_post($post);

        return $post_id;
    }

    private function save_image_locally($post) {
        // TODO: Fetch remote image and save it locally
    }
}
