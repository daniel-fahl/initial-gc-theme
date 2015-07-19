<?php

function gc_pullquote_left($atts, $content = null) {
	return '<div class="pullquote-wrapper left"><div class="pullquote prociono">"'.do_shortcode($content).'"</div></div>';
}
add_shortcode('pullquote_left', 'gc_pullquote_left');

function gc_pullquote_right($atts, $content = null) {
	return '<div class="pullquote-wrapper left"><div class="pullquote prociono">"'.do_shortcode($content).'"</div></div>';
}
add_shortcode('pullquote_right', 'gc_pullquote_right');

?>