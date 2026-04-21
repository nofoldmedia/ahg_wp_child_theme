<?php
/**
 * 
 * :: 
 * 
 */


 
$f__section_columns_5050_cta_custom_id = get_field('f__section_columns_5050_cta_custom_id');

// my_print_r('test');


$f__section_columns_5050_cta_show_hide = get_field('f__section_columns_5050_cta_show_hide');

// :: 40
$f__section_columns_5050_tile_cta_page_relationship_left = get_field('f__section_columns_5050_tile_cta_page_relationship_left');

// my_print_r($f__section_columns_5050_tile_cta_page_relationship_left);


// :: 60
$f__section_columns_5050_tile_cta_page_relationship_right = get_field('f__section_columns_5050_tile_cta_page_relationship_right');


// my_print_r($f__section_columns_5050_tile_cta_page_relationship_right);

?>     

<?php

// :: Show/hide
// if($f__section_columns_5050_show_hide == 'Show'):

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
            
            <div class="tp-sp-section-column tp-sp-section-column__50 tp-sp-section-column__50--cta">

            <!-- <a class="tp-sp-section-column__50--cta-link" href=""> -->

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

                // my_print_r(get_field('f__section_columns_5050_tile_cta_page_relationship_left'));

                $args = array( 

                    'var__section_columns_5050_tile_cta_page_relationship' => get_field('f__section_columns_5050_tile_cta_page_relationship_left'),

                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__cta-relationship-tile', '', $args ); // template-parts/file-name.php

                
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
            
            <!-- </a> -->

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

            <div class="tp-sp-section-column tp-sp-section-column__50 tp-sp-section-column__50--cta">
             
                <a class="tp-sp-section-column__50--cta-link" href="">

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

                    $var__post_id = 'var__section_columns_5050_tile_cta_page_relationship' => get_field('f__section_columns_5050_tile_cta_page_relationship_right'),

                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__cta-relationship-tile', '', $args ); // template-parts/file-name.php

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

</a>

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