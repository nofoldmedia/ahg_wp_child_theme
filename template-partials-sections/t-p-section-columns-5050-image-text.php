<?php
/**
 * 
 * :: 
 * 
 */

 
$f__section_columns_5050_image_text_custom_class_name = get_field('f__section_columns_5050_image_text_custom_class_name');

// my_print_r($f__section_columns_5050_image_text_custom_class_name);

$f__section_columns_5050_text_show_hide = get_field('f__section_columns_5050_show_hide');


$f__section_columns_5050_image_text_image_left_group = get_field('f__section_columns_5050_image_text_image_left_group');

// my_print_r($f__section_columns_5050_image_text_image_left_group);

// // :: 50 left - image
// $f__section_columns_5050_image_text_image_left = $f__section_columns_5050_image_text_image_left_group['f__section_columns_5050_image_text_image_left'];

$f__section_columns_5050_image_text_image_left = $f__section_columns_5050_image_text_image_left_group['f__section_columns_5050_image_text_image_left'];

$f__section_columns_5050_image_text_image_left_width = $f__section_columns_5050_image_text_image_left_group['f__section_columns_5050_image_text_image_left_width'];

// my_print_r($f__section_columns_5050_image_text_image_left);







// :: Section Columns - 50/50 image & text #1
$f__section_columns_5050_image_text_text_right_group = get_field('f__section_columns_5050_image_text_text_right_group');

// my_print_r($f__section_columns_5050_image_text_text_right_group);



// // :: 50 right - text
$f__section_columns_5050_image_text_text_right = $f__section_columns_5050_image_text_text_right_group['f__section_columns_5050_image_text_text_right'];

// my_print_r($f__section_columns_5050_image_text_text_right);

// // :: 50 right - Image caption
$f__section_columns_5050_image_text_text_right_image_caption = $f__section_columns_5050_text_text_image_right_group['f__section_columns_5050_image_text_text_right_image_caption'];

// // my_print_r($f__section_columns_5050_text_text_image_right);




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

if($f__section_columns_5050_image_text_custom_class_name != ''):

?>

id="<?= $f__section_columns_5050_image_text_custom_class_name ?>"

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

class="section-5050__image-text--1">

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

            <!-- <div class="tp-sp-section-column tp-sp-section-column__50". style="background-color: #5e5c7b; color: #fff;"> -->
            <div class="tp-sp-section-column tp-sp-section-column__50 tp-sp-section-column__50--bgd-image-tile">

                <?php

                /**
                 * -------------------------------------------
                 * 
                 * :: Column Content - 50 : Image left
                 * 
                 * -------------------------------------------
                 */

                ?>

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__img' => $f__section_columns_5050_image_text_image_left,

                    'arg__img_no_overlay' => 'tp-sp-section-column-content__bgd--no-overlay',

                    'arg__img_width' => $f__section_columns_5050_image_text_image_left_width,
                    
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__image', null, $args ); // template-parts/file-name.php
            
                ?>

                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content - 50 : Image left
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





            <?php

            /**
             * --------------
             * 
             * :: Column : 60
             * 
             * --------------
             */

            ?>        
            
            <div class="tp-sp-section-column tp-sp-section-column__50". style="_background-color: #5e5c7b; _color: #fff;">

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

                $args = array( 

                    // :: full width text
                    'arg__text_wysiwyg' => $f__section_columns_5050_image_text_text_right,
                    
                    'arg__text_image_caption' => $f__section_columns_5050_image_text_text_right_image_caption,
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__text', null, $args ); // template-parts/file-name.php
            
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
             * :: /Column : 60
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