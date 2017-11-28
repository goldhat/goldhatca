<?php
/*
Plugin Name: Clay Framework
Plugin URI: https://goldhat.ca/clay
Description: Framework for plugins and themes.
Version: 0.1.0
Author: GoldHat Group
Author URI: https://goldhat.ca
Copyright: GoldHat Group
Text Domain: clay
Domain Path: /languages
*/

define('CLAY_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('CLAY_PLUGIN_INTEGRATIONS_PATH', CLAY_PLUGIN_PATH . 'integrations' );
define('CLAY_PLUGIN_MODULES_PATH', CLAY_PLUGIN_PATH . 'modules' );

new clay();

class Clay {

	public function __construct() {

		add_action( 'admin_init', array( $this, 'initAdmin' ));
		add_action( 'init', array( $this, 'init' ), 5 );
		add_action( 'init', array( $this, 'initMetaBox' ), -1 );

		// Projects Module
		add_filter('single_template', array( $this, 'projectSingleTemplate' ));
		add_filter( 'template_include', array( $this, 'projectListTemplate' ));

		// post types
		require_once CLAY_PLUGIN_PATH . '/post_types/services.php';

	}

	public static function projectListTemplate( $template ) {

		global $wp_query, $post;
		if( !is_single() ) { return $template; }

		if( $post->post_name == 'projects' ) {
			return CLAY_PLUGIN_MODULES_PATH . '/projects/templates/archive.php';
		}

		return $template;

	}

	public static function projectSingleTemplate( $single ) {

		global $wp_query, $post;

    if ( $post->post_type == 'project' ) {

			// $clayTemplate = new Clay_Template;

			return CLAY_PLUGIN_MODULES_PATH . '/projects/templates/single.php';

    }

    return $single;

	}

	public static function initMetaBox() {

		// metabox integration
		require_once CLAY_PLUGIN_INTEGRATIONS_PATH . '/meta-box/meta-box/meta-box.php'; // Path to the plugin's main file

	}

	public static function init() {

		// integrate projects module
		require_once CLAY_PLUGIN_MODULES_PATH . '/projects/post_types/project.php';
		clay_register_post_type_project();

		// integrate metabox
		require_once CLAY_PLUGIN_MODULES_PATH . '/projects/fields/fields.php';
		add_filter( 'rwmb_meta_boxes', 'clay_projects_register_meta_boxes' );

		// template
		require_once CLAY_PLUGIN_PATH . 'src/Clay_Template.php';

		// render
		require_once CLAY_PLUGIN_PATH . 'src/Clay_Render.php';

	}

	public static function initAdmin() {



		// integrate metabox
		//require CLAY_PLUGIN_INTEGRATIONS_PATH . '/meta-box/meta-box/meta-box.php'; // Path to the plugin's main file



	}

}
