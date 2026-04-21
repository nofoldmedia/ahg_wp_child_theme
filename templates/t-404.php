<?php
/**
 * 
 * :: Template 404
 * 
 *  Description : Here
 */
?>
<?php
// :: Head
// -------
get_template_part( 'template-partials/t-p-head' );
echo '<h2>' . 'GOOSE' . '</h2>';


// :: Header
// ---------
get_template_part( 'template-partials/t-p-header' );



// :: Hero
// --------
// get_template_part( 'template-partials/template-partial-acf-field-group-0-hero');


$current_page = get_post(); 


$current_page_slug = $current_page->post_name;

// if($current_page_slug === 'contact'){    

//     // get_template_part( 'template-partials/t-p-contact-hero' );

// }

// :: Page Builder
// ---------------
get_template_part( 'template_partials_acf_types/t_p_acf_t1_flexable_content_types/t_p_acf_t1_fct_page_builder');


// :: Get post name for 'CPT Modal : Settings'

if($current_page_slug === 'login'){    

    get_template_part( 'template-partials/t-p-login-form' ); 

}




/**
 * 
 * This is for testing of the Docusign JWT and Envelope sending
 */
if($current_page_slug === 'docusign-test'){    

    get_template_part( 'template-partials/template-partial-api-testing' ); 

}

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