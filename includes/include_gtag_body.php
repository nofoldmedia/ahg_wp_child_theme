<?php

add_action('wp_body_open', 'tutsplus_add_script_wp_body');

function tutsplus_add_script_wp_body() {

    ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M24ZMFP5"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

    <?php

}
