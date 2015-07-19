<?php get_header();
/**
 * Custom Front Page for the Theme.
 * This file is static and thus will not be loaded
 * from the database.
 */
?>

<div id="about" class="container-fluid">

	<div class="col-lg-8 float-block">

		<h1 id="front-page-title">Willkommen bei Gamechurch.</h1>
		<br><br>
		<!-- p class="lead">
			Wir glauben, dass es bei Games um mehr als nur Unterhaltung geht.<br>
			Games können uns etwas über uns erzählen, über die Art wie wir
			leben, lieben, verletzen, kämpfen und überwinden.<br>
			Und darum glauben wir dass es sich lohnt, über Games und über Gaming zu reden.
		</p -->
		<br><br>
		<div class="action-buttons">
			<a href="/ueber-uns" class="btn btn-line mont">Erfahre mehr</a>
		</div>

	</div>
</div>
<div class="container-fluid" style="height: 0;">
	<div class="col-lg-6 col-sm-9 float-block">
		<div id="social-media-buttons">
			<a class="button-md button-facebook" href="https://www.facebook.com/gamechurchdeutschland"></a>
			<a class="button-md button-mail" href="/kontakt"></a>
			<a class="button-md button-paypal" href="/spenden"></a>
		</div>
	</div>
</div>

<?php get_footer(); ?>