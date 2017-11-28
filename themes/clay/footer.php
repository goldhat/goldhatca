	<div id="footer">

		<footer class="footer">

			<div class="clay-container">
			<div class="clay-row">
				<div class="clay-col-12">

				</div>
			</div>
		</div>

		</footer>

		<footer class="subfooter">

			<div class="clay-container">

				<div class="clay-row">
					<div class="clay-col-3">
						<h3><?php Clay_Render::renderText('footer_menu1_header'); ?></h3>
						<?php Clay_Render::renderMenu('footer1'); ?>
					</div>
					<div class="clay-col-3">
						<h3><?php Clay_Render::renderText('footer_menu2_header'); ?></h3>
						<?php Clay_Render::renderMenu('footer2'); ?>
					</div>
					<div class="clay-col-3">
						<h3><?php Clay_Render::renderText('footer_menu3_header'); ?></h3>
						<?php Clay_Render::renderMenu('footer3'); ?>
					</div>
					<div class="clay-col-3 footer-logo">
						<?php Clay_Render::renderImageByUrl( get_theme_mod('footer_logo') ); ?>
						<h2>About GoldHat Group</h2>
						<div class="footer-about-goldhat">
							<p>GoldHat Group was founded in 2009 by veteran PHP developer Joel Milne. Originally based in Vancouver, Joel and his business travelled across Europe for several years only to return to Canada in 2017. GoldHat Group is now based out of Saint Norbert, New Brunswick. With clients, contractors and users around the world GoldHat Group is a truly international business.</p>
						</div>
					</div>
				</div>

				<div class="clay-row clay-copyright">
					<div class="clay-col-12">
						&copy; Copyright 2017 GoldHat Group. | All Rights Reserved. | Powered by Clay Framework for WordPress.
					</div>
				</div>

			</div>

		</footer>

	</div>

</div>

<?php wp_footer(); ?>

</body>
</html>
