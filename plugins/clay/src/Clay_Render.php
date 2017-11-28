<?php

class Clay_Render {

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

		$template = new Clay_Template( 'clay', 'templates/' );

		foreach( $images as $image ) {
			$template->get_template( 'image', array( 'image' => $image) );
		}

	}

	public static function projectScreenshots( $project ) {

		$template = new Clay_Template( 'clay', 'modules/projects/templates/' );


		$screenshots = get_post_meta( $project->ID, 'clpr_screenshots' );
		if( !empty( $screenshots )) {

			print '<h2>Screenshots</h2>';
			foreach( $screenshots as $screenshot ) {
				$template->get_template( 'screenshot', array( 'screenshotId' => $screenshot ) );
			}

		}


	}

	public static function projectUrl( $urlFieldKey, $postId ) {

		$urls = rwmb_meta( $urlFieldKey, array(), $postId );
		if( $urls === '' ) {
			$url = get_permalink( $postId );
			print '<div><a href="' . $url . '">Visit Project</a></div>';
		} elseif( is_array( $urls )) {
			// multiple
			foreach( $urls as $url ) {
				print '<div><a href="' . $url . '">' . $url . '</a></div>';
			}
		} else {
			// singular
			print '<a href="' . $url . '">Visit Project</a>';
		}

	}

	public static function renderSocialLinks() {

		Clay_Render::renderTwitterLink('https://twitter.com/goldhatmg/');
		Clay_Render::renderFacebookLink('https://facebook.com/goldhatgroup/');
		Clay_Render::renderYouTubeLink('https://www.youtube.com/channel/UCWvIaxvcno4ED6FCEnHG2Yg');

	}

	public static function projectPermalink( $project ) {

		$url = get_permalink( $project );
		print '<div class="project-discover-link"><a href="' . $url . '">Discover More</a></div>';


	}

}
