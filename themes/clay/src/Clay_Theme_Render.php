<?php

class Clay_Theme_Render {

	public static function renderImageByUrl( $imgUrl ) {

		$attachmentId = attachment_url_to_postid( $imgUrl );
		print wp_get_attachment_image( $attachmentId, 'medium' );

	}

	public static function renderText( $option ) {
		print get_theme_mod( $option );
	}

	public static function renderMenu( $location ) {
		wp_nav_menu( array(
			'theme_location' => $location,
			'container_class' => 'clay-menu',
			'menu_class' => $location . '-menu',
			'item_spacing' => 'discard'
		));
	}

	public static function renderFacebookLink( $facebookPageUrl ) {
		print '080979';
		print '<a href="' . $facebookPageUrl . '">';
		print '<img src="' . CLAY_THEME_URL . '/img/facebook-letter-logo.svg' . '" alt="Follow GoldHat Group on Facebook">';
		print '</a>';
	}

	public static function renderTwitterLink( $twitterPageUrl ) {

		print '<a href="' . $twitterPageUrl . '">';
		print '<img src="' . CLAY_THEME_URL . '/img/twitter-logo-silhouette.svg' . '" alt="Follow GoldHat Group on Twitter">';
		print '</a>';

	}

	public static function renderYouTubeLink( $youTubePageUrl ) {

		print '<a href="' . $youTubePageUrl . '">';
		print '<img src="' . CLAY_THEME_URL . '/img/youtube-logo.svg' . '" alt="Subscribe to GoldHat Group on YouTube">';
		print '</a>';

	}

	public static function sidebar( $key ) {

		if ( !is_active_sidebar( $key )) {
			return;
		}

		$className = str_replace('_', '-', $key);

		print '<div id="' . $className . '" class="' . $className . ' widget-area" role="complementary">';
		dynamic_sidebar( $key );
		print '</div>';

	}

	public static function images( $imageField, $post ) {

		$images = rwmb_meta( $imageField, array(), $post->ID );

		if( $images === '' ) {
			return;
		}

		$template = new Clay_Template( 'clay' );

		foreach( $images as $image ) {
			$template->get_template( 'image', array( 'image' => $image) );
		}

	}

}
