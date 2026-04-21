<?php
/**
 * 
 * 
 * 
 */

register_nav_menus( array(
    'nav_primary' 			=> __( 'Navigation : Primary', 'Flawless' ),
    'nav_footer_menu_1' 	    => __( 'Navigation : Footer - Menu 1', 'Flawless' ),
    'nav_footer_menu_2' 	    => __( 'Navigation : Footer - Menu 2', 'Flawless' ),
    'nav_footer_menu_3'     => __( 'Navigation : Footer - Menu 3', 'Flawless' ),
) );


// add_filter( 'wp_nav_menu_objects', 'add_nav_menu_item_class' );

// function add_nav_menu_item_class( $items ) {
//     foreach ( $items as $item ) {
//         $item->classes[] = 'css-class-name';
//     }
//     return $items;
// }


function shz_navigation_primary_menu_classes($classes, $item, $args) {

    if($args->theme_location == 'nav_primary') {

        $classes[] = 't-p-header__navigation-primary-menu-item';

    }

    return $classes;

}

add_filter('nav_menu_css_class', 'shz_navigation_primary_menu_classes', 1, 3);


#1
function shz_footer_menu_classes_1($classes, $item, $args) {

    if($args->theme_location == 'nav_footer_menu_1') {

        $classes[] = 't-p-footer-header__menu-item';

    }

    return $classes;

}

add_filter('nav_menu_css_class', 'shz_footer_menu_classes_1', 1, 3);

#2
function shz_footer_menu_classes_2($classes, $item, $args) {

    if($args->theme_location == 'nav_footer_menu_2') {

        $classes[] = 't-p-footer-header__menu-item';

    }

    return $classes;

}

add_filter('nav_menu_css_class', 'shz_footer_menu_classes_2', 1, 3);

#3
function shz_footer_menu_classes_3($classes, $item, $args) {

    if($args->theme_location == 'nav_footer_menu_3') {

        $classes[] = 't-p-footer-header__menu-item';

    }

    return $classes;

}

add_filter('nav_menu_css_class', 'shz_footer_menu_classes_3', 1, 3);