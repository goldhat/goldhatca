<?php

function register_post_type_services() {

	$args = array (
		'label' => esc_html__( 'Services', 'clay' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Services', 'clay' ),
			'name_admin_bar' => esc_html__( 'Service', 'clay' ),
			'add_new' => esc_html__( 'Add new', 'clay' ),
			'add_new_item' => esc_html__( 'Add new Service', 'clay' ),
			'new_item' => esc_html__( 'New Service', 'clay' ),
			'edit_item' => esc_html__( 'Edit Service', 'clay' ),
			'view_item' => esc_html__( 'View Service', 'clay' ),
			'update_item' => esc_html__( 'Update Service', 'clay' ),
			'all_items' => esc_html__( 'All Services', 'clay' ),
			'search_items' => esc_html__( 'Search Services', 'clay' ),
			'parent_item_colon' => esc_html__( 'Parent Service', 'clay' ),
			'not_found' => esc_html__( 'No Services found', 'clay' ),
			'not_found_in_trash' => esc_html__( 'No Services found in Trash', 'clay' ),
			'name' => esc_html__( 'Services', 'clay' ),
			'singular_name' => esc_html__( 'Service', 'clay' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => false,
		'menu_icon' => 'dashicons-hammer',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite_no_front' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'author',
			'excerpt',
			'comments',
		),
		'taxonomies' => array(
			'category',
			'post_tag',
		),
		'rewrite_slug' => 'services',
		'rewrite' => array(
			'slug' => 'services',
		),
	);

	register_post_type( 'service', $args );
}

add_action( 'init', 'register_post_type_services' );
