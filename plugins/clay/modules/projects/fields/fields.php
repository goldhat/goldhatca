<?php

function clay_projects_register_meta_boxes( $mb ) {

	$prefix = 'clpr_';

  $mb[] = array(
    'id'         => 'general',
    'title'      => __( 'General', 'clay-projects' ),
    'post_types' => 'project',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
			array(
				'id' => $prefix . 'screenshots',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Screenshots', 'clay-projects' ),
			),
    )
  );

	$mb[] = array(
    'id'         => 'general',
    'title'      => __( 'General', 'clay-projects' ),
    'post_types' => 'project',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
			array(
				'id' => $prefix . 'screenshots',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Screenshots', 'clay-projects' ),
			),
			array(
				'id' => $prefix . 'url',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'clay-projects' ),
				'clone' => true,
			),
			array(
				'id' => $prefix . 'sponsorship',
				'type' => 'textarea',
				'name' => esc_html__( 'Sponsorship', 'clay-projects' ),
			),
			array(
				'id' => $prefix . 'public_status',
				'name' => esc_html__( 'Public Status', 'clay-projects' ),
				'type' => 'select_advanced',
				'desc' => esc_html__( 'Project status for display to public.', 'clay-projects' ),
				'placeholder' => esc_html__( 'Select Public Status', 'clay-projects' ),
				'options' => array(
					'active' => 'Active Development',
					'completed' => 'Completed',
					'paused' => 'Paused',
				),
				'std' => 'active',
			),
			array(
				'id' => $prefix . 'technical_profile',
				'name' => esc_html__( 'Technical Profile', 'clay-projects' ),
				'type' => 'wysiwyg',
				'desc' => esc_html__( 'List of technologies and technical challenges within the project.', 'clay-projects' ),
			),
			array(
				'id' => $prefix . 'future_plans',
				'name' => esc_html__( 'Future Plans', 'clay-projects' ),
				'type' => 'wysiwyg',
				'desc' => esc_html__( 'Describe future plans for the project such as upcoming releases.', 'clay-projects' ),
			),
			array(
				'id' => $prefix . 'client',
				'type' => 'text',
				'name' => esc_html__( 'Client', 'clay-projects' ),
			),
			array(
				'id' => $prefix . 'current_version',
				'type' => 'text',
				'name' => esc_html__( 'Current Version', 'clay-projects' ),
			),
    )
  );

  return $mb;

}
