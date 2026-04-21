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

$g__contact_details = get_field('g__contact_details');



$f__address_line_1 = $g__contact_details['f__address_line_1'];

$f__main_telephone = $g__contact_details['f__main_telephone'];

$f__global_email = $g__contact_details['f__global_email'];


// my_print_r($f__address_line_1);



?>

<div class="<?= $var_helper_class ?>__list-group">
          :: list      
    <h3 class="<?= $var_helper_class ?>__list-title"><strong>Lorem ipsum</strong></h3>

    <ul>
        
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
        <li class="<?= $var_helper_class ?>__list-item">Lorem ipsum</li>
    
    </ul>

</div>

