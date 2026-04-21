<div class="tp-sp-section-column-content">

<?php

/**
 * 
 * :: Content type : Hero title
 * 
 */

?>                    

<?php 

// :: Background image
$var__section_hero_background_image = $args['var__section_hero_background_image']['url'];

$var__section_hero_text_area     = $args['var__section_hero_text_area'];

?>

    <div class="column-content__bgd" style="background-image: url('<?= $var__section_hero_background_image ?>');"></div>

    <?= $var__section_hero_text_area ?>

</div>