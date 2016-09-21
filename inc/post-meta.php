<?php

if (! function_exists('tk_entry_meta')) {
	function tk_entry_meta() {
		echo '<section class="entry-meta">';

		echo '<span>' . sprintf( esc_html__('Posted on %1$s by %2$s', 'sassyscores'), get_the_time(), get_the_author() ) . '</span>';
		echo ' in ';
		the_category(' ');
		echo '</section>';
	}
}