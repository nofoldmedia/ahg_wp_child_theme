<?php
/**
 * 
 * :: Template partial scaffolding : Column 100
 * 
 */


$f__section_hero_text_area = get_field('f__section_hero_text_area');


?>                    

<section 

<?php

/**
 * ---------------------
 * 
 * :: Section anchour tag
 * 
 * ---------------------
 */

if($f__section_tile_4060_anchour_tag != ''):

?>

id="<?= $f__section_tile_4060_anchour_tag ?>"

<?php

endif;

/**
 * ----------------------
 * 
 * /:: Section anchour tag
 * 
 * ======================
 */

?>

class="t-p-sp-section-hero section-hero">

    <div class="scaffolding-container">
        
        <div class="scaffolding-row">

            <div class="scaffolding-columns">

            

                        <?php



            /**
             * --------------
             * 
             * :: column : 40
             * 
             * --------------
             */

            ?>        

            <div class="tp-sp-section-column tp-sp-section-column__100 tp-sp-section-column--bgd-image-tile tp-sp-section-column--bgd-overlay">

                <?php

                /**
                 * -------------------------------------------
                 * 
                 * :: Column Content : Image
                 * 
                 * -------------------------------------------
                 */

                ?>

                <?php 

                $args = array( 

                    // :: full width text
                    // 'arg__img' => $f__section_columns_5050_image_text_2_image_left,
                    'arg__img' => get_field('f__section_hero_background_image'),

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',

                    // 'arg__img_width' => $f__section_columns_5050_image_text_2_image_left_width
                    'arg__img_width' => 100 //
                    
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
                ?>


                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content : Image
                 * 
                 * ==========================================
                 */

                ?>  

                <?php

                /**
                 * -----------------------------------------
                 * 
                 * :: Column Content - 50 : Text right
                 * 
                 * -----------------------------------------
                 */

                ?>

                <?php 

                
    // my_print_r($field_groups);
    // the_title('<div class="title _title-medium"><h1>', '</h1></div>');

    // the_excerpt('<p>', '</p>');


                $args2 = array( 

                    'arg__the_title' => get_the_title(),
                
                    'arg__text_wysiwyg' => $f__section_hero_text_area,
                        
                );

                // :: Get componant -> make this hero
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__text--hero', null, $args2 ); // template-parts/file-name.php
            
                ?>

                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content - 50 : Text right
                 * 
                 * ==========================================
                 */

                ?>


            </div>

            <?php

            /**
             * ---------------
             * 
             * :: /column : 40
             * 
             * ===============
             */

            ?> 



            </div><!-- /.columns -->

        </div><!-- /.scaffolding-container -->

    </div><!-- /scaffolding.--row -->

</section>
