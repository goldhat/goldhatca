<?php

class RW_Meta_Box_WooCommerce extends RW_Meta_Box {

	/**
	 * Callback function to show fields in meta box
	 */
	public function show_product_variation( $product_variation_id ) {

		$this->set_object_id( $product_variation_id );
		$saved = $this->is_saved();

		// Container.
		printf(
			'<div class="rwmb-meta-box" data-autosave="%s" data-object-type="%s">',
			esc_attr( $this->autosave ? 'true' : 'false' ),
			esc_attr( $this->object_type )
		);

		print "HU24242432";

		wp_nonce_field( "rwmb-save-{$this->id}", "nonce_{$this->id}" );

		// Allow users to add custom code before meta box content.
		// 1st action applies to all meta boxes.
		// 2nd action applies to only current meta box.
		do_action( 'rwmb_before', $this );
		do_action( "rwmb_before_{$this->id}", $this );

		var_dump($this->fields);

		foreach ( $this->fields as $field ) {
			RWMB_Field::call( 'show', $field, $saved, $this->object_id );
		}

		// Allow users to add custom code after meta box content.
		// 1st action applies to all meta boxes.
		// 2nd action applies to only current meta box.
		do_action( 'rwmb_after', $this );
		do_action( "rwmb_after_{$this->id}", $this );

		// End container.
		echo '</div>';

	}

}
