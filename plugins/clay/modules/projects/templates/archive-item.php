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

				Clay_Render::projectPermalink( $project );

			?>

		</div>

	</div>
</div>
