<?php

define( 'CLAY_THEME_URL', get_template_directory_uri() );

// include customizer
include('customizer.php');

// require source libraries
include('src/Clay_Menu.php');
include('src/Clay_Theme_Render.php');
include('src/Clay_Widget.php');

new Clay_Theme();
class Clay_Theme {

	public function __construct() {

		add_action('init', array( $this, 'addMenus' ));
		add_action( 'widgets_init', array( $this, 'widgetsInit' ));

		remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

	}

	public function addMenus() {

		$menu = new Clay_Menu();
		$menu->register('main', 'Main');
		$menu->register('topbar', 'Top Bar');
		$menu->register('footer1', 'Footer 1');
		$menu->register('footer2', 'Footer 2');
		$menu->register('footer3', 'Footer 3');

	}

	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	public static function widgetsInit() {

		$clayWidget = new Clay_Widget();
		$clayWidget->register( 'right_sidebar', 'Right Sidebar' );

		$clayWidget->register( 'home1', 'Home 1' );
		$clayWidget->register( 'home2', 'Home 2' );
		$clayWidget->register( 'home3', 'Home 3' );

		// project sidebar
		$clayWidget->register( 'project_sidebar', 'Project Sidebar' );

	}

}

// remove message about how many products are being shown in catalog
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// modify add to cart text
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
	return __( 'Buy Now', 'clay-theme' );
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
function woo_archive_custom_cart_button_text() {
	return __( 'Buy Now', 'woocommerce' );
}

// remove sorting selector
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// declare sensei support
add_action( 'after_setup_theme', 'clayDeclareSenseiSupport' );
function clayDeclareSenseiSupport() {
  add_theme_support( 'sensei' );
}

add_filter( 'mb_aio_load_free_extensions', '__return_true' );


// TEST MB IN WC

// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );

function variation_settings_fields( $loop, $variation_data, $variation ) {

	$mb = rwmb_get_registry( 'meta_box' )->get( "product_settings" );
	$mb->set_object_id( $variation->ID );
	$saved = $mb->is_saved();

	// Container.
	printf(
		'<div class="rwmb-meta-box" data-autosave="%s" data-object-type="%s">',
		esc_attr( $mb->autosave ? 'true' : 'false' ),
		esc_attr( $mb->object_type )
	);

	wp_nonce_field( "rwmb-save-{$mb->id}", "nonce_{$mb->id}" );

	// Allow users to add custom code before meta box content.
	// 1st action applies to all meta boxes.
	// 2nd action applies to only current meta box.
	do_action( 'rwmb_before', $mb );
	do_action( "rwmb_before_{$mb->id}", $mb );

	foreach ( $mb->fields as $field ) {
		RWMB_Field::call( 'show', $field, $saved, $variation->ID );
	}

	// Allow users to add custom code after meta box content.
	// 1st action applies to all meta boxes.
	// 2nd action applies to only current meta box.
	do_action( 'rwmb_after', $mb );
	do_action( "rwmb_after_{$mb->id}", $mb );

	// End container.
	echo '</div>';

}

function save_variation_settings_fields( $post_id ) {

	$meta_box = rwmb_get_registry( 'meta_box' )->get( "product_settings" );
	$meta_box->save_post( $post_id );

}


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
