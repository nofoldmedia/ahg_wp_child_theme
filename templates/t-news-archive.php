<?php
/**
 * 
 * :: Template OB News Archive
 * 
 *
 */

?>

<?php

// Taxonomy Loop

/** 
 *  Get the Custom Taxonomy
 *  For a list of other parameters to pass in see link below
 *  @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
 *  For a list of get_term return values see link below
 *  @link https://codex.wordpress.org/Function_Reference/get_term
 * 
 */ 
?>

<?php
// :: Head
// -------
get_template_part( 'template-partials/template-partial-head' );


// :: Header
// ---------
get_template_part( 'template-partials/template-partial-header' );

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