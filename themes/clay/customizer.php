<?php

add_action( 'customize_register', 'clay_customizer_settings' );

function clay_customizer_settings( $wp_customize ) {

	// social
	$wp_customize->add_section( 'clay_social', array(
		'title' => __( 'Social' ),
		'description' => __( 'Social links and integration.' ),
		'priority' => 10,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting( 'social_links' , array(
    'transport'   => 'refresh',
	));

	// footer
	$wp_customize->add_section( 'clay_footer', array(
		'title' => __( 'Footer' ),
		'description' => __( 'Footer settings' ),
		'priority' => 10,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting( 'footer_menu1_header' , array(
    'transport'   => 'refresh',
	));

	$wp_customize->add_setting( 'footer_menu2_header' , array(
    'transport'   => 'refresh',
	));

	$wp_customize->add_setting( 'footer_menu3_header' , array(
    'transport'   => 'refresh',
	));

	$wp_customize->add_control( 'footer_menu1_header', array(
		'label'   => 'Menu 1 Header',
		'section' => 'clay_footer',
		'type'    => 'text',
	));

	$wp_customize->add_control( 'footer_menu2_header', array(
		'label'   => 'Menu 2 Header',
		'section' => 'clay_footer',
		'type'    => 'text',
	));

	$wp_customize->add_control( 'footer_menu3_header', array(
		'label'   => 'Menu 3 Header',
		'section' => 'clay_footer',
		'type'    => 'text',
	));

	// branding
	$wp_customize->add_section( 'clay_branding', array(
		'title' => __( 'Branding' ),
		'description' => __( 'Branding elements' ),
		'priority' => 10,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting( 'logo' , array(
    'transport'   => 'refresh',
	));

	$wp_customize->add_control(
     new WP_Customize_Image_Control(
       $wp_customize,
       'logo',
       array(
         'label'      => __( 'Upload a logo', 'clay_theme' ),
         'section'    => 'clay_branding',
         'settings'   => 'logo',
       )
     )
   );

	 // footer logo
	 $wp_customize->add_setting( 'footer_logo' , array(
     'transport'   => 'refresh',
 	));

 	$wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        'footer_logo',
        array(
          'label'      => __( 'Upload a logo', 'clay_theme' ),
          'section'    => 'clay_branding',
          'settings'   => 'footer_logo',
        )
      )
    );

	// colors

	$wp_customize->add_section( 'clay_colors', array(
  'title' => __( 'Colors' ),
  'description' => __( 'Add custom CSS here' ),
  'panel' => '', // Not typically needed.
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '', // Rarely needed.
) );

	$wp_customize->add_setting( 'background_color' , array(
    'default'     => '#43C6E4',
    'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
	'label'        => 'Background Color',
	'section'    => 'clay_colors',
	'settings'   => 'background_color',
) ) );

}
