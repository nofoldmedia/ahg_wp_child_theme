<?php
/**
 * 
 * :: Template Page Search
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



get_template_part( 'template-partials/t-p-search-bar' ); 

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