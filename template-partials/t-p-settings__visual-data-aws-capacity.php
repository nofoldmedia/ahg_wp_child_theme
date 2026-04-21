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

$current_user = wp_get_current_user();

$user_id = get_current_user_id();

$upload_dir = wp_upload_dir();

$directory_path_count = $upload_dir['basedir'] . '/shizl_users/' . $current_user->ID . '__' . $current_user->first_name . '_' . $current_user->last_name;

$pdf_count = count_pdf_files_recursive($directory_path_count);

$storage = mycred_get_users_balance( $user_id, 'mycred_storage' );

$file_upload_limit = null;


if (is_a($current_user, 'WP_User') && $current_user->exists()) {
    $user_roles = (array) $current_user->roles;

    if (in_array('subscriber_level_1', $user_roles)) {

        $file_upload_limit = 0;

    } elseif (in_array('subscriber_level_2', $user_roles)) {

        $file_upload_limit = $storage;

    } elseif (in_array('subscriber_level_3', $user_roles)) {

        $file_upload_limit = $storage;

    } elseif (in_array('subscriber_level_4', $user_roles)) {

        $file_upload_limit = $storage;

    } elseif (in_array('administrator', $user_roles)) {

        $file_upload_limit = 1000;
    }
}

// my_print_r($file_upload_limit);
// my_print_r($pdf_count);

if ($file_upload_limit !== INF && $file_upload_limit !== null && $file_upload_limit > 0) {

    $percentage_remaining = ($pdf_count / $file_upload_limit) * 100;

    $percentage_remaining = max(0, min(100, $percentage_remaining));

    $percentage_remaining = round($percentage_remaining); 

    $percentage_remaining .= '%';

} else {

    $percentage_remaining = -1;

}

// :: Helper class name

$var__helper_class_name   = 't-p-settings';

$var_buy_storage_url = '/shizl-buy-storage/';

$domain = $_SERVER['HTTP_HOST'];

$storage_url = $domain . $var_buy_storage_url;

// echo $credits_url;


?>

<?php if ($percentage_remaining > 0) : ?> 

<div class="<?= $var__helper_class_name ?>__data-sub-group">

    <div class="<?= $var__helper_class_name ?>__visual-data-presentation">

        <div class="<?= $var__helper_class_name; ?>__visual-data-aws-capacity">

            <div class="single-chart">

            <?php if ($percentage_remaining < 0) : ?> 

            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-infinity unlimited-docs" viewBox="0 0 16 16">

                <path d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z"/>

            </svg>


            <?php endif; ?> 

            


            <svg viewBox="0 0 36 36" class="circular-chart orange">

                <path class="circle-bg" d="M18 2.0845
                    a 15.9155 15.9155 0 0 1 0 31.831
                    a 15.9155 15.9155 0 0 1 0 -31.831"></path>

                <path class="circle animate" d="M18 2.0845
                    a 15.9155 15.9155 0 0 1 0 31.831
                    a 15.9155 15.9155 0 0 1 0 -31.831" stroke-dasharray="20, 100"></path>

                <!-- <text x="18" y="20.35" class="percentage fade-in-percentage">97%</text> -->

            </svg>

            </div>

            

        </div>

        <strong class="<?= $var__helper_class_name ?>__visual-data-presentation-label"><?= $percentage_remaining ?></strong>

    </div>

    <p class="<?= $var__helper_class_name ?>__label">Storage use<strong><br/><a href="<?= home_url($var_buy_storage_url) ?>">Add storage</a></strong></p>

</div>

<?php endif; ?> 