<?php

class Clay_Widget {

	public function register( $id, $name ) {

		register_sidebar( array(
			'name'          => $name,
			'id'            => $id,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-header">',
			'after_title'   => '</h2>',
		));

	}


}
