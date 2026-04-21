<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php

// :: Helper class name

$var__helper_class_name   = 't-p-header';

?>


<?php
/**
 * ----------------
 * 
 * :: Site branding
 * 
 * ----------------
 */
?>

	<?php
	/**
	 * -----------------------
	 * 
	 * :: Site branding : Logo
	 * 
	 * -----------------------
	 */
	?>

	<?php $show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) ); ?>

	<?php if ( has_custom_logo() && $show_title ) : ?>
		
		<?php the_custom_logo(); ?>

	<?php endif; ?>	

	<?php if ( has_custom_logo() && ! $show_title ) : ?>

			<?php the_custom_logo(); ?>
		
	<?php endif; ?>

	<?php
	/**
	 * ------------------------
	 * 
	 * /:: Site branding : Logo
	 * 
	 * ========================
	 */
	?>
		
	<?php
	/**
	 * ----------------------------
	 * 
	 * :: Site branding : Blog info
	 * 
	 * ----------------------------
	 */
	?>
	
	<?php $blog_info    = get_bloginfo( 'name' ); ?>

	<?php if ( $blog_info ) : ?>

			<h1 class="<?php echo esc_attr( $var__helper_class_name . '__blog-info' ); ?>"><?php echo esc_html( $blog_info ); ?></h1>

	<?php endif; ?>

	<?php
	/**
	 * -----------------------------
	 * 
	 * /:: Site branding : Blog info
	 * 
	 * =============================
	 */
	?>	

	<?php
	/**
	 * ------------------------------
	 * 
	 * :: Site branding : Description
	 * 
	 * ------------------------------
	 */
	?>		

	<?php $description  = get_bloginfo( 'description', 'display' ); ?>

	<?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
	
		<p class="<?= $var__helper_class_name ?>-description">
	
			<?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		
		</p>

	<?php endif; ?>

	<?php
	/**
	 * -------------------------------
	 * 
	 * /:: Site branding : Description
	 * 
	 * ===============================
	 */
	?>

<?php
/**
 * -----------------
 * 
 * /:: Site branding
 * 
 * =================
 */
?>
