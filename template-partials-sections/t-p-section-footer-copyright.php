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

$g__copyright_sub_footer = get_field('g__copyright_sub_footer');

$f__copyright_text = $g__copyright_sub_footer['f__copyright_text'];

?>

<div class="<?= $var_helper_class ?>__copyright">
<!-- :: copyright -->
    <?php echo $f__copyright_text  ?>

</div>



