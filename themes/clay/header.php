<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header-top">

		<div class="clay-container">
			<div class="clay-row">

				<div class="clay-col-4 topbar-social">
					<?php Clay_Render::renderSocialLinks(); ?>
				</div>

				<div class="clay-col-8" style="text-align: right;">
					<?php Clay_Render::renderMenu('topbar'); ?>
				</div>

			</div>
		</div>

	</header>

	<header id="header">

		<div class="clay-container">
			<div class="clay-row">

				<div class="clay-col-3 clay-logo">
					<a href="<?php print home_url(); ?>">
						<?php Clay_Render::renderImageByUrl( get_theme_mod('logo') ); ?>
					</a>
				</div>

				<div class="clay-col-6">
					<?php Clay_Render::renderMenu('main'); ?>
				</div>

				<div class="clay-col-2">

				</div>

			</div>

		</div>

	</header>

	<header class="subheader">

		<div class="clay-container">
			<div class="clay-row">

				<div class="clay-col-6">
					<h1 class="page-title">
						<?php
							$title = wp_title('', false);
							print $title;
						?>
					</h1>
				</div>
			</div>
		</div>


	</header>
