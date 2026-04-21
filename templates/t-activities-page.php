<?php
/**
 * 
 * :: Template Frontpage
 * 
 *  Description : Here
 */
?>
<?php
// :: Head
// -------
get_template_part( 'template-partials/t-p-head' ); // <-- comes from parent theme


// :: Header
// ---------
// get_template_part( 'template-partials-sp/t-p-sp-header' );
get_template_part( 'template-partials-sections/t-p-section-header' );

// :: Template partial  sections : Hero (Column 100)
get_template_part( 'template-partials-sections/t-p-section-hero' );












// $specifications_group_id = 'group_690054772e1d7'; // Replace with your group ID
// $specifications_fields      = array();

// $fields = acf_get_fields( $specifications_group_id );

// foreach ( $fields as $field ) {
//     $field_value = get_field( $field['name'] );

//     if ( ! empty( $field_value ) ) {
//         $specifications_fields[ $field['name'] ] = $field_value;
//     }
// }










// Get the current post ID
$post_id = get_the_ID();

// Retrieve all field groups associated with the current post
$field_groups = acf_get_field_groups(array('post_id' => $post_id));

$field_group_id = '';

// Get the fields within the field group
$fields = acf_get_fields($field_group_id);

// my_print_r($fields);

// // Loop through each field group
// foreach ($field_groups as $field_group) {

//     // Get the field group ID
//     $field_group_id = $field_group['ID'];

//     // Get the fields within the field group
//     $fields = acf_get_fields($field_group_id);

//     foreach ($fields as $field) {

//         // :: g__section_full_width_text_1
//         if($field['name'] == 'g__section_full_width_text_1'){

//             $field_value = get_field( $field['name'] );
            
//             $args = array( 

//                 // :: full width text
//                 'arg__text_wysiwyg' => $field_value['f__section_full_width_text_text_wysiwyg'],
                    
//             );

//             // :: Get componant
//             get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-1--group', null, $args ); // template-parts/file-name.php            

//         } // /:: g__section_full_width_text_1

//         // :: g__section_full_width_text_1
//         if($field['name'] == 'g__section_full_width_text_2'){

//             $field_value = get_field( $field['name'] );
            
//             $args = array( 

//                 // :: full width text
//                 'arg__text_wysiwyg' => $field_value['f__section_full_width_text_text_wysiwyg'],
                    
//             );

//             // :: Get componant
//             get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-2--group', null, $args ); // template-parts/file-name.php            

//         } // /:: g__section_full_width_text_1        

//     }    

// }

// :: Template partial  sections : Fullwidth text 1 (Column 100)
get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-1' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-text-image' );

// :: Template partial  sections : Fullwidth text 2 (Column 100)
// get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-2' );

// :: Template partial  sections : Columns 50/50 - text/text
// get_template_part( 'template-partials-sections/t-p-section-columns-5050-text' );

// :: Template partial  sections : Columns 50/50 - text/Image #2
// get_template_part( 'template-partials-sections/t-p-section-columns-5050-text-2' );

// :: Template partial  sections : Columns 40/60
// get_template_part( 'template-partials-sections/t-p-section-columns-4060' );






// :: Tmplate partial : Section - Header
// ---------
// get_template_part( 'template-partials-sp/t-p-sp-section-hero' );

// :: Tmplate partial : Section - Text (WYSIWYG)
// ---------

// :: Tmplate partial : Section - Columns 4060
// ---------
// get_template_part( 'template-partials-sp/t-p-sp-sexction-tile-4060' );



// :: Page Builder
// ---------------
// get_template_part( 'template_partials_acf_types/t_p_acf_t1_flexable_content_types/t_p_acf_t1_fct_page_builder');

?>



<?php

/**
 * ------------------
 * 
 * :: Footer
 * 
 * ------------------
 */

?>

<?php

get_template_part( 'template-partials-sections/t-p-section-footer' );

?>

<?php

/**
 * -------------------
 * 
 * /:: Footer - Footer
 * 
 * ===================
 */

?>

