<?php

/**
 * 
 * Load header styles & scripts
 * 
 */

function register_scripts_styles() {

    // :: Styles
    wp_enqueue_style( 'styles_min', get_theme_file_uri() . '/build/css/styles.min.css', array(), '', 'screen' );

    // :: Scripts
    wp_register_script( 'scripts_min', get_theme_file_uri() . '/build/js/scripts.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'scripts_min' );  
    
    // // :: Nonce scripts (Button modal)
    // wp_enqueue_script('scripts-nonce' , get_stylesheet_directory_uri() . '/build/js/scripts-nonce.min.js', ['jquery'], null, true);
    // wp_localize_script( 'scripts-nonce'  , 'scripts_nonce', array(

    //         'nonce'    => wp_create_nonce( 'scripts_nonce' ),
            
    //         'ajax_url' => admin_url( 'admin-ajax.php'),
            
    // ));    
    
}    

add_action('wp_enqueue_scripts', 'register_scripts_styles');
