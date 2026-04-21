<?php
/**
 * Navigation : Footer
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<?php if ( has_nav_menu( 'nav_footer' ) ) : ?>

<nav id="template-partial-footer__navigation-footer" class="template-partial-footer__nav" aria-label="<?php esc_attr_e( 'Navigation : Footer', 'sophi' ); ?>">
:: footer nav
    <?php

        wp_nav_menu(

        array(

            'theme_location'  => 'nav_footer',

            'menu_class'      => 'template-partial-footer__nav-list',

            // 'container_class' => 'template-partial-footer__navigation-footer-container',

            'items_wrap'      => '<ul id="template-partial-footer__nav-list" class="%2$s">%3$s</ul>',

            'fallback_cb'     => false,

        )

    );
    
    ?>

</nav>

<?php endif; ?>

