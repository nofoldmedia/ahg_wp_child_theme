<?php
/**
 * Navigation : Footer
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<?php

$var_helper_class = '';

$var_helper_class = 'template-partial-footer';


$g__contact_details = get_field('g__display_social_media_links');


$f__display_custom_title = $g__contact_details['f__display_custom_title'];

$f__title_text = 'Follow us';

if ($f__display_custom_title != '') {

    $f__title_text = $g__contact_details['f__title_text'];

}


$r__f__social_media_links = $g__contact_details['r__f__social_media_links'];

// my_print_r($g__contact_details);


?>

<div class="<?= $var_helper_class ?>__social-links" style="margin-top: auto;">
:: Social links
<p class="<?= $var_helper_class ?>__social-links-title" style=""><strong><?= $f__title_text ?></strong></p>

<ul class="<?= $var_helper_class ?>__social-links-list">
<?php 
    // Check if $r__f__social_media_links is an array and not empty
    if (is_array($r__f__social_media_links) && !empty($r__f__social_media_links)) :

        foreach ($r__f__social_media_links as $social_link) :
            // Get subfields within each repeater row
            $social_link_type = $social_link['acf_fc_layout'];
            $social_link_url = $social_link['f__url'];
            $social_link_custom_text = $social_link['f__display_custom_text'];


            if ($social_link_type == 'f__social_link_facebook') {

                $social_link_icon = get_theme_file_path('img/icon-awesome-facebook-f.svg');

            } elseif ($social_link_type == 'f__social_link_linkedin') {

                $social_link_icon = get_theme_file_path('img/icon-awesome-linkedin-in.svg');

            } elseif ($social_link_type == 'f__social_link__youtube') {

                $social_link_icon = get_theme_file_path('img/icon-ionic-logo-youtube.svg');
           
            } elseif ($social_link_type == 'f__social_link__instagram') {

                $social_link_icon = get_theme_file_path('img/icon-ionic-logo-instagram.svg');
            }


            if (file_exists($social_link_icon)) {

                $svg_content = file_get_contents($social_link_icon);

                $dump = '<span class="social-icon">' . $svg_content . '</span>';

            } else {

                $dump = '';
            }
          
            ?>

            <li class="social-media-link">
                <a href="<?= esc_url($social_link_url) ?>" target="_blank"><?= $dump ?>
                <?php if (!empty($social_link_custom_text)) : ?>
                    <span class="custom-text"><?= esc_html($social_link_custom_text) ?></span>
                <?php endif; ?>
                </a>
            </li>

            <?php
        endforeach;
    else :
        // No rows found
        echo '';
    endif;
    ?>



</ul>
</div>

