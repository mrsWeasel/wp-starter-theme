<?php
/**
 * Modify tag cloud sizes
 *
 *
 * @package Tuomas
 */

add_filter( 'widget_tag_cloud_args', 'tk_tag_cloud_widget');

if (! function_exists( 'tk_tag_cloud_widget' ) ) {
	function tk_tag_cloud_widget( $args ) {
		$args['smallest'] = 14;
		$args['largest'] = 24;
		$args['unit'] = 'px';
		return $args;
	}
}	