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

$var__text_wysiwyg = $args['arg__text_wysiwyg'];

$var__text_image_caption = $args['arg__text_image_caption'];

?>

<div>

  <?= $var__text_wysiwyg ?>

  <?php if($var__text_image_caption): ?>

  <span>
    
    <span class="section-columns-5050-text-image-text-left-image-caption__orientation--desktop-left">Opposite: </span>

    <span class="section-columns-5050-text-image-text-left-image-caption__orientation--mobile-below">Below: </span>
    
    <?= $var__text_image_caption ?>

  </span>

  <?php endif; ?>

</div>
  

  

