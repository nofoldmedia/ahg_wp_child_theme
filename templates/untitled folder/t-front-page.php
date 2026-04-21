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
get_template_part( 'template-partials/t-p-head' );


// :: Header
// ---------
get_template_part( 'template-partials/t-p-header' );


// :: Page Builder
// ---------------
get_template_part( 'template_partials_acf_types/t_p_acf_t1_flexable_content_types/t_p_acf_t1_fct_page_builder');


// :: Home page questionnair
// --------------
get_template_part( 'template-partials/t-p-questionnaire-mobile-open' );

// :: Home page questionnair
// --------------
get_template_part( 'template-partials/t-p-questionnaire' );



// :: Footer
// ---------
// get_template_part( 'template-partials/t-p-footer' );
?>

<footer>

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



<?php wp_footer(); ?>