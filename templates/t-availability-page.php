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

// :: Template partial  sections : Columns 40/60
get_template_part( 'template-partials-sections/t-p-section-columns-5050-image-text' );

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

