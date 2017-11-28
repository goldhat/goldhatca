<?php
/**
 * Homepage template file
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

get_header(); ?>

<div class="clay-container clay-content">

	<div class="clay-row">
		<div class="clay-col-4">
			<?php Clay_Render::sidebar('home1'); ?>
		</div>

		<div class="clay-col-4">
			<?php Clay_Render::sidebar('home2'); ?>
		</div>

		<div class="clay-col-4">
			<?php Clay_Render::sidebar('home3'); ?>
		</div>

	</div><!-- .clay-row .wrap -->
</div><!-- .clay-container -->

<?php get_footer();
