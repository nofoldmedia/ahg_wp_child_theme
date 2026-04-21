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


// $var__section_hero_title_text_size = $args['var__section_hero_title_text_size'];

$var__post_id = $args['var__post_id'];

$var__section_hero_title_text_size = '';

// :: Post object
$var__section_hero_background_image = $args['var__section_hero_background_image'];

$field_groups = $args['var__field_groups'];

          
$var__section_hero_title_text_size = get_field('f__section_text_title_size', $var__post_id);

          

// Loop through each field group
foreach ($field_groups as $field_group) {

    // Get the field group ID
    $field_group_id = $field_group['ID'];

    // Get the fields within the field group
    $fields = acf_get_fields($field_group_id);

    foreach ($fields as $field) {

        // my_print_r($field['name']);

        if($field == 'f__section_text_title_size'):

          // $var__section_hero_title_text_size = get_field('f__section_text_title_size', $var__post_id);



        endif;

    }    

}

// my_print_r($var__section_hero_background_image);

/**
 * --------
 * 
 * /:: Vars
 *
 * ========
 */ 

?>

<div class="tp-sp-section-column-content__bgd--hero" style="background-image: url('<?= $var__section_hero_background_image['url'] ?>');"></div>

<div class="tp-sp-section-column-content abstract-typography-title-size<?= $var__section_hero_title_text_size ?>">

    <?php
    // my_print_r($field_groups);
    the_title('<div class="title _title-medium"><h3>', '</h3></div>');

    the_excerpt('<p>', '</p>');
    
    ?>

</div>

<?php

/**
 * -------------------
 * 
 * :: /column : Content
 * 
 * ====================
 */

?>  