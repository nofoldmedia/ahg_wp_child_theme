<?php
/**
 * Displays header site Credits & Login
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 * 
 */
?>

<?php

$var_buy_credits_url = '/shizl-buy-credits/';

$domain = $_SERVER['HTTP_HOST'];

$credits_url = $domain . $var_buy_credits_url;

// :: Helper class name

$var__helper_class_name   = 't-p-settings';

?>

<div class="<?= $var__helper_class_name ?>__data-sub-group">

    <div class="<?= $var__helper_class_name ?>__visual-data-presentation">

        <img class="<?= $var__helper_class_name ?>__credits_img" src="<?= do_shortcode('[template_dir image="icon-awesome-coins--white.svg"]') ?>" alt="">

        <strong class="<?= $var__helper_class_name ?>__visual-data-presentation-label"><?= do_shortcode('[mycred_my_balance]'); ?></strong>
        
    </div>

    <p class="<?= $var__helper_class_name ?>__label">Credits remaining this month<strong><br/><a href="<?= home_url($var_buy_credits_url) ?>">Add credits</a></strong></p>

</div>

