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

// :: Helper class name

$var__helper_class_name   = 't-p-settings';

?>
<?php

$current_user = wp_get_current_user(); 

// echo $current_user->user_email; 

?>
<!-- <span class="<?= $var__helper_class_name ?>__user-email"><?= $current_user->user_email ?></span> -->

<!-- <div class="<?= $var__helper_class_name ?>__icon-label-presentation"> -->

<div class="<?= $var__helper_class_name ?>__data-sub-group">

    <a class="<?= $var__helper_class_name ?>__data-sub-group-link" href="/documents-view-logged-in">


        <!-- <img class="<?= $var__helper_class_name ?>__account_icons" src="<?= do_shortcode('[template_dir image="icon-material-account-circle--white.svg"]') ?>" alt="">  -->

        <img class="<?= $var__helper_class_name ?>__account_icons" src="<?= do_shortcode('[template_dir image="icon-cog--white.svg"]') ?>" alt=""> 
        
    </a>
        
    <a class="<?= $var__helper_class_name ?>__data-sub-group-link" href="/documents-view-logged-in">        
        
        <p class="<?= $var__helper_class_name ?>__label <?= $var__helper_class_name ?>__label--account-settings-link"><a href="<?= get_site_url() ?>/shizl-subscription-plan-membership-account/"><strong>Account settings</strong></a></p>

    </a>
    
</div>

