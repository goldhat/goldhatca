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
			<div class="project-summary">

				<?php

					if( has_excerpt( $project ) ) {
						print get_the_excerpt( $project );
					}

				?>

			</div>


			<!-- Project Screenshots -->
			<h2>Screenshots</h2>
			<div>
				<?php
					// Clay_Render::images( 'clpr_screenshots', $project );
				?>
			</div>

			<!-- Project URL's -->
			<div class="project-url">
				<?php

					$url = rwmb_meta( 'clpr_url', array(), $project->ID );
					if( $url === '' ) {
						$url = get_permalink( $project );
					}

					print '<a href="' . $url . '">Visit Project</a>';

				?>

			</div>

			<!-- Project Story (Post Content) -->
			<div class="project-story">

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


		</div><!-- .clay-col -->
	</div><!-- .clay-row .wrap -->
</div><!-- .clay-container -->

<?php get_footer();
