<?php
/**
 * Navigation : Footer - Branding *
 */
?>

<?php

$var_helper_class = '';

$var_helper_class = 'template-partial-footer';

// :: Footer logo

$g__footer_logo = get_field('g__footer_logo');

?>

<div class="<?= $var_helper_class ?>-branding">
<!-- :: Branding -->
    <img src="<?= $g__footer_logo['f__footer_logo_image']['url'] ?>" width="80" alt="">

</div>