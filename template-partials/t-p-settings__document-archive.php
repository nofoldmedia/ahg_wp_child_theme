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

<div class="<?= $var__helper_class_name ?>__data-sub-group">

    <a class="<?= $var__helper_class_name ?>__data-sub-group-link" href="/documents-view-logged-in">
    
        <img class="<?= $var__helper_class_name ?>__document-archive-icon" src="<?= do_shortcode('[template_dir image="icon-folder--white.svg"]') ?>" alt=""> 

    </a>
        
    <p class="<?= $var__helper_class_name ?>__label <?= $var__helper_class_name ?>__label--account-storage-link">
        
        <a class="<?= $var__helper_class_name ?>__data-sub-group-link <?= $var__helper_class_name ?>__data-sub-group-link--your-storage" href="/documents-view-logged-in">        

            <strong>Your shizl storage</strong>
        
        </a>

    </p>
    
</div>


