<?php

$var__helper_class_name = '';

$var__helper_class_name   = 't-p-settings';

?>


<?php
// Header
// ------
?>		
<section class="<?= $var__helper_class_name ?>">


    <?php
    // Scaffolding : Container
    // -----------------------
    ?>	
    <div class="scaffolding-container">

        <?php
        // Scaffolding : Row
        // -----------------
        ?>		
        

            <?php

            /**
             * ------------------------------
             * 
             * :: Settings : Document archive
             * 
             * ------------------------------
             */

            ?>

            <div class="<?= $var__helper_class_name ?>__group--docs">    

                <?php get_template_part( 'template-partials/' . $var__helper_class_name . '__document-archive' ); ?> 

            </div>

            <?php

            /**
             * -------------------------------
             * 
             * /:: Settings : Document archive
             * 
             * ===============================
             */

            ?>    

           
            <?php

            /**
             * --------------------------------
             * 
             * :: Settings : Group - Your plans
             * 
             * --------------------------------
             */

            ?>

            <div class="<?= $var__helper_class_name ?>__group">     


                <strong class="<?= $var__helper_class_name ?>__group-title">Your plans</strong>

                <?php

                /**
                 * -----------------------------------
                 * 
                 * :: Settings : Visual data - Credits
                 * 
                 * -----------------------------------
                 */
                
                ?>

                <?php get_template_part( 'template-partials/' . $var__helper_class_name . '__visual-data-credits' ); ?> 
                
                <?php
                /**
                 * ------------------------------------
                 * 
                 * /:: Settings : Visual data - Credits
                 * 
                 * ====================================
                 */
                ?> 
                
                <?php

                /**
                 * ----------------
                 * 
                 * :: Settings : Visual data - AWS capacity
                 * 
                 * ---------------
                 */
                
                ?>

                <?php get_template_part( 'template-partials/' . $var__helper_class_name . '__visual-data-aws-capacity' ); ?> 

                <?php
                
                /**
                 * ----------------
                 * 
                 * /:: Settings : Visual data - AWS capacity
                 * 
                 * ================
                 */

                ?>                

            </div>

            <?php

            /**
             * ---------------------------------
             * 
             * /:: Settings : Group - Your plans
             * 
             * =================================
             */

            ?>

            <?php

            /**
             * ----------------------------------
             * 
             * :: Settings : Group - Your account
             * 
             * ----------------------------------
             */

            ?>

            <div class="<?= $var__helper_class_name ?>__group">     

                <!-- <strong  class="<?= $var__helper_class_name ?>__group-title">Your account</strong> -->

                <?php

                /**
                 * -----------------------------
                 * 
                 * :: Settings : Account details
                 * 
                 * -----------------------------
                 */
                
                ?>

                <?php get_template_part( 'template-partials/' . $var__helper_class_name . '__account-details' ); ?> 
                
                <?php
                /**
                 * ------------------------------
                 * 
                 * /:: Settings : Account details
                 * 
                 * ==============================
                 */
                ?>

            </div>

            <?php

            /**
             * -----------------------------------
             * 
             * /:: Settings : Group - Your account
             * 
             * ===================================
             */

            ?>        

             


 
<div class="t-p-acf-t2-ct-button-group">

<a class="

t-p-acf-t2-ct-button-group__button 

t-p-acf-t2-ct-button-group__button-standard 

" style="border: 1px solid #fff; color: rgb(255, 255, 255); justify-content: space-between; transition: background 0.5s ease 0s;" href="/logout-confirmation/" data-button-background-color="transparent" data-button-hover-color="#03a689" data-modal-link-post-id="2295"><span class="t-p-acf-t2-ct-button-group__button-label">Sign out</span><span class="t-p-acf-t2-ct-button-group__button-icon"><img src="/wp-content/themes/child_theme_shizl/build/images/icon-ios-arrow-right--white.svg"></span></a>
</div>

        <!-- </div> -->

        <?php
        // /Scaffolding : Row
        // ==================
        ?>

    </div>

    <?php
    // /Scaffolding : Container
    // ========================
    ?>	

</section>
<?php
// /Header
// =======
?>		
