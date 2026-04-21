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

$var__img = $args['arg__img'];

// $var__content_bgd = wp_get_attachment_image_src( get_post_thumbnail_id());

// $var__img_no_overlay = $args['arg__img_no_overlay'];

$var__img_width_value = $args['arg__img_width'];

$var__img_width = $var__img_width_value . '%;';

$var__img_bgd_setting = $var__img_width_value == 100 ? 'cover' : $var__img_width;

?>    

  <div class="tp-sp-section-column-content__bgd <?= $var__img_no_overlay ?>" style="background-size: <?= $var__img_bgd_setting ?>; background-image: url('<?= $var__img['url'] ?>');"></div>