<?php
/**
 * 
 * :: AJAX for modal window content
 * 
 * :: Resource : https://medium.com/@alejandro-ao/how-to-do-ajax-in-wordpress-a826f9fde4d5
 * 
 */

 add_filter( 'get_custom_logo', 'change_logo_class' );


 function change_logo_class( $html ) {
 
     $html = str_replace( 'custom-logo', 'wordpress-child-theme__site-branding-logo', $html );
     $html = str_replace( 'custom-logo-link', 'wordpress-child-theme__site-branding-logo', $html );
 
     return $html;
 }
 