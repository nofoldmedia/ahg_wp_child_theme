<?php
/**
 * The header.
 *
 */
?>
<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<?php
	// Header
	// ------
	?>		
	<header class="t-p-header" style="">

	

		<?php
		// Scaffolding : Container
		// -----------------------
		?>	
		<div class="scaffolding-container">

			<?php
			// Scaffolding : Row
			// -----------------
			?>		
			<div class="scaffolding-row">
			<div class="scaffolding-columns">
			<div class="tp-sp-section-column tp-sp-section-column__header tp-sp-section-column__100">

				<?php
				// Skip Link
				// ---------
				?>	
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>
				<?php
				// /Skip Link
				// ==========
				?>	

				<?php
				// Template partial header : Group
				// -------------------------------
				?>	

				<div class="template-partial-header__group t-p-header__group">

					<?php
					// Header : Branding
					// -----------------
					?>	
					<?php  get_template_part( 'template-partials/template-partial-header__site-branding' ); ?>
					<?php
					// /Header : Branding
					// ==================
					?>	

					

					<?php
					// Navigation : Primary
					// --------------------
					?>
					<?php  // get_template_part( 'template-partials/template-partial-header__navigation-primary' );  ?>
					<?php  // get_template_part( 'template-partials/template-partial-header__navigation-primary' );  ?>
					<?php get_template_part( 'template-partials/t-p-header__navigation-primary' ); ?> 



					<?php /* get_template_part( 'template-partials/template-partial-header__login' ); */ ?>

				
					<?php
					// /Navigation : Primary
					// =====================
					?>
					
				</div>
				</div>
				</div>
				<?php
				// /Template partial header : Group
				// ================================
				?>					

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



	</header>
	<?php
	// /Header
	// =======
	?>		

	<?php
	// /Global Locations Modal 
	// ================================
	?>					

	<?php
	// /Global Locations Modal END
	// ================================
	?>	

			
				