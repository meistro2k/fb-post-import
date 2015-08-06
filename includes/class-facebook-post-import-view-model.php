<?php
/**
 * View model for Facebook Post Importer
 *
 * @link       https://github.com/meistro2k/fb-post-import
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 */

/**
 * Admin functionality of the plugin.
 *
 * @package    Facebook_Post_Import
 * @subpackage Facebook_Post_Import/includes
 * @author     Peter Tran <peter@petertran.com.au>
 */
class Facebook_Post_Import_View_Model
{
    /**
     * Render a template
     *
     * Allows parent/child themes to override the markup by placing the a file named basename ) in their root folder,
     * and also allows plugins or themes to override the markup by a filter. Themes might prefer that method if they place their templates
     * in sub-directories to avoid cluttering the root folder. In both cases, the theme/plugin will have access to the variables so they can
     * fully customize the output.
     *
     * @param  strin The path to the template, relative to the plugin's `partials` folder
     * @param  array  $variables             An array of variables to pass into the template's scope, indexed with the variable name so that it can be extract()-ed
     * @param  string $require               'once' to use require_once() | 'always' to use require()
     * @return string
     */
    public static function render($template_path, $variables = array())
    {
        $template_path = apply_filters( 'fpi_template_path', dirname( __DIR__ ) . '/' . $template_path );

        if ( !is_file( $template_path ) ) {
            wp_die( 'Invalid template path: ' . $template_path );
        }

        extract($variables);
        ob_start();
        require_once( $template_path );

    
        do_action( 'fpi_render_template_post', $variables, $template_path, $template_content );

        return $template_content;
    }
}