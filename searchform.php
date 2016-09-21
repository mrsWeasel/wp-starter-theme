<?php


?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:', 'sassyscores'); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e('Search', 'sassyscores'); ?>" value="" name="s" />
	</label>
	<button type="submit" class="search-submit"><?php esc_html_e('Search', 'sassyscores');?></button>
</form>