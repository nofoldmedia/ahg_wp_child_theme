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

$var__the_title = $args['arg__the_title'];

$var__text_wysiwyg = $args['arg__text_wysiwyg'];

$var__text_image_caption = $args['arg__text_image_caption'];

?>

<div class="tp-sp-section-column-content__text tp-sp-section-column-content__text--hero">

  <!-- <h1><?= $var__the_title ?></h1> -->

  <?= $var__text_wysiwyg ?>
    
</div>

