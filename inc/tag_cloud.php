<?php
/**
 * Modify tag cloud sizes
 *
 *
 * @package Sassyscores
 */

add_filter( 'widget_tag_cloud_args', 'sassys_tag_cloud_widget');

if (! function_exists( 'sassys_tag_cloud_widget' ) ) {
	function sassys_tag_cloud_widget( $args ) {
		$args['smallest'] = 14;
		$args['largest'] = 24;
		$args['unit'] = 'em';
		return $args;
	}
}	