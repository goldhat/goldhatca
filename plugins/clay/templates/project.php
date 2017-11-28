<div class="clay-col-6 clay-project-wrap">

	<div class="clay-project">

		<div class="project-featured-image">

			<?php

				if( has_post_thumbnail( $project ) ) {
					print get_the_post_thumbnail( $project );
				}

			?>

		</div>

		<h2 class="project-title"><?php print $project->post_title; ?></h2>

		<div class="project-summary">

			<?php

				if( has_excerpt( $project ) ) {
					print get_the_excerpt( $project );
				}

			?>

		</div>

		<div class="project-url">
			<?php

				$url = rwmb_meta( 'clpr_url', array(), $project->ID );

				if( $url === '' || empty( $url ) ) {
					$url = get_permalink( $project );
				}
				if( is_array( $url )) {
					$url = $url[0];
				}

				print '<a href="' . $url . '">Discover Project</a>';

			?>

		</div>

	</div>
</div>
