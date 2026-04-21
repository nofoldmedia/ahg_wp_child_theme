<?php
/**
 * 
 * :: 
 * 
 */


 
$f__section_columns_4060_custom_id = get_field('f__section_columns_4060_custom_id');


$f__section_columns_4060_show_hide = get_field('f__section_columns_4060_show_hide');



// :: 40
$f__section_columns_4060_tile_cta_page_relationship_40 = get_field('f__section_columns_4060_tile_cta_page_relationship_40');

// my_print_r($f__section_columns_4060_tile_cta_page_relationship_40);


// :: 60
$f__section_columns_4060_page_relationship_60 = get_field('f__section_columns_4060_page_relationship_60');


// my_print_r($f__section_columns_4060_page_relationship_60);

?>     

<?php

// :: Show/hide
// if($f__section_columns_4060_show_hide == 'Show'):

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

            <div class="tp-sp-section-column tp-sp-section-column__40">

                <?php

                /**
                 * -----------------------------------------
                 * 
                 * :: Column Content : Page relaptionship 40
                 * 
                 * -----------------------------------------
                 */

                ?>

                <?php 

                $args = array( 

                    'var__section_columns_4060_tile_cta_page_relationship' => get_field('f__section_columns_4060_tile_cta_page_relationship_40'),

                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__cta-relationship-tile', '', $args ); // template-parts/file-name.php

                
                ?>

                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content : Page relaptionship 40
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

            <div class="tp-sp-section-column tp-sp-section-column__60">
             
                <?php

                /**
                 * -------------------------------------------
                 * 
                 * :: Column Content - 60 : Page relaptionship
                 * 
                 * -------------------------------------------
                 */

                ?>


                <?php 

                $args = array( 

                    $var__post_id = 'var__section_columns_4060_tile_cta_page_relationship' => get_field('f__section_columns_4060_tile_cta_page_relationship_60'),

                );

                // :: Get componant
                get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__cta-relationship-tile', '', $args ); // template-parts/file-name.php

                ?>

                <?php

                /**
                 * ------------------------------------------
                 * 
                 * :: /Column Content : Page relaptionship 60
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