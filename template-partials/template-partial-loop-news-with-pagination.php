<?php

// :: Helper 

$l__var__helper_layout_class_name = 'template-partial-loop-news-with-pagination';

?>

<div class="<?= $l__var__helper_layout_class_name ?>">
    
    <div class="scaffolding-container">
            
            <?php echo do_shortcode('[ajax_filter_posts_mt_posts]') ?>

        
    </div>    

</div>