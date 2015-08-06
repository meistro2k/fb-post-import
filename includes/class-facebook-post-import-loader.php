<?php
/**
 * Register all actions and filters for the plugin
 *
 * @link       http://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 */

/**
 * Register all actions and filters.
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_Loader {
    protected $actions;
    protected $filters;

    /**
     * Initialise the collections used to maintain the actions and filters.
     */
    public function __construct() {
        $this->actions = array();
        $this->filters = array();
    }
    /**
     * Add a new action to the collection to be registered with WordPress.
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int    $priority
     * @param int    $accepted_args
     */
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
    }
    /**
     * Add a new filter to the collection for registration with WordPress.
     *
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int    $priority
     * @param int    $accepted_args
     */
    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
    }

    /**
     * Register the actions and hooks into a single collection.
     *
     * @param  array  $hooks
     * @param  string $hook
     * @param  object $component
     * @param  string $callback
     * @param  int    $priority
     * @param  int    $accepted_args
     *
     * @return type
     */
    private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );

        return $hooks;
    }

    /**
     * Register the filters and actions with WordPress.
     */
    public function run() {
        foreach ( $this->filters as $hook ) {
            add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
        }

        foreach ( $this->actions as $hook ) {
            add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
        }
    }
}