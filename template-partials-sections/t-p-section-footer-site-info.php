<?php
/**
 * Navigation : Footer
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<div class="template-partial-footer__site-info" style="margin-top: auto;">

    <div class="template-partial-footer__site-info-name">

        <?php if ( has_custom_logo() ) : ?>

            <div class="site-logo"><?php the_custom_logo(); ?></div>

        <?php else : ?>

            <?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>

                <?php if ( is_front_page() && ! is_paged() ) : ?>

                    <?php bloginfo( 'name' ); ?>

                <?php else : ?>

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

                <?php endif; ?>

            <?php endif; ?>

        <?php endif; ?>
        
    </div>

</div>