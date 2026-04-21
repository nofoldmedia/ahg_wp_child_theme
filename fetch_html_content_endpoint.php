<?php
// // Include WordPress core functionalities
// define('WP_USE_THEMES', false);
// require_once('../../../wp-load.php'); // Adjust the path according to your file structure

// // Check if a post ID is provided in the query string
// if (isset($_GET['post_id'])) {
//     $post_id = intval($_GET['post_id']); // Sanitize the post ID

//     // Retrieve the HTML content of the post
//     $html_content = get_the_content(null, false, $post_id);

//     // Return the HTML content as JSON response
//     header('Content-Type: application/json');
//     echo json_encode($html_content);
// } else {
//     // If no post ID is provided, return an error response
//     http_response_code(400); // Bad request
//     echo json_encode(array('error' => 'No post ID provided.'));
// }
?>