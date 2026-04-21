<?php
/**
 * 
 * :: Wordpress dashicons 
 * 
 * :: Use case : Show/hide password in
 * 
 */

function ww_load_dashicons(){

    wp_enqueue_style('dashicons');

}

add_action('wp_enqueue_scripts', 'ww_load_dashicons');