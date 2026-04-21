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
get_template_part( 'template-partials-sections/t-p-section-frontpage-hero' );

// :: Template partial  sections : Fullwidth text 1 (Column 100)
get_template_part( 'template-partials-sections/t-p-section-frontpage-fullwidth-text-1' );

// :: Template partial  sections : Fullwidth text 2 (Column 100)
get_template_part( 'template-partials-sections/t-p-section-frontpage-fullwidth-text-2' );

// :: Template partial  sections : Columns 40/60 - 1
get_template_part( 'template-partials-sections/t-p-section-frontpage-columns-1-4060' );




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

