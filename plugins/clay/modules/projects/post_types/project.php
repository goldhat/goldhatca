<?php

/**
 * Registers post types needed by the plugin.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function clay_register_post_type_project() {

	$args = array(

		'description'         => __( 'Project post type.', 'clay-projects' ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-admin-multisite',
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'rewrite' => array(
			'slug'       => 'project',
			'with_front' => false,
			'pages'      => true,
			'feeds'      => true,
			'ep_mask'    => EP_PERMALINK,
		),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'page-attributes',
			'post-formats',
		),
		'labels' => array(
			'name'                  => __( 'Posts',                   'clay-projects' ),
			'singular_name'         => __( 'Project',                    'clay-projects' ),
			'menu_name'             => __( 'Projects',                   'clay-projects' ),
			'name_admin_bar'        => __( 'Projects',                   'clay-projects' ),
			'add_new'               => __( 'Add New',                 'clay-projects' ),
			'add_new_item'          => __( 'Add New Project',            'clay-projects' ),
			'edit_item'             => __( 'Edit Project',               'clay-projects' ),
			'new_item'              => __( 'New Project',                'clay-projects' ),
			'view_item'             => __( 'View Project',               'clay-projects' ),
			'search_items'          => __( 'Search Projects',            'clay-projects' ),
			'not_found'             => __( 'No projects found',          'clay-projects' ),
			'not_found_in_trash'    => __( 'No projects found in trash', 'clay-projects' ),
			'all_items'             => __( 'All Projects',               'clay-projects' ),
			'featured_image'        => __( 'Project Image',          'clay-projects' ),
			'set_featured_image'    => __( 'Set project image',      'clay-projects' ),
			'remove_featured_image' => __( 'Remove project image',   'clay-projects' ),
			'use_featured_image'    => __( 'Use as project image',    'clay-projects' ),
			'insert_into_item'      => __( 'Insert into project',        'clay-projects' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project',   'clay-projects' ),
			'views'                 => __( 'Filter project list',       'clay-projects' ),
			'pagination'            => __( 'Projects list navigation',   'clay-projects' ),
			'list'                  => __( 'Projects list',              'clay-projects' ),

			// Labels for hierarchical post types only.
			'parent_item'        => __( 'Parent Project',                'clay-projects' ),
			'parent_item_colon'  => __( 'Parent Project:',               'clay-projects' ),
		)
	);

	// Register the post type.
	register_post_type(
		'project', // Post type name. Max of 20 characters. Uppercase and spaces not allowed.
		$args      // Arguments for post type.
	);
}
