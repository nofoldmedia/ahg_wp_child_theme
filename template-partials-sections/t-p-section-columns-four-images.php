<?php
/**
 * 
 * :: 
 * 
 */

$f__section_columns_four_images_custom_id = get_field('f__section_columns_four_images_custom_id');

$f__section_columns_four_images_show_hide = get_field('f__section_columns_four_images_show_hide');



// my_print_r($f__section_columns_5050_image_text_image_left_group);

// :: four images 1
$f__section_columns_four_images_1 = get_field('f__section_columns_four_images_1');

// :: four images 2
$f__section_columns_four_images_2 = get_field('f__section_columns_four_images_2');

// :: four images 3
$f__section_columns_four_images_3 = get_field('f__section_columns_four_images_3');

// :: four images 4
$f__section_columns_four_images_4 = get_field('f__section_columns_four_images_4');

?>     

<?php

// :: Show/hide
// if($f__section_columns_5050_text_show_hide == 'Show'):

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

if($f__section_columns_four_images_custom_id != ''):

?>

id="<?= $f__section_columns_four_images_custom_id ?>"

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

class="section-fullwidth-text-1">

    <div class="scaffolding-container">
        
        <div class="scaffolding-row">

            <div class="scaffolding-columns scaffolding-columns--four-images">

        

            <?php

            /**
             * --------------
             * 
             * :: Column : 1
             * 
             * --------------
             */

            ?>        

            <div class="tp-sp-section-column tp-sp-section-column__25">
             
                <?php

                /**
                 * -------------------------------------------
                 * 
                 * :: Column Content - 50 : Text right
                 * 
                 * -------------------------------------------
                 */

                ?>

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__img' => $f__section_columns_four_images_1,

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
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
             * :: /Column : 1
             * 
             * ===============
             */

            ?> 

            <?php

            /**
             * --------------
             * 
             * :: Column : 2
             * 
             * --------------
             */

            ?>        

            <div class="tp-sp-section-column tp-sp-section-column__25">

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__img' => $f__section_columns_four_images_2,

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
                ?>

            </div>

            <?php

            /**
             * ---------------
             * 
             * :: /Column : 2
             * 
             * ===============
             */

            ?>  
            
            <?php

            /**
             * --------------
             * 
             * :: Column : 3
             * 
             * --------------
             */

            ?>        

            <div class="tp-sp-section-column tp-sp-section-column__25">

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__img' => $f__section_columns_four_images_3,

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
                ?>

            </div>

            <?php

            /**
             * ---------------
             * 
             * :: /Column : 3
             * 
             * ===============
             */

            ?>     
            
            <?php

            /**
             * --------------
             * 
             * :: Column : 4
             * 
             * --------------
             */

            ?>        

            <div class="tp-sp-section-column tp-sp-section-column__25">

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__img' => $f__section_columns_four_images_4,

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
                ?>

            </div>

            <?php

            /**
             * ---------------
             * 
             * :: /Column : 4
             * 
             * ===============
             */

            ?>              

            </div><!-- /.column -->

        </div><!-- /.scaffolding-container -->

    </div><!-- /scaffolding.--row -->

</section>

<?php

// /:: Show/hide
// endif;

?>            