<?php
/**
 * 
 * :: AJAX for modal window content
 * 
 * :: Resource : https://medium.com/@alejandro-ao/how-to-do-ajax-in-wordpress-a826f9fde4d5
 * 
 */

 add_action('wp_ajax_my_action', 'my_function');

 add_action('wp_ajax_nopriv_my_action', 'my_function');

 function my_function() {

	// header('Content-Type: application/json; charset=utf-8'); // <--https://stackoverflow.com/questions/71477855/ajax-error-function-invoked-instead-of-success

    //  $data = $_POST['data'];

    //  wp_send_json_success($data);

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
	$all     = false;

	// $postId  = intval($_POST['params']['post_ID']);

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

		// my_print_r($args);
		// my_print_r($current_page_slug);

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
    

			// my_print_r('test');
		
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

function duplicate() {
    // Uncomment this line if you use nonce for security
    // check_ajax_referer('scripts_nonce', 'nonce'); // Ensure nonce is validated

	if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'scripts_nonce' ) )
    
	die('Permission denied');

    $post_id = intval($_POST['post_id']); // Sanitize post_id
    // error_log("Post ID received: $post_id");

    if (!$post_id) {
        // error_log("Invalid post ID");
        wp_send_json_error(array(
            'error' => 'invalid_post_id',
            'details' => 'The provided post ID is invalid.',
            'post_id' => $post_id
        ));
        return;
    }

	$f__cost_of_credits_per_form = get_field('f__cost_of_credits_per_form', $post_id);

    $user_id = get_current_user_id();
    $balance = mycred_get_users_balance($user_id);
    $current_user = wp_get_current_user();
	$user_email = $current_user->user_email;
    $user_docusign_active__status = is_user_activated_in_docusign($user_email);
    $user__docusign_consent_given = get_user_meta($user_id, 'user__docusign_consent_given', true);
    $upload_dir = wp_upload_dir();
    $directory_path_count = $upload_dir['basedir'] . '/shizl_users/' . $current_user->ID . '__' . $current_user->first_name . '_' . $current_user->last_name;
    $pdf_count = count_pdf_files_recursive($directory_path_count);
    $storage = mycred_get_users_balance($user_id, 'mycred_storage');

    // Determine file upload limit based on user role
    $file_upload_limit = 0;
    if (is_a($current_user, 'WP_User') && $current_user->exists()) {
        $user_roles = (array) $current_user->roles;
        if (in_array('subscriber_level_1', $user_roles)) {
            $file_upload_limit = 0;
        } elseif (in_array('subscriber_level_2', $user_roles) || in_array('subscriber_level_3', $user_roles) || in_array('subscriber_level_4', $user_roles)) {
            $file_upload_limit = $storage;
        } elseif (in_array('administrator', $user_roles)) {
            $file_upload_limit = $storage;
        }
    }  

   

	// if (!$user_docusign_active__status) {
    //     wp_send_json_error(array(
    //         'error' => 'docusign_not_activated',
    //         'details' => 'Please activate your DocuSign account.',
    //         'post_id' => $post_id,
    //         'action_needed' => 'activate_docusign'
    //     ));
    //     return;
    // }

    // // If the user hasn't given consent
    // if (empty($user__docusign_consent_given)) {
    //     wp_send_json_error(array(
    //         'error' => 'docusign_consent_missing',
    //         'details' => 'Please provide consent for DocuSign to proceed.',
    //         'post_id' => $post_id,
    //         'action_needed' => 'give_consent'
    //     ));
    //     return;
    // }
	

    if ($pdf_count >= $file_upload_limit) {
        error_log("Storage limit reached for user ID: $user_id");
        wp_send_json_error(array(
            'error' => 'storage_limit_reached',
            'details' => 'Storage limit has been reached.',
            'post_id' => $post_id,
            'pdf_count' => $pdf_count,
            'file_upload_limit' => $file_upload_limit
        ));
        return;
    }

    if ($balance < 1) {
        error_log("Insufficient credits for user ID: $user_id. Balance: $balance");
        wp_send_json_error(array(
            'error' => 'insufficient_credits',
            'details' => 'Not enough credits to perform this action.',
            'balance' => $balance
        ));
        return;
    }

	if ($balance < $f__cost_of_credits_per_form ) {
        error_log("Insufficient credits for user ID: $user_id. Balance: $balance");
        wp_send_json_error(array(
            'error' => 'insufficient_credits',
            'details' => 'Not enough credits to perform this action.',
            'balance' => $balance
        ));
        return;
    }

    if ($balance > 1 && $pdf_count <= $file_upload_limit && $balance >= $f__cost_of_credits_per_form) {
        $oldpost = get_post($post_id);
        if (!$oldpost) {
            error_log("Invalid post ID for duplication: $post_id");
            wp_send_json_error(array(
                'error' => 'invalid_post',
                'details' => 'The original post does not exist.',
                'post_id' => $post_id
            ));
            return;
        }

        $post = array(
            'post_title' => $oldpost->post_title,
            'post_name' => get_current_user_id() . '-' . $oldpost->post_title,
            'post_status' => 'draft',
            'post_type' => 'template_documents',
        );

        $new_post_id = wp_insert_post($post);
        if (is_wp_error($new_post_id)) {
            error_log("Post creation failed: " . $new_post_id->get_error_message());
            wp_send_json_error(array(
                'error' => 'post_creation_failed',
                'details' => 'Failed to create the new post.',
                'post_id' => $post_id,
                'error_message' => $new_post_id->get_error_message()
            ));
            return;
        }

        // Duplicate post meta
        $data = get_post_custom($post_id);
        if ($data) {
            foreach ($data as $key => $values) {
                foreach ($values as $value) {
                    add_post_meta($new_post_id, $key, maybe_unserialize($value));
                }
            }
        }

        // Duplicate taxonomies
        $taxonomies = get_post_taxonomies($post_id);
        if ($taxonomies) {
            foreach ($taxonomies as $taxonomy) {
                $terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'ids'));
                if (!empty($terms) && !is_wp_error($terms)) {
                    wp_set_object_terms($new_post_id, $terms, $taxonomy);
                }
            }
        }

        // Add custom meta
        add_post_meta($new_post_id, 'am_i_a_clone', 'I am a clone');
        add_post_meta($new_post_id, 'orginal_post_title', get_the_title($post_id));

        // Return success response
        wp_send_json_success(array(
            'redirect_url' => get_permalink($new_post_id),
            'new_post_id' => $new_post_id,
            'post_id' => $post_id,
			'number_of_credits_cost' => $f__cost_of_credits_per_form
        ));
        return;
    }

    error_log("Unknown error occurred for post ID: $post_id");
    wp_send_json_error(array(
        'error' => 'unknown_error',
        'details' => 'An unknown error occurred.',
        'post_id' => $post_id,
		'number_of_credits_cost' => $f__cost_of_credits_per_form
    ));
}

add_action('wp_ajax_duplicate_post', 'duplicate');
add_action('wp_ajax_nopriv_duplicate_post', 'duplicate');


