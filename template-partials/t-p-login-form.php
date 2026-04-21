<?php 

/**
 * -------------
 * 
 * :: Login form
 * 
 * -------------
 */

?>

<?php

$var__helper_class_name = '';

$var__helper_class_name   = 't-p-panel';

?>


<?php

/**
 * ----------
 * 
 * :: Section
 * 
 * ----------
 */

?>		

<section class="<?= $var__helper_class_name ?>">

    <?php

    /**
     * --------------------------
     * 
     * :: Scaffolding : Container
     * 
     * --------------------------
     */    

    ?>	
    
    <div class="scaffolding-container">

        <?php
        
        /**
         * --------------------------
         * 
         * :: Scaffolding : Row
         * 
         * --------------------------
         */            

        ?>		
        
        <div class="scaffolding-row">		

            <div class="t-p-acf-t2-ly-content-grid__modal-target-element-close t-p-acf-t2-ly-content-grid__modal-target-element-close--card">
                
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M256 213.3 42.7 0 0 42.7 213.3 256 0 469.3 42.7 512 256 298.7 469.3 512l42.7-42.7L298.7 256 512 42.7 469.3 0z"></path></svg>
            
            </div>        

            <div class="<?= $var__helper_class_name ?>">

                <div class="<?= $var__helper_class_name ?>__group">
                
                    <div class="<?= $var__helper_class_name ?>__header">
                        
                        <span class="<?= $var__helper_class_name ?>__header-item <?= $var__helper_class_name ?>__header-item-link <?= $var__helper_class_name ?>__header-item-link--close" ><strong>sign up</strong></span>

                        <span class="<?= $var__helper_class_name ?>__header-item <?= $var__helper_class_name ?>__header-item-link <?= $var__helper_class_name ?>__header-item-link--active"><strong>login</strong></span>

                    </div>

                    <div class="<?= $var__helper_class_name ?>__body">

                        <div class="t-p-acf-t2-ct-feature-title">

    
                            <div class="t-p-acf-t2-ct-feature-title__text-group">

                                <div class="

                                t-p-acf-t2-ct-feature-title__text         
                                t-p-acf-t2-ct-feature-title__title-size-medium        
                                " data-feature-title-postfix-style-colour="#f21364" style="  ">
                                    
                                    <h2>Welcome back<div class="htagel" style="background-color: rgb(242, 19, 100);"></div></h2>

                                </div>
                                
                                    <span class="t-p-acf-t2-ct-feature-title__feature-title-post-text">Please login so you can continue</span>

                            </div>

                        </div>

                        <?php 
                        
                        wp_custom_login_form(); 

                        ?>

                    </div>

                </div>

            </div>

        </div>

        <?php

        /**
         * ---------------------
         * 
         * :: /Scaffolding : Row
         * 
         * =====================
         */

        ?>		            

    </div>

    <?php

    /**
     * ---------------------------
     * 
     * :: /Scaffolding : Container
     * 
     * ===========================
     */

    ?>		    

</section>

<?php

/**
 * -----------
 * 
 * /:: Section
 * 
 * ===========
 */

?>		