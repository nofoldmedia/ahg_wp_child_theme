<?php
/**
 * 
 * The Homepage footer.
 *
 * This is the template that displays all the homepage footer content for questionnaire
 *
 *
 * @package WordPress
 * @subpackage shizl
 * 
 */

?>

<?php 
$l__var__helper_layout_class_name           = 'template-partial-homepage__footer';


//my_print_r($r__multi_column_grid__column_text_image);
?>

<section class="<?= $l__var__helper_layout_class_name; ?>">

    <div class="scaffolding-container">

        <div class="<?= $l__var__helper_layout_class_name; ?>__column-grid">

            <div class="<?= $l__var__helper_layout_class_name; ?>__grid-item">

                <div class="abstract-typography-wysiwyg-editor__questionnair"> 
                    <h2>Select the type of legal documents you need…</h2>
                </div>
        
            </div>

            <div class="<?= $l__var__helper_layout_class_name; ?>__grid-item">

                <?php
                /**
                * 
                * :: ACF Field Group 3 : Componant Button Group
                * 
                */
                //$r__acf_field_group_3_component__button_group = get_sub_field('r__acf_field_group_3_component__button_group');



                /** 
                 * 
                 * 
                 *  NOTE : The following button array elements are only temporary and for initial styling
                 *  Must be removed when Questionnair is coded
                 * 
                 * 
                */


                global $button_graphic;
                $button_graphic = '';
                global $r__acf_field_group_3_component__button_group;

                $r__acf_field_group_3_component__button_group[0]['r__f__button_link']['title'] = 'business';
                $r__acf_field_group_3_component__button_group[0]['r__f__button_link']['url'] = '#';
                $r__acf_field_group_3_component__button_group[0]['r__f__button_link']['target'] = '';
                $r__acf_field_group_3_component__button_group[0]['r__f__button_type'] = 'hollow';

                $r__acf_field_group_3_component__button_group[1]['r__f__button_link']['title'] = 'personal';
                $r__acf_field_group_3_component__button_group[1]['r__f__button_link']['url'] = '#';
                $r__acf_field_group_3_component__button_group[1]['r__f__button_link']['target'] = '';
                $r__acf_field_group_3_component__button_group[1]['r__f__button_type'] = 'hollow';


                //my_print_r($r__acf_field_group_3_component__button_group);

                get_template_part( 'template-partials/tp__acf-field-groups/tp__acf-field-group-3-componants/tp__acf_g3__componant-button-group');                       

                ?>

            </div>
        
        </div>

    </div>

</section>