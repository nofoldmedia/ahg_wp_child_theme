<?php
function include_scripts_styles(){

    include get_theme_file_path( 'includes/include_scripts_styles.php' );
    
}

include_scripts_styles();

// ** /Do Not change this 
include get_theme_file_path( 'includes/include_gtag.php' );
include get_theme_file_path( 'includes/include_gtag_body.php' );
include get_theme_file_path( 'includes/include_wordpress_dashicons.php' ); 
include get_theme_file_path( 'includes/include_wordpress_custom_logo.php' );
include get_theme_file_path( 'includes/include_add_tags_to_body_class.php' ); 
// include get_theme_file_path( 'includes/include_wordpress_ajax.php' ); 

// :: ACF save field groups by name
include get_theme_file_path( 'includes/include_acf_json.php' ); 

add_post_type_support( 'page', 'excerpt');

// Picture tag
// apply_filters( 'wp_get_attachment_image', $html, $attachment_id, $size, $icon, $attr );
function wrap_wp_get_attachment_image_with_picture_tag( $html, $attachment_id, $size, $icon, $attr ){
    if ( is_admin() || $size == 'medium' || $size == 'thumbnail' ) return $html;
    if ( $mobile_id = get_post_meta( $attachment_id, '_meta_key_of_mobile_picuture_id', true ) ){
        $mobile_srcset = wp_get_attachment_image_srcset( $mobile_id, 'medium_large' );
        $html = '<picture><source media="( max-width : 782px )" srcset="'.$mobile_srcset.'">'.$html.'</picture>';
    }
    return $html;
}
add_filter( 'wp_get_attachment_image', 'wrap_wp_get_attachment_image_with_picture_tag', 10, 5 );


/** Vendor Wordpress : Register Custom Nav Walker */
function register_custom_nav_walker(){

    require_once get_stylesheet_directory() . '/mega-menu__nav-walker.php';
    // include get_theme_file_path('includes/i-parent-theme/i-pt-mega-menu-nav-walker.php');

}
add_action( 'after_setup_theme', 'register_custom_nav_walker' );