<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clay Theme
 * @subpackage Templates
 * @since 1.0
 * @version 1.0
 */

$project = $post;

get_header(); ?>

<div class="clay-container clay-content">

	<div class="clay-row">

		<div class="clay-col-8">

			<!-- Project Title -->
			<h1 class="project-title"><?php print $project->post_title; ?></h1>

			<!-- Project Summary -->
			<div class="project-summary project-section">


				<?php

					if( has_excerpt( $project ) ) {


				?>
				<h2 class="project-section-header">Project Overview</h3>
				<?php print get_the_excerpt( $project ); ?>

			<?php } ?>

			</div>

			<!-- Project Screenshots -->
				<?php Clay_Render::projectScreenshots( $project ); ?>

			<!-- Project Story (Post Content) -->
			<div class="project-story">

				<h2 class="">Project Story</h2>

				<?php

					$content = $project->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					print $content;

				?>

			</div>

			<!-- Sponsorship -->
			<!-- CTA -->
			<!-- Technologies -->
			<!-- Code Snippets -->


		</div><!-- .clay-col-8 -->

		<div class="clay-col-4">

			<!-- Project Featured Image -->
			<div class="project-featured-image">

				<?php

					if( has_post_thumbnail( $project ) ) {
						print get_the_post_thumbnail( $project );
					}

				?>

			</div>

			<!-- Project Sidebar -->
			<?php Clay_Render::sidebar('project_sidebar'); ?>

			<!-- Sponsorship -->
			<div class="project-sponsorship">
				<?php
				$sponsorship = rwmb_meta( 'clpr_sponsorship', array(), $project->ID );
				if( $sponsorship !== '' ) {
					print '<h2>Project Sponsorship</h2>';
					print $sponsorship;
				}

				?>
			</div>

			<!-- Public Status -->
			<div class="project-status">
				<?php
				$public_status = rwmb_meta( 'clpr_public_status', array(), $project->ID );

				$public_status = rwmb_the_value( 'clpr_public_status', '', '', false );

				if( $public_status !== '' ) {
					print '<h2>Project Status</h2>';
					print $public_status;
				}

				?>
			</div>

			<!-- Technical Profile -->
			<div class="project-technical-profile">
				<?php
				$tp = rwmb_meta( 'clpr_technical_profile', array(), $project->ID );
				if( $tp !== '' ) {
					print '<h2>Technical Profile</h2>';
					print $tp;
				}

				?>
			</div>

			<!-- Client -->
			<?php
				$client = rwmb_meta( 'clpr_client', array(), $project->ID );
				if( $client !== '' ) {
			?>
			<div class="project-client">
				<h2>Client</h2>
				<div class="project-client-name"><?php print $client; ?></div>
			</div>
		<?php } ?>

		<!-- Client -->
		<?php
			$cv = rwmb_meta( 'clpr_current_version', array(), $project->ID );
			if( $cv !== '' ) {
		?>
			<div class="project-current-version">
				<h2>Current Version</h2>
				<div class="project-current-version-number"><?php print $cv; ?></div>
			</div>
		<?php } ?>

			<!-- Future Plans -->
			<div class="project-future-plans">
				<?php
				$fp = rwmb_meta( 'clpr_future_plans', array(), $project->ID );
				if( $fp !== '' ) {
					print '<h2>What\'s Next</h2>';
					print $fp;
				}

				?>
			</div>

			<!-- Project URL's -->
			<div class="project-urls">
				<?php

						$urls = rwmb_meta( 'clpr_url', array(), $project->ID );

						if( is_array( $urls ) && !empty( $urls )) {
							// multiple
							foreach( $urls as $url ) {
								print '<div><a href="' . $url . '">' . $url . '</a></div>';
							}
						} elseif( $urls !== '' && !empty( $urls )) {
							// singular
							print '<a href="' . $url . '">' . $url . '</a>';
						}

					?>
				</div>

			</div>

		</div>



	</div><!-- .clay-row .wrap -->

	<div class="clay-row">

		
	</div>


</div><!-- .clay-container -->

<?php get_footer();
