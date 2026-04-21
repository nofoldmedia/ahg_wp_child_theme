<?php
/**
 * 
 * :: 
 * 
 */

 
$f__section_columns_5050_2_text_custom_id = get_field('f__section_columns_5050_2_custom_id');

$f__section_columns_5050_2_text_show_hide = get_field('f__section_columns_5050_2_show_hide');



// :: 50 left
$f__section_columns_5050_2_text_left = get_field('f__section_columns_5050_2_text_left');

// :: 50 right
$f__section_columns_5050_2_text_right = get_field('f__section_columns_5050_2_text_right');

?>     

<?php

// :: Show/hide
// if($f__section_columns_5050_2_text_show_hide == 'Show'):

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

if($f__section_full_width_text_1_custom_id != ''):

?>

id="<?= $f__section_full_width_text_1_custom_id ?>"

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

            <div class="tp-sp-section-column tp-sp-section-column__50">

                <?php

                /**
                 * -----------------------------------------
                 * 
                 * :: Column Content - 50 : Text left
                 * 
                 * -----------------------------------------
                 */

                ?>

                <?php 

                $args = array( 

                    // :: full width text
                    'arg__text_wysiwyg' => $f__section_columns_5050_2_text_left,
                        
                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__text', null, $args ); // template-parts/file-name.php
            
                ?>

                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content - 50 : Text left
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

            <div class="tp-sp-section-column tp-sp-section-column__50">
             
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
                    'arg__text_wysiwyg' => $f__section_columns_5050_2_text_right,
                        
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