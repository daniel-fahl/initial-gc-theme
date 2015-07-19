<?php get_header(); //Template Name: Info ?>
<div id="submenu">
	<?php wp_nav_menu(array('theme_location' => 'ministry', 'menu_class' => 'strip' )) ?>
</div>


<?php if (have_posts()) : while (have_posts()) : the_post();?>

	<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$url = $thumb['0'];
	?>
		<div id="about" class="clearfix" style="padding: 80px 0 40px 0;">
			<div class="col-lg-8 float-block">
				<h1 class="page-title text-center";>
					Über Gamechurch
				</h1>
				<p class="lead">
					Wir glauben, dass es bei Games um mehr als nur Unterhaltung geht.<br>
					Games können uns etwas über uns erzählen,<br>
					über die Art wie wir leben, lieben, verletzen, kämpfen und überwinden.<br>
					Und darum glauben wir dass es sich lohnt, über Games und über Gaming zu reden.
				</p>
			</div>
		</div>

		<div id="pagecontent" class="clearfix">

			<h3 class="lineheader"><span>Unsere Arbeit</span></h3>

			<?php the_content(); ?>

			<div class="col-lg-6">

				<h3 class="lineheader"><span>Gaming und Glaube…</span></h3>
			
				<p>… sollten sich nicht ausschließen. Leider wird die Gaming-Kultur auch
				von der Kirche wenig bis überhaupt nicht wahrgenommen. Es ist unser Anliegen,
				Gamern von Gottes Botschaft zu erzählen, indem wir eine Umgebung schaffen,
				in der Menschen auf eine für sie relevante Art und Weise mit dieser Botschaft in Kontakt kommen.

				In Johannes 1, 23 sagt Johannes der Täufer: „Ich bin die Stimme eines Rufenden
				in der Wüste: Macht gerade den Weg des Herrn.’” Für viele Gamer wurde der Weg 
				zu Christus lang und krumm gemacht. Uns liegt es am Herzen, diesen Weg gerade zu machen.

				In unserer Arbeit geht es nicht darum, Legitimationen oder Gründe zum Zocken
				zu schaffen, sondern vielmehr die Beziehung zu Jesus auch bei diesem Hobby
				authentisch und bewusst zu leben.</p>

			</div>
			
			<div class="col-lg-6">
			
				<h3 class="lineheader"><span>Gemeinschaft in Freiheit…</span></h3>
			
				<p>… ist unser Motto. Keine Schuldzuweisung, keine Schubladen. Durch Austausch
				und Aufklärung sollen Gemeinschaft und Zusammenarbeit gefördert werden, um die
				Gesellschaft zu einem Ort zu machen, an dem sich Menschen frei und akzeptiert fühlen.</p>
			
			</div>
			<div class="col-lg-6">
			
				<h3 class="lineheader"><span>Gegen Sprachlosigkeit…</span></h3>
			
				<p>… vorzugehen ist damit unser Ziel. Jeder braucht mal Hilfe.
				Wir wollen Kirchen, Eltern und Jugendlichen bei Fragen und Problemen
				rund um das Thema Gaming als Ansprechpartner zur Seite stehen.</p>
			
			</div>
		
		</div>
		
		<div class="spacer"></div>

<?php endwhile; endif; ?>

</div>

<div class="bottom-menu">
    <ul class="strip">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
    </ul>
</div>


<?php get_footer(); ?>