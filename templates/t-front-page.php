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
get_template_part( 'template-partials-sections/t-p-section-header' );

// :: Template partial : Hero
get_template_part( 'template-partials-sections/t-p-section-hero' );

// :: Template partial  sections : Columns 50/50 text/image
get_template_part( 'template-partials-sections/t-p-section-columns-5050-text-image' );

// :: Template partial  sections : Fullwidth text 1 (Column 100)
get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-1' );

// :: Template partial  sections : Columns four images
get_template_part( 'template-partials-sections/t-p-section-columns-four-images' );

// :: Template partial  sections : Columns 50/50 image/text
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text' );

// :: Template partial  sections : Fullwidth text 2 (Column 100)
// get_template_part( 'template-partials-sections/t-p-section-fullwidth-text-2' );

// :: Template partial  sections : Columns 50/50 - text/text
// get_template_part( 'template-partials-sections/t-p-section-frontpage-columns-5050-text' );

// :: Template partial  sections : Columns 50/50 - text/text #2
// get_template_part( 'template-partials-sections/t-p-section-frontpage-columns-5050-text-2' );

// :: Template partial  sections : Columns 50/50 CTA
get_template_part( 'template-partials-sections/t-p-section-columns-5050-cta' );

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

