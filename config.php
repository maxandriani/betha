<?php
/*
 * Basic functions to create template tags...
 */
function get_url($path = '') {
	return 'http://' . $_SERVER ['HTTP_HOST'] . '/betha/' . $path;
}
function get_image_url($path = '') {
	return get_url ( 'images/' );
}
function the_url($path = '') {
	echo get_url ( $path );
}
function the_image_url($path = '') {
	echo get_image_url ( $path );
}