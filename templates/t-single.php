<?php
/**
 * 
 * :: Template Frontpage
 * 
 *  Description : Here
 */

?>
<?php
get_template_part( 'template-partials/t-p-head' );


// :: Header
// ---------
get_template_part( 'template-partials/t-p-header' );


// :: Hero
// --------
// get_template_part( 'template-partials/template-partial-acf-field-group-0-hero');


// :: Page Builder
// ---------------
get_template_part( 'template_partials_acf_types/t_p_acf_t1_flexable_content_types/t_p_acf_t1_fct_page_builder');

?>

<footer style="">

    <?php

    /**
     * ------------------
     * 
     * :: Footer - Header
     * 
     * ------------------
     */

    ?>

    <?php

    get_template_part( 'template-partials/t-p-footer-header' );

    ?>

    <?php

    /**
     * -------------------
     * 
     * /:: Footer - Header
     * 
     * ===================
     */

    ?>

    <?php

    /**
     * ------------------
     * 
     * :: Footer - Footer
     * 
     * ------------------
     */

    ?>

    <?php

    get_template_part( 'template-partials/t-p-footer-footer' );

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


    <?php

    /**
     * ----------------------
     * 
     * :: Modal target element
     * 
     * ----------------------
     */

    ?>				

    <div class="t-p-footer__modal-target-element"></div>

    <?php

    /**
     * ------------------------
     * 
     * /:: Modal target element
     * 
     * ========================
     */

    ?>	


</footer>

<?php
/**
 * ----------------------
 * 
 * :: Modal target element
 * 
 * ----------------------
 */
?>	

<?php wp_footer(); ?>