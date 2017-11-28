<?php

class Clay_Template {

	public $override_dir;
	public $hook_prefix;
	public $pluginTemplateDir;

	public function __construct( $override_dir, $pluginTemplateDir = 'templates', $hook_prefix = 'clay_template' ) {

		$this->override_dir = $override_dir;
		$this->hook_prefix 	= $hook_prefix;
		$this->pluginTemplateDir = $pluginTemplateDir;

	}

	/**
	 * Get template.
	 *
	 * Search for the template and include the file.
	 *
	 * @since 1.0.0
	 *
	 * @see wcpt_locate_template()
	 *
	 * @param string 	$template_name			Template to load.
	 * @param array 	$args					Args passed for the template file.
	 * @param string 	$string $template_path	Path to templates.
	 * @param string	$default_path			Default path to template files.
	 */
	public function parse_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {

		ob_start();
		$this->get_template( $template_name, $args, $template_path, $default_path );
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;

	}

	/**
	 * Get template.
	 *
	 * Search for the template and include the file.
	 *
	 * @since 1.0.0
	 *
	 * @see wcpt_locate_template()
	 *
	 * @param string 	$template_name			Template to load.
	 * @param array 	$args					Args passed for the template file.
	 * @param string 	$string $template_path	Path to templates.
	 * @param string	$default_path			Default path to template files.
	 */
	public function get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {

		if ( is_array( $args ) && isset( $args )) {
			extract( $args );
		}

		$template_file = $this->locate_template( $template_name . '.php', $template_path, $default_path );

		if ( ! file_exists( $template_file ) ) :
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
			return;
		endif;

		include $template_file;

	}

	/**
	 * Locate template.
	 *
	 * Locate the called template.
	 * Search Order:
	 * 1. /themes/theme/$override_dir/$template_name
	 * 2. /themes/theme/$template_name
	 * 3. /plugins/[gravity-perk]/templates/$template_name.
	 *
	 * @since 1.0.0
	 *
	 * @param 	string 	$template_name	Template to load.
	 * @param 	string 	$template_path	Path to templates.
	 * @param 	string	$default_path		Default path to template files.
	 * @return 	string 									Path to the template file.
	 */
	public function locate_template( $template_name, $template_path = '', $default_path = '' ) {

		//var_dump($template_path);

		// Set variable to search in override directory of theme.
		if ( ! $template_path ) {
			$template_path = $this->override_dir;
		} else {
			$template_path = $template_path;
		}

		//var_dump($template_path);

		// Set default plugin templates path.
		if ( ! $default_path ) :
			$dir = plugin_dir_path( __FILE__ );
			$dir = str_replace( 'src/', '', $dir );
			$default_path = $dir . $this->pluginTemplateDir; // Path to the template folder
		endif;

		//var_dump( $this->pluginTemplateDir);
		//var_dump($default_path);

		// Search template file in theme folder.
		$template = locate_template( array(
			$template_path . $template_name,
			$template_name
		) );
		// Get plugins template file.
		if ( ! $template ) :
			$template = $default_path . $template_name;
		endif;

		//var_dump($template);

		return apply_filters( $this->hook_prefix . '_locate_template', $template, $template_name, $template_path, $default_path );
	}

}
