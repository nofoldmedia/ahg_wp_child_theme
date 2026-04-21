<?php
/**
 * 
 * :: Template partial scaffolding : Column 100
 * 
 */
        


$f__section_full_width_text_1_show_hide             = get_field('f__section_full_width_text_1_show_hide');

$f__section_full_width_text_1_reference             = get_field('f__section_full_width_text_1_reference');

$f__section_full_width_text_1_custom_id             = get_field('f__section_full_width_text_1_custom_id');

$f__section_full_width_text_1_title_size            = get_field('f__section_full_width_text_1_title_size');

$f__section_full_width_text_1_text_wysiwyg          = get_field('f__section_full_width_text_1_text_wysiwyg');

// my_print_r('test full width text 1');
// my_print_r($f__section_full_width_text_1_title_size);

?>     


<?php

// :: Show/hide
if($f__section_full_width_text_1_show_hide == 'Show'):

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

                <div class="tp-sp-section-column tp-sp-section-column__100">

                    <?php 

                    // my_print_r($f__section_full_width_text_1_custom_id);

                    // my_print_r($f__section_full_width_text_1_title_size);

                    // my_print_r($f__section_full_width_text_1_text_wysiwyg);


                    $args = array( 

                        // 'arg__post_id' => get_the_ID(),

                        // :: Title size
                        'arg__title_size' => get_field('f__section_full_width_text_1_title_size'),                        

                        // :: full width text
                        'arg__text_wysiwyg' => get_field('f__section_full_width_text_1_text_wysiwyg'),
                            
                    );

                    // my_print_r($args);

                    // :: Get componant
                    get_template_part( 'template_partials_componants_sp/tp_c_sp_column_content__text', null, $args ); // template-parts/file-name.php

                    

                    ?>                

                </div><!-- /.column 100 -->

            </div><!-- /.columns -->

        </div><!-- /.scaffolding-container -->

    </div><!-- /scaffolding.--row -->

</section>

<?php

// /:: Show/hide
endif;

?>