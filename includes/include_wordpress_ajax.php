<?php
/**
 * 
 * :: AJAX for modal window content
 * 
 * :: Resource : https://medium.com/@alejandro-ao/how-to-do-ajax-in-wordpress-a826f9fde4d5
 * 
 */

 function my_function(){

	// :: POST request allowed?
    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'scripts_nonce' ) )
    
		die('Permission denied');

	// Default response
	$response = [

		'status'  => 500,

		'message' => 'Something is wrong, please try again later ...',

		'content' => false,

		'found'   => 0

	];    

    // :: POST request parameters
	$all = false;

	$postId  = intval($_POST['params']['post_ID']);

	// :: Get post name for 'CPT Modal : Settings'
	$current_page = get_post($postId); 

	$current_page_slug = $current_page->post_name;

	// :: Setup query args
	$args = [

		'p' => $postId,
		// 'p' => '8616',

		'post_type' => 'any'

	];    

    // :: Instantiate new WP Query
    $qry = new WP_Query($args);

    // :: Instantiate new PHP object
	ob_start(); 

        if ($qry->have_posts()) :

            while ($qry->have_posts()) : $qry->the_post();

			// :: Page Builder
			// ---------------
			get_template_part( 'template_partials_acf_types/t_p_acf_t1_flexable_content_types/t_p_acf_t1_fct_page_builder');

            endwhile;

        endif;

		// :: Add include for 'CPT Modal : Settings'
		if($current_page_slug === 'cpt-modal-settings'){

			// :: Get template part settings
			// -----------------------------
			get_template_part( 'template-partials/t-p-settings');

		};

		if($current_page_slug === 'login'){    
    
			get_template_part( 'template-partials/t-p-login-form' ); 
		
		}

		// Set response 
		$response = [

			'status'  => 200,
	
			'found'   => $qry->found_posts,
	
		];

    $response['content'] = ob_get_clean();

	wp_reset_postdata();

    die(json_encode($response));
    
}

 add_action('wp_ajax_my_action', 'my_function');

 add_action('wp_ajax_nopriv_my_action', 'my_function');