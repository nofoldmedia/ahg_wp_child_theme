<footer id="colophon" class="template-partial-footer">

	<?php
	// Scaffolding : Container
	// -----------------------
	?>	
	<div class="scaffolding-container" style="">

		<?php
		// Scaffolding : Row
		// -----------------
		?>		
		<div class="scaffolding-row">	

            <div class="scaffolding-columns">

                <div class="tp-sp-section-column tp-sp-section-column__100 tp-sp-section-column--hero">
   

<?php

/**
 * 
 * :: CPT global elements : Footer baby!
 * 
 */
$args = [

    'p' => '22397', 		// <- Footer baby! page ID
    'post_type' => 'any'

];  

// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {

		$the_query->the_post();

        // ** Start all the goodness

        ?>
        



















        			<?php

			/**
			 * ---------------
			 * 
			 * :: Footer group
			 * 
			 * ---------------
			 */

			?>
			<div class="template-partial-footer-group">

				<!-- :: Footer -->


					<?php

					/**
					 * -----------------------------
					 * 
					 * :: Footer : Header - Branding
					 * 
					 * -----------------------------
					 */

					?>

					<?php get_template_part( 'template-partials-sections/t-p-section-footer-branding' ); ?>

					<?php

					/**
					 * ------------------------------
					 * 
					 * /:: Footer : Header - Branding
					 * 
					 * ==============================
					 */

					?>    

					<?php

					/**
					 * ----------------
					 * 
					 * :: Footer : Body
					 * 
					 * ----------------
					 */

					?>

					<div class="template-partial-footer__body" style="display: none;">

						<?php

						/**
						 * ------------------------
						 * 
						 * :: Footer : Body - Lorem
						 * 
						 * ------------------------
						 */

						?>

						<?php get_template_part( 'template-partials-sections/t-p-section-footer-list' ); ?>

						<?php

						/**
						 * ------------------------
						 * 
						 * :: Footer : Body - Lorem
						 * 
						 * ========================
						 */

						?>        

						<?php

						/**
						 * --------------------------
						 * 
						 * :: Footer : Body - Contact
						 * 
						 * --------------------------
						 */

						?>

						<?php get_template_part( 'template-partials-sections/t-p-section-footer-contact' ); ?>

						

						<?php

						/**
						 * ---------------------------
						 * 
						 * /:: Footer : Body - Contact
						 * 
						 * ===========================
						 */

						?>

						<?php

						/**
						 * ----------------------------
						 * 
						 * :: Footer : Body - Follow us
						 * 
						 * ----------------------------
						 */

						?>

						<?php get_template_part( 'template-partials-sections/t-p-section-footer-social-links' ); ?>

						<?php

						/**
						 * ----------------------------
						 * 
						 * :: Footer : Body - Follow us
						 * 
						 * ============================
						 */

						?>

					</div>

					<?php

					/**
					 * ----------------
					 * 
					 * :: Footer : Body
					 * 
					 * ================
					 */

					?>

					<?php

					/**
					 * ------------------
					 * 
					 * :: Footer : Footer
					 * 
					 * ------------------
					 */

					?>

					<!-- <div style="
					background-color: lightyellow;
					display:flex;
					flex:1;
					"> -->

					<div class="template-partial-footer__footer">

						<?php

						/**
						 * ---------------------
						 * 
						 * :: Footer : Copyright
						 * 
						 * ---------------------
						 */

						?>

						<?php get_template_part( 'template-partials-sections/t-p-section-footer-copyright' ); ?>

						<?php

						/**
						 * ----------------------
						 * 
						 * /:: Footer : Copyright
						 * 
						 * ======================
						 */

						?>

						<?php

						/**
						 * ---------------
						 * 
						 * :: Footer : Nav
						 * 
						 * ---------------
						 */

						?>

						<?php get_template_part( 'template-partials-sections/t-p-section-footer__nav' ); ?>

						<?php

						/**
						 * ---------------
						 * 
						 * :: Footer : Nav
						 * 
						 * ---------------
						 */

						?>

					</div>
					
					<?php

					/**
					 * -------------------
					 * 
					 * /:: Footer : Footer
					 * 
					 * ===================
					 */

					?>

			<?php
			// /Footer Group
			// =============
			?>	
			</div>






























<?php

	}

} else {
    
	esc_html_e( 'Sorry, no posts matched your criteria.' );

}


?>


                </div><!-- /.column 100 -->

            </div><!-- /.columns -->

		</div>
		<?php
		// /Scaffolding : Row
		// ==================
		?>

	</div>
	<?php
	// /Scaffolding : Container
	// ========================
	?>		







	<?php // get_template_part( 'template-partials-sections/t-p-section-footer-navigation-icon-sub-footer' ); ?>


	<?php // get_template_part( 'template-partials-sections/t-p-section-footer-navigation-copyright-sub-footer' ); ?>


	
	
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
// Scaffolding : Container
// -----------------------
?>	



<?php wp_footer(); ?>

</body>
</html>




<!-- // Restore original Post Data.
wp_reset_postdata(); -->

