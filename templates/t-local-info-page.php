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

// :: Template partial  sections : Columns 50/50 text/image
get_template_part( 'template-partials-sections/t-p-section-columns-5050-text-image' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-2' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-3' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-4' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-5' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-6' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-7' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-8' );

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text-9' );

// Get the current post ID
$post_id = get_the_ID();

// Retrieve all field groups associated with the current post
$field_groups = acf_get_field_groups(array('post_id' => $post_id));

$field_group_id = '';

// Get the fields within the field group
$fields = acf_get_fields($field_group_id);

// :: Template partial  sections : Fullwidth text 1 (Column 100)
// get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-1' );

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