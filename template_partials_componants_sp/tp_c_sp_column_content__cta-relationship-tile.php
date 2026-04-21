<?php

/**
 * ----------------------------------
 * 
 * :: column : Content - relationship
 *
 * Renders:
 * - Title
 * - Excerpt
 * - featured image
 * 
 * ----------------------------------
 */ 

 /**
  * -------------------------------------------------------------------------------------------------------------------
  * 
  * :: Notes : So what gives with setup_postdata()???
  * 
  * :: If you want to attacha other global vars e.g. 'ID' you need to wrap it in this 
  * :: special function.
  * ::
  * :: For tags like 'the_title()' it's not required.
  * ::
  * :: Resource : ACF : https://www.advancedcustomfields.com/resources/post-object/
  * :: Resource : STACK OVERFLOW : https://wordpress.stackexchange.com/questions/99597/what-does-setup-postdata-post-do
  * 
  * -------------------------------------------------------------------------------------------------------------------
  */

?>

<?php 

/**
 * -------
 * 
 * :: Vars
 *
 * -------
 */ 



// :: Post object
// $var__section_columns_4060_tile_cta_page_relationship = $args['var__section_columns_4060_tile_cta_page_relationship'];
$var__post_object = $args['var__section_columns_5050_tile_cta_page_relationship'];

// my_print_r($var__post_object);

// :: Post thumbnail image (for the bgd)
$var__content_bgd = '';

/**
 * --------
 * 
 * /:: Vars
 *
 * ========
 */ 

?>

<?php

// :: Start loop using global var '$post'
foreach( $var__post_object as $post ):

// :: Setup this post for WP functions (variable must be named $post).
setup_postdata($post);

/**
 * -------------------------------------------
 * 
 * :: Set up background image inside '$post' global
 * so we can use 'get' for poust data
 * 
 * -------------------------------------------
 */

if ( has_post_thumbnail()) {
    
    $var__content_bgd = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');

};

/**
 * ---------------------------
 * 
 * /:: Set up background image
 * 
 * ===========================
 */

// my_print_r($post);

?>

<a class="tp-sp-section-column__50--cta-link" href="<?= get_permalink() ?>">

<div class="tp-sp-section-column-content__bgd" style="background-image: url('<?= $var__content_bgd[0] ?>');"></div>

<div class="tp-sp-section-column-content">

    <?php
    
    the_title('<h2 class="title title-medium">', '</h2>');

    the_excerpt('<p>', '</p>');
    
    ?>

    <div class="componants-button--cta">find out more</div>

</div>

</a>

<?php

// :: Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata();

endforeach;

?>

<?php

/**
 * -------------------
 * 
 * :: /column : Content
 * 
 * ====================
 */

?>  