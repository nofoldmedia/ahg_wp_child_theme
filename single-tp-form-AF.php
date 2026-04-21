<?php
/*
* Template Name: Template Form Advanced Forms TEST
* Template Post Type: template_documents
*/
?>
<?php
use Dompdf\Dompdf;
use Dompdf\Options;
if (isset($_POST['generate_pdf_client_side'])) {
        require 'dompdf/autoload.inc.php';  // Adjust the path accordingly   
        function generatePDF($htmlContent, $filename = 'output.pdf') {
    
            $post_id = get_the_ID();  // Get the current post ID
            $post_title = get_the_title($post_id);

            
            // $original_post_title = get_post_meta($post_id, 'original_post_title', true);

            // if (!empty($original_post_title)) {
            //     // $original_post_title is an array, you can access its value like this
            //     $first_post_title = $original_post_title;
            //  // This should print 'Anti Bribery Policy'
            // }

            $pdf_header = get_field('pdf_header');
            $pdf_header_required = get_field('f__produced_document_header');
            $pdf_name  = get_field('input_company_name');

            if ($pdf_header_required === true ) {
            $pdf_final = $pdf_name . ' , ' . $pdf_header;
            } else {
            $pdf_final = '';
            }

            // $current_user = wp_get_current_user();

            $date_first = get_field('date_first');
            $pdf_footer = get_field('pdf_footer');
            $pdf_footer_required = get_field('f__produced_document_footer');
            
            if ($pdf_footer_required === true ) {
            $pdf_footer_final = $pdf_name . ' , ' .$pdf_footer . ' , ' . $date_first;
            } else {
            $pdf_footer_final = '';
            }

            $htmlContent .="<style> 
            
            table {
                border: 1px solid black;
                border-collapse: collapse;
                width: 100%;
              }
              th {
                background-color: #000;
                color: #ffffff;
              }
              td, th {
                 border: 1px solid black;
                 padding: 0.5rem;
                 width: 50%;
                 h1,
                 h2,
                 h3,
                 h4,
                 h5,
                 p:last-child{
                    margin-bottom: 0 !important;
                 }

                 .signedByCustomer {
                    color: #ffffff !important;
                  }
            
                  .nameOfCustomer {
                    color: #ffffff !important;
                  }
            
                  .dateOfCustomer {
                    color: #ffffff !important;
                  }
              }

           
              .ordered-list-acf {
                list-style: decimal;
            
                .ordered-list-item-acf {
                    margin-left: 1.2rem;
                }
            }
            
            .capitalise {
                text-transform: uppercase;
           
            }
            
             .float-center {
      
                position: absolute;
                top: 0;
                left: 0;
                display: table;
                width: 100%;
                height: 100%;
       
            
                .float-table {
                    position: absolute;
                    transform: translateY(30%);
                    margin-top: auto;
                    margin-bottom: auto;
                   
            

                    .invisible-table {
                        text-align: center;
                        display: block;
                        margin: auto;
                     }
            
                     
                  }

            
               
            }
            
            .table-of-contents {
                width: 80%;
                margin: auto;
            
            }

              .nested-table {
           

                .nested-row {
                border: solid black 10px;        
                }

                .nested-cell {
                border: none;  
                }
                }

                .signedByCustomer {
                    color: #ffffff !important;
                  }
            
                  .nameOfCustomer {
                    color: #ffffff !important;
                  }
            
                  .dateOfCustomer {
                    color: #ffffff !important;
                  }

                  .absolute-doc {
                    position: absolute;
                    top: 0;
                    left: 0;
                  }
              
              .page-break {
                page-break-after: always;
              }

              .reindex-single {
               font-weight: 700;
              }
               
          .af-tabular-data__headers {
            border-bottom:0 !important
          }
          .af-tabular-data__header {
            background-color:rgba(0,0,0,0) !important;
            color:inherit !important;
            border-bottom:0
          }
          .acf-table {
            display:-webkit-box;
            display:-ms-flexbox;
            display:flex;
            -webkit-box-orient:vertical;
            -webkit-box-direction:normal;
            -ms-flex-direction:column;
            flex-direction:column
          }
          .af-tabular-data__entries {
            border-top:0 !important;
            border-bottom:0 !important;
            margin-top:-1px
          }
          .af-tabular-data__entries--last-child {
            border-bottom:3px solid #777 !important
          }
          .af-tabular-data__no-borders {
            border:0
          }
          .af-tabular-data__no-borders td {
            border:0
          }
          .af-tabular-data__key-1-shz00008,
          .af-tabular-data__key-2-shz00035 {
            width:33.333%
          }
          .af-tabular-data__key-1-shz00035 {
            width:50%
          }
          .no-highlight {
            background-color:rgba(0,0,0,0) !important
          }
          .indent-paragraph {
            margin-left: 2rem;
          }
                          </style>";



            // $template_name = 'Anti-Bribery Policy';




            // Initialize Dompdf
            $options = new \Dompdf\Options();  // Using fully qualified namespace
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', TRUE);
            $options->set('isPhpEnabled', true);
            $options->setDefaultFont('Helvetica');
            $dompdf = new \Dompdf\Dompdf($options);  // Using fully qualified namespace

            // Load HTML content into Dompdf
            $dompdf->loadHtml($htmlContent);


            // Set paper size and render the PDF
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $canvas = $dompdf->get_canvas();
            // $dompdf->getCanvas()->get_cpdf()->setEncryption('test123', 'test456', ['print']);

            $footer = $canvas->open_object();
            $w = $canvas->get_width();
            $h = $canvas->get_height();
            $canvas->page_text($w-44,$h-28, "{PAGE_NUM} of {PAGE_COUNT}",
                   $font, 6, array(0,0,0));
            $canvas->page_text(34, 18, $pdf_final,
                   $font, 6, array(0, 0, 0));
            $canvas->page_text($w-560,$h-28, $pdf_footer_final , $font, 6, array(0,0,0));
            
            $canvas->close_object();
            $canvas->add_object($footer,"all");
            // Set the correct Content-Type header
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $filename . '.pdf"');


            $current_user = wp_get_current_user();
            // Get the uploads directory
            $upload_dir = wp_upload_dir();
            $r = rand();

            $user_directory = $upload_dir['basedir'] . '/shizl_users/' . $current_user->ID . '__' . $current_user->first_name . '_' . $current_user->last_name . '/shizl_pdfs/' .  $pdf_header;
    
            
            if (!file_exists($user_directory)) {
                mkdir($user_directory, 0777, true); // Create the directory recursively
            }

            // Update the local file path to the uploads directory
            $localFilePath = $upload_dir['basedir'] .'/shizl_users/'. $current_user->ID .'__'. $current_user->first_name .'_'. $current_user->last_name . '/shizl_pdfs/' .  $pdf_header  . '/' . $filename . '-' . $r . '.pdf';
            

            file_put_contents($localFilePath, $dompdf->output());
            // Output the generated PDF to the browser
            echo $dompdf->output();

    
            exit;  // Terminate script execution
        }

        $post_id = get_the_ID();  // Get the current post ID
        $post_title = get_the_title($post_id);
        // Example usage (modify as needed)
        // $post_title = get_the_title();

        $template_name = 'Template Document';

        // Check if the template name is present in the post title
        if (strpos($post_name, $template_name) !== false) {
            // Remove the template name from the post title
            $post_name = str_replace($template_name, '', $post_name);
        }

        // Trim any extra spaces at the beginning or end of the title
        $post_name = trim($post_name);

        $meta_key = 'input_company_name';

        // Retrieve the calculated header value from post meta
        $meta_data = get_post_meta($postid, $meta_key, true);

        $header = '<div id="header">'. $meta_data .' </div>';

        $filename = $post_title;
        $htmlContent = get_the_content();

        generatePDF($htmlContent, $filename);
    }
?>
<?php

    if (isset($_POST['generate_pdf_docusign'])) {
        // Include Dompdf autoload file
        require 'dompdf/autoload.inc.php';

        function generatePDFForEmail($htmlContent, $filename = 'output.pdf') {
            // Initialize Dompdf
            $options = new \Dompdf\Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new \Dompdf\Dompdf($options);

            $htmlContent .="<style> table {
              border: 3px solid black;
              border-collapse: collapse;
              width: 100%;
            }
            th {
              background-color: #000;
              color: #ffffff;
            }
            td, th {
               border: 1px solid black;
               padding: 0.5rem;
               width: 50%;
               h1,
               h2,
               h3,
               h4,
               h5,
               p:last-child{
                  margin-bottom: 0 !important;
               }

               .signedByCustomer {
                  color: #ffffff !important;
                }
          
                .nameOfCustomer {
                  color: #ffffff !important;
                }
          
                .dateOfCustomer {
                  color: #ffffff !important;
                }
            }

            .borderless-table {
                border: none;
            }

            .borderless-body {
                border: none;
            }

            .borderless-row {
                border-top: 1px solid black;
                border-bottom: 1px solid black;
            }

            .borderless-cell {
                border: none;
            }

            .nested-table {
              border: none;

              .nested-row {
              border: none;        
              }

              .nested-cell {
              border: none;  
              }
              }

              .signedByCustomer {
                  color: #ffffff !important;
                }
          
                .nameOfCustomer {
                  color: #ffffff !important;
                }
          
                .dateOfCustomer {
                  color: #ffffff !important;
                }

            
            .page-break {
              page-break-after: always;
            }
            
            .reindex-single {
                font-weight: 700; 
              }</style>";

            // Load HTML content into Dompdf
            $dompdf->loadHtml($htmlContent);

            // Set paper size and render the PDF
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $current_user = wp_get_current_user();
            $r = rand();
            // Get the uploads directory
            $upload_dir = wp_upload_dir();
    
            // Update the local file path to the uploads directory
            // $localFilePath = $upload_dir['basedir'] . '/' . $filename . '.pdf';
            $localFilePath = $upload_dir['basedir'] .'/shizl_users/'. $current_user->ID .'__'. $current_user->first_name .'_'. $current_user->last_name . '/shizl_pdfs/' . $filename . '-sent_to_docusign-' . $r . '.pdf';

            // Save the generated PDF locally
            // file_put_contents($localFilePath, $dompdf->output());

            // Return the local file path
            return $localFilePath;
        }

        // Example usage (modify as needed)
        $post_title = get_the_title();
        $filename = sanitize_title($post_title); // Sanitize the title for use in a filename
        $htmlContent = get_the_content();

        // Generate PDF and get local file path
        $localFilePathForEmail = generatePDFForEmail($htmlContent, $filename);

        // Now, you can use $localFilePathForEmail for further processing (e.g., showing a modal, sending via email, etc.)
    }



$postid             = get_the_ID();
$var__site_id       = get_current_blog_id();
$post_url = get_permalink($postid);

$acf_form_template_shortcode = get_field('acf_form_template_shortcode');

// my_print_r($acf_form_template_shortcode);



// $acf_field          = get_field('the_employer_is_');
$thepost            = get_post();
$content = get_the_content();
// $post_url = $_SERVER['REQUEST_URI'];
$post_url = $_SERVER['REQUEST_URI'];
$cleaned_url = str_replace('/', '', $post_url);



$post_name          = get_the_title();

$template_name = 'Template Document';

// Check if the template name is present in the post title
if (strpos($post_name, $template_name) !== false) {
    // Remove the template name from the post title
    $post_name = str_replace($template_name, '', $post_name);
}

// Trim any extra spaces at the beginning or end of the title
$post_name = trim($post_name);


$meta_key = 'input_company_name';

// Retrieve the calculated header value from post meta
$meta_data = get_post_meta($postid, $meta_key, true);


$form_completion_options = get_field('acf_form_completion_options');

// my_print_r($form_completion_options);

if (is_array($form_completion_options)) {
    // Check if both "download_document" and any DocuSign option are present
    if (in_array('download_document', $form_completion_options) && 
        (in_array('share_with_docusign', $form_completion_options) || 
         in_array('share_with_docusign_return', $form_completion_options) || 
         in_array('share_with_docusign_sender', $form_completion_options) || 
         in_array('share_with_docusign_witness', $form_completion_options))) {
        
        $form_completion_text = 'Scroll up to download or send your document for signature via DocuSign.';
    
    // Check if only "download_document" is present
    } elseif (in_array('download_document', $form_completion_options)) {
        
        $form_completion_text = 'Scroll up to download your document.';
    
    // Check if only any DocuSign option is present
    } elseif (in_array('share_with_docusign', $form_completion_options) || 
              in_array('share_with_docusign_return', $form_completion_options) || 
              in_array('share_with_docusign_sender', $form_completion_options) || 
              in_array('share_with_docusign_witness', $form_completion_options)) {
        
        $form_completion_text = 'Scroll up to send your document for signature via DocuSign.';
    
    } else {
        $form_completion_text = 'Scroll up to see your options for sharing the document';
    }
} else {
    $form_completion_text = 'Scroll up to see your options for sharing the document';
}

$f__general_overview = get_field('f__general_overview');
$f__what_is_the_document = get_field('f__what_is_the_document');
$f__who_is_the_document_for = get_field('f__who_is_the_document_for');
$f__when_would_you_use_this_document = get_field('f__when_would_you_use_this_document');
$f__cost_of_credits_per_form = get_field('f__cost_of_credits_per_form');

$f__cost_of_credits_per_form = isset($f__cost_of_credits_per_form) ? $f__cost_of_credits_per_form : 1;

if ($f__cost_of_credits_per_form > 1 ) {

    $credits_or_credit = "credits";

} elseif ($f__cost_of_credits_per_form <= 1) {

    $credits_or_credit = "credit";
}

$navigation_options = get_field('field_663259e100bd0');

if (in_array('eye-comment', $navigation_options)) {
    // Add the class for "eye-comment"
    $helper_class_comment = "comment-visible";
} else {
    $helper_class_comment = "comment-not-visible";
}

// Check if "navigation" is in the array
if (in_array('navigation', $navigation_options)) {
 
    $helper_class_auto = "nav-visible";

} else {
    $helper_class_auto = "nav-not-visible";
}



// $signature_x_position = get_field('x_position');
// $signature_y_position = get_field('y_position');
// $signature_page_number = get_field('page_number');



// my_print_r($signature_page_number);
// my_print_r($signature_y_position);
// my_print_r($signature_x_position);

$user_roles = [];


if (is_a($current_user, 'WP_User') && $current_user->exists()) {
        
        
    $user_roles = (array) $current_user->roles;


}


$original_post_title = get_post_meta($postid, 'orginal_post_title', true);
if (!empty($original_post_title)) {
    // $original_post_title is an array, you can access its value like this
    $first_post_title = $original_post_title;
 // This should print 'Anti Bribery Policy'
}

// $all_meta = get_post_meta($postid);
// // $content = get_the_content();

// echo "<pre>";
// print_r($all_meta);
// print_r($first_post_title);
// echo "</pre>";



$submitted_meta_value = get_post_meta( $postid, 'form_submitted', true );

if ($submitted_meta_value === 'yes') {

    // $submit_true = 1;
    $submit_class = "form-submitted";

} else {

    // $submit_true = 0;
    $submit_class = "";

}


$user_id = get_current_user_id();
$balance = mycred_get_users_balance( $user_id );

$storage = mycred_get_users_balance( $user_id, 'mycred_storage' );

// my_print_r($balance);
// my_print_r($user_id);

$upload_dir = wp_upload_dir();

$directory_path_count = $upload_dir['basedir'] . '/shizl_users/' . $current_user->ID . '__' . $current_user->first_name . '_' . $current_user->last_name;

$pdf_count = count_pdf_files_recursive($directory_path_count);

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

        $file_upload_limit = $storage;
    }
}


if ($file_upload_limit !== INF && $file_upload_limit !== null) {

    $percentage_remaining = ($file_upload_limit - $pdf_count) / $file_upload_limit * 100;
   

    $percentage_remaining = max(0, min(100, $percentage_remaining));
   

} else {

    $percentage_remaining = -1;
}

// my_print_r($file_upload_limit);
// my_print_r($pdf_count);

$capacity_helper_class = '';

if ($pdf_count >= $file_upload_limit) {

    $capacity_helper_class = "out-of-storage";

    $dump = '<a id="out-of-storage" class="

    t-p-acf-t2-ct-button-group__button-modal 
    
    t-p-acf-t2-ct-button-group__button 
    
    t-p-acf-t2-ct-button-group__button-standard 
    
    " style="display: none;" href="//localhost:3000/test-post/" data-button-background-color="#1d1d1b" data-button-hover-color="#03a689" data-modal-link-post-id="3329" data-modal-type="change-index">
    
        <span class="t-p-acf-t2-ct-button-group__button-label">
       
            
        </span>
    
    </a>';

    echo $dump;
  }

if ($balance < 1) {

   $capacity_helper_class = "out-of-credits";
   $dump = '<a class="

   t-p-acf-t2-ct-button-group__button-modal 
   
   t-p-acf-t2-ct-button-group__button 
   
   t-p-acf-t2-ct-button-group__button-standard 
   
   " style="display: none;" href="//localhost:3000/test-post/" data-button-background-color="#1d1d1b" data-button-hover-color="#03a689" data-modal-link-post-id="3328" data-modal-type="change-index">
   
       <span class="t-p-acf-t2-ct-button-group__button-label">
      
           
       </span>
   
   </a>';
}


?>
<?php
get_template_part( 'template-partials/t-p-head' );
get_template_part( 'template-partials/t-p-header' );
?>

<?php   if (in_array('subscriber_level_2', $user_roles) || in_array('subscriber_level_3', $user_roles) || in_array('subscriber_level_4', $user_roles) ||  in_array('subscriber_level_1', $user_roles) || in_array('subscriber', $user_roles) || in_array('administrator', $user_roles) ) { ?>

    <div class="af-page-wrap-control-toggle active"></div>

<div class="scaffolding-container" style="margin-top: 76px;">



<div class="document-name <?= $capacity_helper_class ?>">
        
    <div class="single__back-group">

        <div class="t-p-acf-t2-ct-button-group">

            <a class="t-p-acf-t2-ct-button-group__button--standard" style="opacity: 1;" href="/documents-view-logged-in"> 
                    
                <img class="t-p-acf-t2-ct-button-group__button-icon--reverse" src="/wp-content/themes/child_theme_shizl/build/images/icon-ios-arrow-right--black.svg" alt="">

                back

            </a>

        </div>  

    </div>

    <div class="t-p-acf-t2-ct-feature-title">
        
        <div class="t-p-acf-t2-ct-feature-title__text-group">

            <div class="t-p-acf-t2-ct-feature-title__text abstract-typography-wysiwyg-editor__title-size-extra-small-form-title" data-feature-title-postfix-style-colour="" style="  ">

                <h1 class="document-name__title">
                    
                    <?= $post_name ?><?php  if ($submitted_meta_value === '') { ?> <span id="document-rename"></span><?php } ?>
                
                    <svg class="document-name__title-edit-icon" xmlns="http://www.w3.org/2000/svg" width="18.155" height="18.155" viewBox="0 0 18.155 18.155">
                        <path  id="Icon_material-edit" data-name="Icon material-edit" d="M4.5,18.869v3.782H8.282L19.435,11.5,15.654,7.716Zm17.86-10.3a1,1,0,0,0,0-1.422L20,4.791a1,1,0,0,0-1.422,0L16.733,6.637l3.782,3.782Z" transform="translate(-4.5 -4.496)"/>
                    </svg>

                </h1>

            </div>

        </div>                
        
    </div>

    <?php

$f__cost_of_credits_per_form =  get_field('f__cost_of_credits_per_form');

?>

<span class="document-name__credits-cost"><svg xmlns="http://www.w3.org/2000/svg" width="21.708" height="21.708" viewBox="0 0 21.708 21.708"><path id="Icon_awesome-coins" data-name="Icon awesome-coins" d="M0,17.184v1.81c0,1.5,3.646,2.714,8.141,2.714s8.141-1.217,8.141-2.714v-1.81c-1.751,1.234-4.952,1.81-8.141,1.81S1.751,18.418,0,17.184ZM13.568,5.427c4.494,0,8.141-1.217,8.141-2.714S18.062,0,13.568,0,5.427,1.217,5.427,2.714,9.073,5.427,13.568,5.427ZM0,12.737v2.188c0,1.5,3.646,2.714,8.141,2.714s8.141-1.217,8.141-2.714V12.737c-1.751,1.442-4.956,2.188-8.141,2.188S1.751,14.178,0,12.737Zm17.638.466c2.429-.471,4.07-1.344,4.07-2.349V9.044a10.412,10.412,0,0,1-4.07,1.463Zm-9.5-6.419C3.646,6.784,0,8.3,0,10.176s3.646,3.392,8.141,3.392,8.141-1.518,8.141-3.392S12.635,6.784,8.141,6.784Zm9.3,2.387c2.544-.458,4.27-1.357,4.27-2.387V4.973C20.2,6.038,17.617,6.61,14.895,6.746A4.748,4.748,0,0,1,17.439,9.171Z" fill="#000"/></svg> <p><?= $f__cost_of_credits_per_form ?></p></span>                    

            

    
<div class="document-buttons__group">

<form method="post" syle="line-height: 150px;">

    <?php  if (is_array($form_completion_options) && in_array('download_document', $form_completion_options)) {   ?>

        <button class="post_form_button post_form_button--download" type="submit" name="generate_pdf_client_side" >
            
            <span>
            
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                </svg>
        
            </span>
        
        <span style="">Download</span>

        </button>

    <?php } ?>

</form>

<?php /* if (is_array($form_completion_options) && in_array('share_with_docusign', $form_completion_options)) { */ ?>

<?php if (is_array($form_completion_options) && (in_array('share_with_docusign', $form_completion_options) || in_array('share_with_docusign_return', $form_completion_options) || in_array('share_with_docusign_sender', $form_completion_options) || in_array('share_with_docusign_witness', $form_completion_options))) {  ?> 

<button id="openModalBtn" class="post_form_button" type="submit" name="">
    
    <span>
        
        <svg id="Layer_1" class="bi bi-fill-share"  fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            
            <path d="M11,2.5C11,1.12,12.12,0,13.5,0c1.38,0,2.5,1.12,2.5,2.5,0,1.38-1.12,2.5-2.5,2.5-.73,0-1.42-.32-1.9-.87l-6.72,3.12c.15.49.15,1.01,0,1.5l6.72,3.12c.9-1.05,2.48-1.17,3.53-.27s1.17,2.48.27,3.53c-.9,1.05-2.48,1.17-3.53.27-.76-.65-1.06-1.7-.75-2.65l-6.72-3.12c-.9,1.05-2.48,1.17-3.53.27-1.05-.9-1.17-2.48-.27-3.53.9-1.05,2.48-1.17,3.53-.27.1.08.19.17.27.27l6.72-3.12c-.08-.24-.12-.5-.11-.75"/>
        
        </svg>
    
    </span>
    
    <span>Share with Docusign</span>

</button>


<?php } ?>
</div>



<!-- <div  class="close-button-container"><button id="btn-close-sidebar" type="button" class="btn-close btn-close-sidebar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close-button bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="back-arrow bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
</svg>
</button><div class="zoom-buttons"><button id="zoomIn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></button><button id="zoomOut"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
  <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
</svg></button></div></div> -->
</div>


<div class="form-description" style="position: realtive;">
<div class="f__general_overview"><?= $f__general_overview ?></div>
<div class="accordion-trigger" style="margin-bottom: 20px;" ><a id="accordion-trigger" href="" type="button">[read more...]</a></div>

<div class="read_more" style="">

<div><?= $f__what_is_the_document ?></div>
<div><?= $f__who_is_the_document_for ?></div>
<div><?= $f__when_would_you_use_this_document ?></div>

</div>
</div>

<div id="form-template-one" class="content-area">



<?php


/**
 * --------------------------
 * 
 * :: HTML to display sidebar
 * 
 * --------------------------
 */

?>



<div id="sidebar" class="sidebar">

    <div class="sidebar__back-group">

        <div class="t-p-acf-t2-ct-button-group">

            <span class="t-p-acf-t2-ct-button-group__button--standard t-p-acf-t2-ct-button-group__button--standard-close" style="opacity: 1;"> 
                    
                <img class="t-p-acf-t2-ct-button-group__button-icon--reverse" src="/wp-content/themes/child_theme_shizl/build/images/icon-ios-arrow-right--white.svg" alt="">

                back to document

            </span>

        </div>  

    </div>

    <div class="form-container <?= $submit_class ?>" style="display: flex; flex-direction: column;">

<?php


/**
 * --------------------------------
 * 
 * :: Renders ACF Form if Logged In
 * 
 * --------------------------------
 */

?>

<?php  if (in_array('subscriber_level_2', $user_roles) || in_array('subscriber_level_3', $user_roles) || in_array('subscriber_level_4', $user_roles) ||  in_array('subscriber', $user_roles) || in_array('administrator', $user_roles )) { 
    
        echo do_shortcode($acf_form_template_shortcode);
    
        } else {


/**
 * ---------------------------------------------------------------
 * 
 * :: Changes message if not logged in and somehow get to the form
 * 
 * ----------------------------------------------------------------
 */

        $dump = "<div>";
        $dump .= "<p>With the free account you can lookie but no touchy, if you want to be able to produce your own documents you can upgrade your plan here</p>";
        $dump .= "</div>";

        echo $dump;


/**
 * ---------------------------------------------------------------
 * 
 * :: Changes message if not logged in and somehow get to the form END
 * 
 * ================================================================
 */

        }

      
    
    ?>

    </div>

<?php


/**
 * -------------------------------------------------------------
 * 
 * :: Changes message and hides form if form has been submitted
 * 
 * --------------------------------------------------------------
 */

?>

    <?php  
    
    if ($submitted_meta_value === 'yes') {


        $dump = "<div>";
        $dump .= "<p>After a form has been submitted you have to spend another ". $f__cost_of_credits_per_form ." ". $credits_or_credit ." to submit</p>";
        $dump .= "</div>";

        echo $dump;
            
        }
    
    
    ?>

<?php


/**
 * ----------------------------------------------------------------
 * 
 * :: Changes message and hides form if form has been submitted END
 * 
 * ================================================================
 */

?>


<?php


/**
 * ------------------------------------
 * 
 * :: Renders ACF Form if Logged In END
 * 
 * ====================================
 */

?>

<div class="box-parent__group">
<div class="box-parent <?= $submit_class ?> <?= $helper_class_comment?>">
  <div class="checkbox-container">
    <div class="checkbox-holster">
      <input class="comment-helper-checkbox" type="checkbox" id="scales" name="scales" unchecked />
      <label for="scales">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill eye-open" viewBox="0 0 16 16">
        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill eye-closed" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
        </svg>
      </label>
    </div>
    <div class="text-holster">
      <p style="display: inline-block; margin: 0;">Keep this boxed ticked if you want helper comments with your form</p>
    </div>
  </div>
</div>

<div class="box-parent-navigate <?= $submit_class ?> <?=  $helper_class_auto ?>">
  <div class="checkbox-container">
    <div class="checkbox-holster">
      <input class="navigator-helper-checkbox" type="checkbox" id="navigateYes" name="check" checked />
      <label for="navigateYes">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg navigate" viewBox="0 0 16 16">
        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg no-navigation" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
        </svg>
      </label>
    </div>
    <div class="text-holster">
      <p style="display: inline-block; margin: 0;">Keep this boxed ticked if you want the form to auto-navigate</p>
    </div>
  </div>
  </div>
  </div>


<?php


/**
 * ------------------------------
 * 
 * :: HTML to display sidebar END
 * 
 * ==============================
 */

?>

<script>
$( document ).ready(function() {
acf.addAction( 'af/form/page_changed', function( newPage, previousPage, form ) {
    // console.log("Changed page from %d to %d", previousPage, newPage);
});});
</script>


<script>



const checkboxOne = document.getElementById('navigateYes');
const navigateCheck = document.querySelector('.navigate');
const navigateUnCheck = document.querySelector('.no-navigation');

// console.log(checkboxOne);
// console.log(navigateCheck);
// console.log(navigateUnCheck);

// Function to handle checkbox change
function handleCheckboxChangeOne() {

    const navigateChecked = this.checked;

    
    const screenWidth = window.innerWidth;

    if (screenWidth > 900) {

        if (navigateChecked) {

            navigateCheck.style.display = 'block'; // Display the navigate checkmark

            navigateUnCheck.style.display = 'none'; // Hide the no-navigation X
        } else {
            navigateCheck.style.display = 'none'; // Hide the navigate checkmark

            navigateUnCheck.style.display = 'block'; // Display the no-navigation X
        }

        // Log whether the checkbox is checked or not
        // console.log("Checked:", navigateChecked);

    } else {

        // Hide both navigateCheck and navigateUnCheck on smaller screens

        navigateCheck.style.display = 'none';

        navigateUnCheck.style.display = 'none';

        // console.log("Navigation functionality disabled on smaller screens.");
    }
}

// Event listener for checkbox change
checkboxOne.addEventListener('change', handleCheckboxChangeOne);

// Initial check of the checkbox state
handleCheckboxChangeOne.call(checkboxOne);

</script>

<script>

/**
 * ------------------------------------------
 * 
 * :: Turns sidebar into fullscreen on mobile 
 * 
 * -------------------------------------------
 */

// document.addEventListener("DOMContentLoaded", function () {
//   var sidebar = document.getElementById("sidebar");
//   var btnCloseSidebar = document.getElementById("btn-close-sidebar");
//   var zoomContainer = document.getElementById("zoom-container");

//   function openSidebar() {
//     sidebar.classList.add("open");
//     sidebar.classList.remove("closed");
//     btnCloseSidebar.classList.add("open");
//     btnCloseSidebar.classList.remove("closed");
//     zoomContainer.classList.add("open");
//     zoomContainer.classList.remove("closed");
//   }

//   function closeSidebar() {
//     sidebar.classList.add("closed");
//     sidebar.classList.remove("open");
//     btnCloseSidebar.classList.add("closed");
//     btnCloseSidebar.classList.remove("open");
//     zoomContainer.classList.add("closed");
//     zoomContainer.classList.remove("open");
//   }

//   // Function to check if the device is a mobile device
//   function isMobileDevice() {
//     return window.matchMedia("(max-width: 1000px)").matches;
//   }

//   // Apply the script only if it's a mobile device
//   if (isMobileDevice()) {
//     openSidebar();
//     btnCloseSidebar.addEventListener("click", function () {
//       if (sidebar.classList.contains("open")) {
//         closeSidebar();
//       } else {
//         openSidebar();
//       }
//     });
//   }
// });



/**
 * ---------------------------------------------
 * 
 * :: Turns sidebar into fullscreen on mobile END
 * 
 * ==============================================
 */

</script>


<script>



/**
 * ------------------------------------------------------------------------
 * 
 * :: Script to skip fields that are hidden due to conditional logic
 * 
 * -------------------------------------------------------------------------
 */


    // // Run our script on jQuery's document ready event. This ensures that the 
    // // global `acf` variable is available.
    // jQuery(function ($) {

    //   // Use a JS hook to run the script after each page change.
    //   acf.addAction('af/form/page_changed', function (pageTo, pageFrom, form) {

    //     // Get all fields on the current page.
    //     const currentPageFields = form.pages[pageTo].$fields;

    //     // Check if any of the current page fields are visible.
    //     const pageHasVisibleFields = !!currentPageFields.filter(':visible').length;

    //     // Determine if form page change is forward or backward.
    //     const isForward = pageTo > pageFrom;

    //     // If no visible fields are found on this page, skip to the next.
    //     if (!pageHasVisibleFields) {
    //       const nextPage = isForward ? pageTo + 1 : pageTo - 1;
    //       af.pages.changePage(nextPage, form);

    //     //   console.log('Page changing:' nextPage, PageTo );
    //     }

    //   });

    // });



/**
 * ------------------------------------------------------------------------
 * 
 * :: Script to skip fields that are hidden due to conditional logic END
 * 
 * ========================================================================
 */

  </script>



<script>


/**
 * ------------------------------------------
 * 
 * :: Script to handle out of storage pop up 
 * 
 * -------------------------------------------
 */

document.addEventListener("DOMContentLoaded", function() {
    // Check if there is an element with the class 'out-of-storage'
    var outOfStorageElement = document.querySelector('.out-of-storage');

    // If such element exists
    if (outOfStorageElement) {
        // Find the modal trigger link
        var modalLink = document.getElementById('out-of-storage');

        console.log('Element found', modalLink );

        // If the modal link exists
        if (modalLink) {
            // Simulate a click on the modal link
            modalLink.click();
        }
    }
});


/**
 * ------------------------------------------
 * 
 * :: Script to handle out of credits pop up END 
 * 
 * -------------------------------------------
 */


 /**
 * ------------------------------------------
 * 
 * :: Script to handle out of credits pop up 
 * 
 * -------------------------------------------
 */



document.addEventListener("DOMContentLoaded", function() {
    // Check if there is an element with the class 'out-of-storage'
    var outOfStorageElement = document.querySelector('.out-of-credits');

    // If such element exists
    if (outOfStorageElement) {
        // Find the modal trigger link
        var modalLink = document.getElementById('out-of-credits');

        // console.log('Element found', modalLink );

        // If the modal link exists
        if (modalLink) {
            // Simulate a click on the modal link
            modalLink.click();
        }
    }
});


 /**
 * --------------------------------------------
 * 
 * :: Script to handle out of credits pop up END
 * 
 * =============================================
 */



 /**
 * -----------------------------------------------------------------------------------------------------------------
 * 
 * :: Script to handle the navigation to skip fields that contain messages or pages hidden due to conditional logic
 * 
 * ------------------------------------------------------------------------------------------------------------------
 */



jQuery(function ($) {
    const checkbox = document.getElementById('scales');
    const eyeOpenIcon = document.querySelector('.eye-open');
    const eyeClosedIcon = document.querySelector('.eye-closed');
    const hiddenFields = document.querySelector('.acf-hidden');
    let eyeCommentPages = []; // Array to store the indices of pages with 'eye-comment' class
    let pagesNotVisible = [];
    let currentForm; // Store the current form object

  
  
    // Log elements to verify if they are found
    // console.log('Checkbox:', checkbox);
    // console.log('Eye Open Icon:', eyeOpenIcon);
    // console.log('Eye Closed Icon:', eyeClosedIcon);

    // Function to handle checkbox change
    // function handleCheckboxChange() {
    //     const isEyeClosed = this.checked;

    //     if (isEyeClosed) {
    //         eyeOpenIcon.style.display = 'none';
    //         eyeClosedIcon.style.display = 'inline-block';
    //     } else {
    //         eyeOpenIcon.style.display = 'inline-block';
    //         eyeClosedIcon.style.display = 'none';
    //     }

    //     // Log whether the eye is closed or not
    //     // console.log("Is eye closed:", isEyeClosed);
    // }

    // // Event listener for checkbox change
    // checkbox.addEventListener('change', handleCheckboxChange);

    // // Initial check of the checkbox state
    // handleCheckboxChange.call(checkbox);

    // // Add action listener for form setup
    // acf.addAction('af/form/setup', function (form) {
    //     // Initialize array to store pages with 'eye-comment' class
    //     eyeCommentPages = [];
    //     currentForm = form; // Store the current form object
    //     pagesNotVisible = [];

    //     // console.log(currentForm);

        
    //     // Iterate through the form's pages
    //     form.pages.forEach(function(page, index) {

    

    //         // Check each field in the page for the 'eye-comment' class
    //         Object.values(page.$fields).forEach(function(field) {
                
    //             if (field.classList && field.classList.contains('eye-comment')) {
    //                 eyeCommentPages.push(index);
    //             }


    //             if (field.attributes && field.attributes.hidden) {
    //             console.log(field);
    //             }
            
     

    //         });
    //     });

     
    // });

    function handleCheckboxChange() {
        const isEyeClosed = this.checked;

        if (isEyeClosed) {
            eyeOpenIcon.style.display = 'none';
            eyeClosedIcon.style.display = 'inline-block';
        } else {
            eyeOpenIcon.style.display = 'inline-block';
            eyeClosedIcon.style.display = 'none';
        }

        // Log whether the eye is closed or not
        // console.log("Is eye closed:", isEyeClosed);
    }

    // Event listener for checkbox change
    checkbox.addEventListener('change', handleCheckboxChange);

    // Initial check of the checkbox state
    handleCheckboxChange.call(checkbox);

    let hiddenFieldsPages = [];
    let allFieldsOnCurrentPageHidden = false;

    // Add action listener for form setup
    acf.addAction('af/form/setup', function (form) {

        console.log('the form : ', form);
        // Initialize array to store pages with 'eye-comment' class
        eyeCommentPages = [];
        currentForm = form; // Store the current form object
        // let hiddenFieldsPages = [];

        function allFieldsHidden(page) {
    const allHidden = Object.values(page.$fields).every(field => {
        const hiddenAttribute = field.attributes && field.attributes.getNamedItem('hidden');
        const isHidden = hiddenAttribute !== null;
        // console.log("Field", field, "is hidden:", isHidden);
        return isHidden;
    });
    // console.log("All fields on page are hidden:", allHidden);
    return allHidden;
}
                // Iterate through the form's pages
            form.pages.forEach(function(page, index) {
                let pageHasHiddenFields = false; // Flag to track if the page has hidden fields
                // Check each field in the page for the 'eye-comment' class
                Object.values(page.$fields).forEach(function(field) {
                    if (field.classList && field.classList.contains('eye-comment')) {
                        eyeCommentPages.push(index);
                    }

                    // Check if field has hidden attribute
                    if (allFieldsHidden(page)) {
        if (!hiddenFieldsPages.includes(index)) { // Check if the index is not already in the array
            hiddenFieldsPages.push(index); // Add the index to the array if it's not already there
            console.log(hiddenFieldsPages);
        }
    }
                });

                // If the page has hidden fields, store its index
                // if (pageHasHiddenFields) {
                //     hiddenFieldsPages.push(index);
                //     console.log(hiddenFieldsPages);
                // }
            });

            const targetNode = form.$el[0]; // Extract DOM element from jQuery object

            // Options for the observer (which mutations to observe)
            const config = { attributes: true, attributeFilter: ['hidden'], subtree: true };

            const callback = function(mutationsList, observer) {
    for (const mutation of mutationsList) {
        if (mutation.type === 'attributes' && mutation.attributeName === 'hidden') {
            const targetElement = mutation.target;
            const pageIndex = findPageIndex(targetElement);
            const page = currentForm.pages[pageIndex];
            const areAllFieldsHidden = allFieldsHidden(page);

            if (areAllFieldsHidden) {
                // Check if the page index is not already in the array
                if (!hiddenFieldsPages.includes(pageIndex)) {
                    hiddenFieldsPages.push(pageIndex);
                    console.log(hiddenFieldsPages);
                }
            } else {
                // Remove the page index if it's already in the array
                const index = hiddenFieldsPages.indexOf(pageIndex);
                if (index !== -1) {
                    hiddenFieldsPages.splice(index, 1);
                    console.log(hiddenFieldsPages);
                }
            }
        }
    }
};

            // Create an observer instance linked to the callback function
            const observer = new MutationObserver(callback);

            // Start observing the target node for configured mutations
            observer.observe(targetNode, config);

            // Function to find the page index of the field
            function findPageIndex(field) {
                let pageIndex = -1;
                form.pages.forEach(function(page, index) {
                    Object.values(page.$fields).forEach(function(pageField) {
                        if (pageField === field) {
                            pageIndex = index;
                        }
                    });
                });
                return pageIndex;
            }
            });

    // Add action listener for form page changes
    acf.addAction('af/form/page_changed', function (pageTo, pageFrom, form) {

        // console.log(hiddenFieldsPages);
        const currentPageHasAllFieldsHidden = hiddenFieldsPages.includes(pageFrom);
        const nextPageHasAllFieldsHidden = hiddenFieldsPages.includes(pageTo);

        

        // console.log('Current hidden pages', currentPageHasAllFieldsHidden);
        

        const isEyeClosed = eyeClosedIcon.style.display === 'inline-block';

        // Check if the current page or the next page has 'eye-comment' class
        const currentPageHasEyeComment = eyeCommentPages.includes(pageFrom);
        const nextPageHasEyeComment = eyeCommentPages.includes(pageTo);

        // console.log(currentPageHasEyeComment);
        // console.log(nextPageHasEyeComment);

        // const nextPageHasConditional = pagesNotVisible.includes(pageTo);

        // Check if the user is navigating backward
        const isNavigatingBackward = pageTo < pageFrom;
        const isNavigatingForward  = pageTo > pageFrom;


        const currentPageFields = form.pages[pageTo].$fields;

        

        // Check if any of the current page fields are visible.
        // const pageHasVisibleFields = !!currentPageFields.filter(':visible').length;

      

        // If the eye is closed and the current or next page has 'eye-comment' class, skip to the next page with the class
//         if (isNavigatingForward && isEyeClosed) {
//     nextPageIndex = findNextPageWithoutEyeComment(pageFrom, currentForm);
//     if (nextPageIndex !== -1) {
//         // console.log('Skipping to the next page without "eye-comment" class:', nextPageIndex);
//         af.pages.changePage(nextPageIndex, currentForm);
//     } else {
//         // console.log('No more pages without the eye-comment class.');
//     }
// } else if (isNavigatingBackward  && isEyeClosed) {
//     nextPageIndex = findPrevPageWithoutEyeComment(pageFrom, currentForm);
//     if (nextPageIndex !== -1) {
//         // console.log('Skipping to the previous page without "eye-comment" class:', nextPageIndex);
//         af.pages.changePage(nextPageIndex, currentForm);
//     } else {
//         // console.log('No more pages without the eye-comment class.');
//     }
// }

// const isEyeClosed = eyeClosedIcon.style.display === 'inline-block';
//     const isNavigatingForward = pageTo > pageFrom;
//     const isNavigatingBackward = pageTo < pageFrom;

if (isEyeClosed) {
        if (isNavigatingForward) {
            for (let i = pageTo; i < form.pages.length; i++) {
                if (!hiddenFieldsPages.includes(i) && !eyeCommentPages.includes(i)) {
                    af.pages.changePage(i, form);
                    return; // Skip further execution of the function
                }
            }
        } else if (isNavigatingBackward) {
            for (let i = pageTo; i >= 0; i--) {
                if (!hiddenFieldsPages.includes(i) && !eyeCommentPages.includes(i)) {
                    af.pages.changePage(i, form);
                    return; // Skip further execution of the function
                }
            }
        }
    } else {
        if (isNavigatingForward) {
            for (let i = pageTo; i < form.pages.length; i++) {
                if (!hiddenFieldsPages.includes(i)) {
                    af.pages.changePage(i, form);
                    return; // Skip further execution of the function
                }
            }
        } else if (isNavigatingBackward) {
            for (let i = pageTo; i >= 0; i--) {
                if (!hiddenFieldsPages.includes(i)) {
                    af.pages.changePage(i, form);
                    return; // Skip further execution of the function
                }
            }
        }
    }
    

    });

    

    // Function to find the next page without 'eye-comment' class
    function findNextPageWithoutEyeComment(startPage, form) {
        // console.log('Finding next page without "eye-comment" class from page:', startPage);
        for (let i = startPage + 1; i < form.pages.length; i++) {
            if (!eyeCommentPages.includes(i)) {
                // console.log('Next page without "eye-comment" class found at index:', i);
                return i;
                
            }
        }
        // console.log('No more pages without "eye-comment" class.');
        return -1; // No more pages without 'eye-comment' class
    }

    // Function to find the previous page without 'eye-comment' class
    function findPrevPageWithoutEyeComment(startPage, form) {
        // console.log('Finding previous page without "eye-comment" class from page:', startPage);
        for (let i = startPage - 1; i >= 0; i--) {
            if (!eyeCommentPages.includes(i)) {
                // console.log('Previous page without "eye-comment" class found at index:', i);
                return i;
            }
        }
        // console.log('No previous pages without "eye-comment" class.');
        return -1; // No previous pages without 'eye-comment' class
    }

    function findNextPageWithVisibleFields(startPage, form) {
    for (let i = startPage + 1; i < form.pages.length; i++) {
        if (!hiddenFieldsPages.includes(i)) {
            return i;
        }
    }
    return -1; // No more pages with visible fields
}

function findPrevPageWithVisibleFields(startPage, form) {
    for (let i = startPage - 1; i >= 0; i--) {
        if (!hiddenFieldsPages.includes(i)) {
            return i;
        }
    }
    return 0; // Return the first page if no previous page with visible fields found
}

function findNextPageWithoutEyeCommentOrHidden(startPage, form) {
    const combinedPages = [...hiddenFieldsPages, ...eyeCommentPages].sort((a, b) => a - b);
    // console.log(combinedPages);
    for (let i = startPage + 1; i < form.pages.length; i++) {
            if (!combinedPages.includes(i)) {
                // console.log('Next page without "eye-comment" class found at index:', i);
                return i;
                
            }
        }
        // console.log('No more pages without "eye-comment" class.');
        return -1; 
}

function findPrevPageWithoutEyeCommentOrHidden(startPage, form) {
    const combinedPages = [...hiddenFieldsPages, ...eyeCommentPages].sort((a, b) => a - b);

    // console.log(combinedPages);
    for (let i = startPage - 1; i >= 0; i--) {
            if (!combinedPages.includes(i)) {
                // console.log('Previous page without "eye-comment" class found at index:', i);
                return i;
            }
        }
        // console.log('No previous pages without "eye-comment" class.');
        return -1; 
}

});




/**
 * ------------------------------------------------------------------------
 * 
 * :: Script to handle the navigation to skip fields that contain messages END
 * 
 * ==========================================================================
 */

</script>



</div> 

<?php 

/**
 * -----------------------------------
 * 
 * :: HTML to render AF Forms on page
 * 
 * -----------------------------------
 */


?>


<div id="zoom-container" class="zoomViewport demo">

    <div id="zoom-content" class="zoomContainer" oncopy="return false" onpaste="return false" oncut="return false" onmousedown='return false' oncontextmenu="return false">


  
        <div id="content-container" style="">
        
            <?php /* get_template_part('template-partials/tp__acf-field-groups/tp__acf-field-group-1-flexable-content-types/tp__acf__g1__flexable-content-type-form-builder'); */?>

            <div class="page"></div>

            <div id="section-header"></div>
            <div id="section-footer"></div>

            <div id="section_html_calculated"></div>
            <div id="section_one_calculated"></div>
            <div id="section_two_calculated"></div>
            <div id="section_three_calculated"></div>
            <div id="section_four_calculated"></div>
            <div id="section_five_calculated"></div>
            <div id="section_six_calculated"></div>
            <div id="section_seven_calculated"></div>
            <div id="section_eight_calculated"></div>
            <div id="section_nine_calculated"></div>
            <div id="section_ten_calculated"></div>
            <div id="section_eleven_calculated"></div>
            <div id="section_twelve_calculated"></div>
            <div id="section_thirteen_calculated"></div>
            <div id="section_fourteen_calculated"></div>
            <div id="section_fifteen_calculated"></div>
            <div id="section_sixteen_calculated"></div>
            <div id="section_seventeen_calculated"></div>
            <div id="section_eighteen_calculated"></div>
            <div id="section_nineteen_calculated"></div>
            <div id="section_twenty_calculated"></div>
            <div id="section_twenty_one_calculated"></div>
            <div id="section_twenty_two_calculated"></div>
            <div id="section_twenty_three_calculated"></div>
            <div id="section_twenty_four_calculated"></div>
            <div id="section_twenty_five_calculated"></div>
            <div id="section_twenty_six_calculated"></div>
            <div id="section_twenty_seven_calculated"></div>
            <div id="section_twenty_eight_calculated"></div>
            <div id="section_twenty_nine_calculated"></div>
            <div id="section_thirty_calculated"></div>
            <div id="section_thirty_one_calculated"></div>
            <div id="section_thirty_two_calculated"></div>
            <div id="section_thirty_three_calculated"></div>

   
        </div>
    </div>
</div>








</div>


<?php 

/**
 * --------------------------------------
 * 
 * :: HTML to render AF Forms on page END
 * 
 * =======================================
 */


?>

<?php 

/**
 * ------------------------------
 * 
 * :: Modal for Send to Docusign 
 * 
 * ------------------------------
 */

?>

</div>

<!-- The Modal -->
<!-- <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close"><svg id="Component_29_18" data-name="Component 29 – 18" xmlns="http://www.w3.org/2000/svg" width="30.815" height="30.5" viewBox="0 0 30.815 30.5">
    <path id="Path_82" data-name="Path 82" d="M11.516,0V10.842l-9.4-3.059L0,14.486l9.582,2.969-6.3,8.952L9.042,30.5l6.433-8.457L21.728,30.5l5.758-4.094-6.253-8.952,9.582-2.969L28.7,7.783l-9.4,3.059V0Z" transform="translate(0 0)" fill="#f21364"/>
    </svg></span>
    <?php /* include ('wp-content/themes/child_theme_shizl/template-partials/template-partial-docusign-package-pdf.php'); */ ?>
  </div>
</div> -->

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close"><svg id="Component_29_18" data-name="Component 29 – 18" xmlns="http://www.w3.org/2000/svg" width="30.815" height="30.5" viewBox="0 0 30.815 30.5">
    <path id="Path_82" data-name="Path 82" d="M11.516,0V10.842l-9.4-3.059L0,14.486l9.582,2.969-6.3,8.952L9.042,30.5l6.433-8.457L21.728,30.5l5.758-4.094-6.253-8.952,9.582-2.969L28.7,7.783l-9.4,3.059V0Z" transform="translate(0 0)" fill="#f21364"/>
    </svg></span>
    <?php
    if (is_array($form_completion_options)) {
    if (in_array('share_with_docusign', $form_completion_options) && in_array('share_with_docusign_return', $form_completion_options)) {
        // Include this file only if both options are present
        $docusign_envelope_method = "docusign-transactional";
    } else {
        if (in_array('share_with_docusign', $form_completion_options)) {
        $docusign_envelope_method = "docusign-one-way";
        }

        if (in_array('share_with_docusign_sender', $form_completion_options)) {
            $docusign_envelope_method = "docusign-sender-first";
        }

        if (in_array('share_with_docusign_witness', $form_completion_options)) {
            $docusign_envelope_method = "docusign-witness";
        }
    
        if (in_array('share_with_docusign_return', $form_completion_options)) {
        $docusign_envelope_method = "docusign-transactional";
        }
    }
    } ?>
    <?php  include ('wp-content/themes/child_theme_shizl/template-partials/template-partial-docusign-package-pdf.php'); ?>
  </div>
</div>




<?php 

echo "
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find the field with class 'af-field-type-true-false' and data-name 'f__boolean'
        var targetField = document.querySelector('.af-field-type-true-false[data-name=\"f__boolean\"]');
        
        // Check if the field exists
        if (targetField) {
            // Get the current content of the field
            var fieldContent = targetField.innerHTML;

            // Replace the word 'one' with the value of the PHP variable
            var updatedContent = fieldContent.replace('one', '{$f__cost_of_credits_per_form}');

            // Update the field with the new content
            targetField.innerHTML = updatedContent;
        }
    });
</script>
";

/**
 * --------------------------------
 * 
 * :: Modal for Send to Docusign END
 * 
 * =================================
 */


?>


<?php 

/**
 * --------------------------------
 * 
 * :: Not Logged In conditional 
 * 
 * --------------------------------
 */


?>




<?php } else { ?>

<div class="scaffolding-container" style="margin-top: 76px; height: 100vh;">
    <div class="t-p-acf-t2-ct-feature-title__title-size-extra-large"><h1>Sorry you cant see this content as you havent paid the big bucks</h1></div>
</div>

<?php } ?>

<?php 

/**
 * --------------------------------
 * 
 * :: Not Logged In conditional END
 * 
 * =================================
 */


?>



<?php


// :: Services CTAs
// --------
get_template_part( 'template-partials/template-partial-acf-field-group-0-our-legal-services-ctas');



?>

<footer>

    <?php

    /**
     * ------------------
     * 
     * :: Footer - Header
     * 
     * ------------------
     */

    ?>

    <?php

    get_template_part( 'template-partials/t-p-footer-header' );

    ?>

    <?php

    /**
     * -------------------
     * 
     * /:: Footer - Header
     * 
     * ===================
     */

    ?>

    <?php

    /**
     * ------------------
     * 
     * :: Footer - Footer
     * 
     * ------------------
     */

    ?>

    <?php

    get_template_part( 'template-partials/t-p-footer-footer' );

    ?>

    <?php

    /**
     * -------------------
     * 
     * /:: Footer - Footer
     * 
     * ===================
     */

    ?>


    <?php

    /**
     * ----------------------
     * 
     * :: Modal target element
     * 
     * ----------------------
     */

    ?>				

    <div class="t-p-footer__modal-target-element"></div>

    <?php

    /**
     * ------------------------
     * 
     * /:: Modal target element
     * 
     * ========================
     */



    ?>	

<?php wp_footer(); ?>

</footer>

<?php
/**
 * ----------------------
 * 
 * :: Modal target element
 * 
 * ----------------------
 */
?>	



<script>


/**
 * --------------------------------------------------------------------------------
 * 
 * :: Handles the live update of any input field rendering in the content-container
 * 
 * --------------------------------------------------------------------------------
 */




$(document).on('input', '[id^="acf-field_"]', function() {
  var currentValue = $(this).val();
  acf.doAction('af/field/calculated/update_value', currentValue);
  
  
});


$(document).on('keyup', '[class^="acf-disabled"]', function() {
  var currentValue = $(this).val();
  acf.doAction('af/field/calculated/update_value', currentValue);
  
  
});




/**
 * -------------------------------------------------------------------------------------
 * 
 * :: Handles the live update of any input field rendering in the content-container END
 * 
 * =====================================================================================
 */





/**
 * ----------------------------------------------------------------------
 * 
 * :: Handles the display of calculated fields into the content-container
 * 
 * ----------------------------------------------------------------------
 */


 
acf.addAction('af/field/calculated/value_updated/name=document_name', function(value, field, form) {
    // Strip HTML tags from the value
    var strippedValue = $('<div>').html(value).text();

    // Update the content of the #document-rename element
    $('#document-rename').text(strippedValue);

    // Log the stripped value to the console
    // console.log(strippedValue);
    // console.log('strippedValue', strippedValue);

    cloneForm();

    activateTextHighlights();

    
    
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated', function( value, field, form ) {
  $('#section_html_calculated').html(value);


  handleReindex('section_html_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_html_calculated', value, field);

  removedivTagsFromOrderFormsTable('section_html_calculated', value, field);
  
});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_1', function( value, field, form ) {
  $('#section_one_calculated').html(value);


  handleReindex('section_one_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_one_calculated', value, field);

  removedivTagsFromOrderFormsTable('section_one_calculated', value, field);

});

acf.addAction('af/field/calculated/value_updated/name=f__calculated_header', function (value, field, form) {
    $('#section-header').html(value);
});



acf.addAction('af/field/calculated/value_updated/name=f__calculated_footer', function (value, field, form) {
    $(' #section-footer').html(value);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_2', function( value, field, form ) {
  $('#section_two_calculated').html(value);

  handleReindex('section_two_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_two_calculated', value, field);


  removedivTagsFromOrderFormsTable('section_two_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_3', function( value, field, form ) {
  $('#section_three_calculated').html(value);


  handleReindex('section_three_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_three_calculated', value, field);

});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_4', function( value, field, form ) {
  $('#section_four_calculated').html(value);


  handleReindex('section_four_calculated', value, field);


  removeParagraphTagsFromBorderlessRows('section_four_calculated', value, field);
});



acf.addAction('af/field/calculated/value_updated/name=f__calculated_5', function(value, field, form) {
   

    $('#section_five_calculated').html(value);


    handleReindex('section_five_calculated', value, field);


    removeParagraphTagsFromBorderlessRows('section_five_calculated', value, field);
});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_6', function( value, field, form ) {
  $('#section_six_calculated').html(value);


  handleReindex('section_six_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_six_calculated', value, field);

});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_7', function( value, field, form ) {
  $('#section_seven_calculated').html(value);


  handleReindex('section_seven_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_seven_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_8', function( value, field, form ) {
  $('#section_eight_calculated').html(value);

  handleReindex('section_eight_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_eight_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_9', function( value, field, form ) {
  $('#section_nine_calculated').html(value);

  handleReindex('section_nine_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_nine_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_10', function( value, field, form ) {
  $('#section_ten_calculated').html(value);

  handleReindex('section_ten_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_ten_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_11', function( value, field, form ) {
  $('#section_eleven_calculated').html(value);

  handleReindex('section_eleven_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_eleven_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_12', function( value, field, form ) {
  $('#section_twelve_calculated').html(value);

  handleReindex('section_twelve_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twelve_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_13', function( value, field, form ) {
  $('#section_thirteen_calculated').html(value);

  handleReindex('section_thirteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_thirteen_calculated', value, field);
});



acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_14', function( value, field, form ) {
  $('#section_fourteen_calculated').html(value);

  handleReindex('section_fourteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_fourteen_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_15', function( value, field, form ) {
  $('#section_fifteen_calculated').html(value);

  handleReindex('section_fifteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_fifteen_calculated', value, field);
});



acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_16', function( value, field, form ) {
  $('#section_sixteen_calculated').html(value); 

  handleReindex('section_sixteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_sixteen_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_17', function( value, field, form ) {
  $('#section_seventeen_calculated').html(value);

  handleReindex('section_seventeen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_seventeen_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_18', function( value, field, form ) {
  $('#section_eighteen_calculated').html(value);

  handleReindex('section_eighteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_eighteen_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_19', function( value, field, form ) {
  $('#section_nineteen_calculated').html(value);

  handleReindex('section_nineteen_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_nineteen_calculated', value, field);
});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_20', function( value, field, form ) {
  $('#section_twenty_calculated').html(value);

  handleReindex('section_twenty_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_21', function( value, field, form ) {
  $('#section_twenty_one_calculated').html(value);

  handleReindex('section_twenty_one_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_one_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_22', function( value, field, form ) {
  $('#section_twenty_two_calculated').html(value);

  handleReindex('section_twenty_two_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_two_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_23', function( value, field, form ) {
  $('#section_twenty_three_calculated').html(value);

  handleReindex('section_twenty_three_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_three_calculated', value, field);
});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_24', function( value, field, form ) {
  $('#section_twenty_four_calculated').html(value);

  handleReindex('section_twenty_four_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_four_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_25', function( value, field, form ) {
  $('#section_twenty_five_calculated').html(value);

  handleReindex('section_twenty_five_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_five_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_26', function( value, field, form ) {
  $('#section_twenty_six_calculated').html(value);

  handleReindex('section_twenty_six_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_six_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_27', function( value, field, form ) {
  $('#section_twenty_seven_calculated').html(value);

  handleReindex('section_twenty_seven_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_seven_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_28', function( value, field, form ) {
  $('#section_twenty_eight_calculated').html(value);

  handleReindex('section_twenty_eight_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_eight_calculated', value, field);
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_29', function( value, field, form ) {
  $('#section_twenty_nine_calculated').html(value);

  handleReindex('section_twenty_nine_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_twenty_nine_calculated', value, field);

});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_30', function( value, field, form ) {
  $('#section_thirty_calculated').html(value);


  handleReindex('section_thirty_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_thirty_calculated', value, field);

});


acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_31', function( value, field, form ) {
  $('#section_thirty_one_calculated').html(value);


  handleReindex('section_thirty_one_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_thirty_one_calculated', value, field);
  
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_32', function( value, field, form ) {
  $('#section_thirty_two_calculated').html(value);

  handleReindex('section_thirty_two_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_thirty_two_calculated', value, field);
  
});

acf.addAction( 'af/field/calculated/value_updated/name=f__calculated_33', function( value, field, form ) {
  $('#section_thirty_three_calculated').html(value);

  handleReindex('section_thirty_three_calculated', value, field);

  removeParagraphTagsFromBorderlessRows('section_thirty_three_calculated', value, field);
  
});


/**
 * --------------------------------------------------------------------------
 * 
 * :: Handles the display of calculated fields into the content-container END
 * 
 * ==========================================================================
 */



</script>





<script>


/**
 * ----------------------------------------------------------------------------------------------------------------
 * 
 * :: Strips the <p> tags inserted by Advanced forms plugins when inserting a table row: use class "borderless-row"
 * 
 * ----------------------------------------------------------------------------------------------------------------
 */

function removeParagraphTagsFromBorderlessRows(sectionID, value, field) {
    // Remove <p> tags from <tr> elements with class 'borderless-row' within the specified section
    $('#' + sectionID + ' .borderless-row').each(function() {
        $(this).find('p').contents().unwrap(); // Remove <p> tags
    });


    // Get updated HTML content after removing <p> tags
    var updatedHtml = $('#' + sectionID).html();

    // Update the value with the updated HTML content
    value = updatedHtml;

    // Update the field with the modified value
    field.find('[name="acf[' + field.data('key') + ']"]').val(value);

    return value;
}


function removedivTagsFromOrderFormsTable(sectionID, value, field) {
    // Remove <p> tags from <tr> elements with class 'borderless-row' within the specified section
    $('#' + sectionID + ' .order-forms-table-display').each(function() {
        $(this).next('p:empty').remove();
    });


    // Get updated HTML content after removing <p> tags
    var updatedHtml = $('#' + sectionID).html();

    // Update the value with the updated HTML content
    value = updatedHtml;

    // Update the field with the modified value
    field.find('[name="acf[' + field.data('key') + ']"]').val(value);

    return value;
}



document.addEventListener('DOMContentLoaded', function () {
    function populateOtherTextField() {
        const textInput = document.querySelector('input[type="text"][name="acf[field_664cace315103]"]');
        const textInput2 = document.querySelector('input[type="text"][name="acf[field_6659daa9eade9]"]');
        const textInput3 = document.querySelector('input[type="text"][name="acf[field_668d171df8d07]"]');
        const textInput4 = document.querySelector('input[type="text"][name="acf[field_65d4d0a05e51d]"]');
        const textInput5 = document.querySelector('input[type="text"][name="acf[field_6650570de79a3]"]');
        const textInput6 = document.querySelector('input[type="text"][name="acf[field_6731e5979e210]"]'); // shz00060 page 59
        const textInput7 = document.querySelector('input[type="text"][name="acf[field_6731e9bebd10c]"]'); // shz00060 page 61
        const textInput8 = document.querySelector('input[type="text"][name="acf[field_67220b3490e6e]"]'); // shz00037 page 73
        const textInput9 = document.querySelector('input[type="text"][name="acf[field_673b4595e7176]"]'); // shz00038 page 67 
        const textInput10 = document.querySelector('input[type="text"][name="acf[field_677e4f5361449]"]'); // shz00062 11.3.2
        const textInput11 = document.querySelector('input[type="text"][name="acf[field_6780f2fffcc49]"]'); // shz00062 11.3.2        
        const textInput12 = document.querySelector('input[type="text"][name="acf[field_6759831cec059]"]'); // shz00039 15.3.2
        const textInput13 = document.querySelector('input[type="text"][name="acf[field_675988d1961fb]"]'); // shz00039 15.3.2b


        if (textInput) {
            textInput.value = '£';
        }

                
        if (textInput2) {
            textInput2.value = '£';
        }

        if (textInput3) {
            textInput3.value = '£';
        }

        if (textInput4) {
            textInput4.value = '£';
        }

        if (textInput5) {
            textInput5.value = '£';
        }

        if (textInput6) {

            textInput6.value = '£';
        }        

        if (textInput7) {

            textInput7.value = '£';

        }

        if (textInput8) {

            textInput8.value = '£';
          
        }

        if (textInput9) {

            textInput9.value = '£';

        }

        if (textInput10) {

            textInput10.value = '£';

        }

        if (textInput11) {

            textInput11.value = '£';

        }

        if (textInput12) {

            textInput12.value = '£';

        }        

        if (textInput13) {

            textInput13.value = '£';

        } 
        
        
    }



    populateOtherTextField(); // Initial call to set the value on page load
});


/**
 * ----------------------------------------------------------------------------------------
 * 
 * :: Strips the <p> tags inserted by Advanced forms plugins when inserting a table row END
 * 
 * ========================================================================================
 */




/**
 * -------------------------------------------------------
 * 
 * :: Handles the allocation of which reindex function to use 
 * 
 * -------------------------------------------------------
 */



function handleReindex(sectionID, value, field) {
  if ($('#' + sectionID + ' .reindex').length > 0) {

    reindexNumbers(sectionID, value, field);
  
  }

  if ($('#' + sectionID + ' .reindex-nested').length > 0) {
    reindexNumbersNested(sectionID, value, field);

  }

  if ($('#' + sectionID + ' .reindex-single').length > 0) {
    reindexNumbersSingle(sectionID, value, field);
  }

  if ($('#' + sectionID + ' .reindex-letters').length > 0) {
    reindexLetters(sectionID, value, field);
  }

  if ($('#' + sectionID + ' .reindex-whole').length > 0) {
    reindexNumbersWhole(sectionID, value, field);
  }


  if ($('#' + sectionID + ' .reindex-total').length > 0) {
    reindexNumbersTotal(sectionID, value, field);
  }


  if ($('#' + sectionID + ' p').length > 0) {
    addIndentClassToParagraphs(sectionID, value, field);
  }


  if ($('#' + sectionID).length > 0) {
    // addTableMarginIfFollowedByParagraph(sectionID);
    addTableMarginIfNotFollowedByAnotherTable(sectionID)
  }
  
}




/**
 * --------------------------------------------------------------
 * 
 * :: Handles the allocation of which reindex function to use END
 * 
 * ==============================================================
 */



 /**
 * -------------------------------------------------------------------------------------
 * 
 * :: Reindexing the whole document? 
 * 
 * -------------------------------------------------------------------------------------
 */


 function reindexNumbersTotal(sectionID, value, field) {
    var numbers = [];
    var elements = [];
    var originalHTMLs = [];

    // Find all elements within the specified section or the entire document with the class `reindex-total`
    $('#content-container .reindex-total, #' + sectionID + ' .reindex-total').each(function(index, element) {
        // Extract the HTML of each element
        var html = $(element).html().trim();

        // Match the number at the beginning of the text, while preserving the HTML
        let match = html.match(/^(\d+(\.\d+){0,2})/);

        if (match) {
            // Extract the number
            var number = match[0];

            // Split the number into parts
            let parts = number.split('.');
            numbers.push(parts);
            elements.push($(element));
            originalHTMLs.push(html.substring(number.length).trim());
        }
    });

    if (numbers.length === 0) {
        return value;
    }

    // Determine the starting points from the first clause number
    let initialParts = numbers[0].map(Number);
    let [level1, level2, level3] = [initialParts[0], initialParts[1] || 0, initialParts[2] || 0];

    for (let i = 0; i < numbers.length; i++) {
        let parts = numbers[i];
        if (parts.length === 1) {
            // Level 1 numbering
            level2 = 0; // Reset level 2
            level3 = 0; // Reset level 3
            parts[0] = level1.toString();
            level1++;
        } else if (parts.length === 2) {
            // Level 2 numbering
            level3 = 0; // Reset level 3
            parts[0] = (level1 - 1).toString(); // Level 1 part should be the current level 1
            parts[1] = (++level2).toString();
        } else if (parts.length === 3) {
            // Level 3 numbering
            parts[0] = (level1 - 1).toString(); // Level 1 part should be the current level 1
            parts[1] = level2.toString(); // Level 2 part should be the current level 2
            parts[2] = (++level3).toString();
        }

        // Update the number in the HTML, ensuring we preserve the rest of the HTML structure
        let newHTML = parts.join('.') + ' ' + originalHTMLs[i];
        elements[i].html(newHTML);
    }

    // Remove any empty paragraphs within the section
    $('#' + sectionID + ' p.reindex-total').each(function() {
        if ($(this).text().trim() === '') {
            $(this).remove();
        }
    });

    // Update the HTML content of the section
    var updatedHtmlTotal = $('#' + sectionID).html();
    value = updatedHtmlTotal;

    // Update the form field
    field.find('[name="acf[' + field.data('key') + ']"]').val(value);

    return value;
}


//  function reindexNumbersTotal(sectionID, value, field) {
//     var numbers = [];
//     var elements = [];
//     var originalTexts = [];

//     // Find all elements within the specified section or the entire document with the class `reindex-total`
//     $('#content-container .reindex-total, #' + sectionID + ' .reindex-total').each(function(index, element) {
//         // Extract the text of each element
//         var text = $(element).text().trim();

//         // Match the number at the beginning of the text
//         let match = text.match(/^(\d+(\.\d+){0,2})/);

//         if (match) {
//             // Extract the number
//             var number = match[0];

//             // Split the number into parts
//             let parts = number.split('.');
//             numbers.push(parts);
//             elements.push($(element));
//             originalTexts.push(text.substring(number.length).trim());
//         }
//     });

//     // Determine the starting points from the first clause number
//     let initialParts = numbers[0].map(Number);
//     let [level1, level2, level3] = [initialParts[0], initialParts[1] || 0, initialParts[2] || 0];

//     for (let i = 0; i < numbers.length; i++) {
//         let parts = numbers[i];
//         if (parts.length === 1) {
//             // Level 1 numbering
//             level2 = 0; // Reset level 2
//             level3 = 0; // Reset level 3
//             parts[0] = level1.toString();
//             level1++;
//         } else if (parts.length === 2) {
//             // Level 2 numbering
//             level3 = 0; // Reset level 3
//             parts[0] = (level1 - 1).toString(); // Level 1 part should be the current level 1
//             parts[1] = (++level2).toString();
//         } else if (parts.length === 3) {
//             // Level 3 numbering
//             parts[0] = (level1 - 1).toString(); // Level 1 part should be the current level 1
//             parts[1] = level2.toString(); // Level 2 part should be the current level 2
//             parts[2] = (++level3).toString();
//         }

//         // Update the number in the text
//         let newText = parts.join('.') + ' ' + originalTexts[i];
//         elements[i].text(newText);
//     }

//     // Remove any empty paragraphs within the section
//     $('#' + sectionID + ' p.reindex-total').each(function() {
//         if ($(this).text().trim() === '') {
//             $(this).remove();
//         }
//     });

//     // Update the HTML content of the section
//     var updatedHtmlTotal = $('#' + sectionID).html();
//     value = updatedHtmlTotal;

//     // Update the form field
//     field.find('[name="acf[' + field.data('key') + ']"]').val(value);

//     return value;
// }



 /**
 * -------------------------------------------------------------------------------------
 * 
 * :: Reindexing the whole document? END
 * 
 * -------------------------------------------------------------------------------------
 */




/**
 * -------------------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Single Numbers e.g. "4." : use class "reindex-single"
 * 
 * -------------------------------------------------------------------------------------
 */


 function reindexNumbersSingle(sectionID, value, field) {
    var elements = $('#content-container, #' + sectionID + ' .reindex-single');
    var originalTexts = [];
    elements.each(function(index, element) {
        var text = $(element).text().trim();
        var match = text.match(/^(\d+(?:\.\d+)?)/g);
        if (match) {
            var number = match[0]; // Select the first matched number
            // Split number into integer and decimal parts
            var [integerPart, decimalPart] = number.split('.');
            originalTexts.push({
                element: $(element),
                integerPart: integerPart,
                decimalPart: decimalPart !== undefined ? '.' + decimalPart : '',
                text: text.substring(number.length).trim()
            });
        }
    });
    if (originalTexts.length > 0) {
        // Find the maximum length of integer parts
        var maxLength = originalTexts.reduce(function(max, item) {
            return Math.max(max, item.integerPart.length);
        }, 0);
        // Reindex numbers
        originalTexts.forEach(function(item, index) {
            var newIndex = (index + 1).toString();
            var paddedIndex = newIndex.padStart(maxLength, ' ');
            item.integerPart = paddedIndex;
        });
        // Update elements with new indices
        originalTexts.forEach(function(item) {
            var newText = item.integerPart + item.decimalPart + '' + item.text;
            item.element.html(newText);
        });
    }
    // Remove empty paragraphs
    $('#' + sectionID + ' p.reindex-single').each(function() {
        if ($(this).text().trim() === '') {
            $(this).remove();
        }
    });
    // Update value
    var updatedHtmlNested = $('#' + sectionID).html();
    field.find('[name="acf[' + field.data('key') + ']"]').val(updatedHtmlNested);
    return updatedHtmlNested;
}



/**
 * --------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Single Numbers e.g. "4." END
 * 
 * ==========================================================================
 */



/**
 * ----------------------------------------------------------------------------------------
 * 
 * :: Adds indent-paragraph class to regex matched paragraphs that start with a) b) c) etc.
 * 
 * -----------------------------------------------------------------------------------------
 */

 function addIndentClassToParagraphs(sectionID, value, field) {

    field = $(field);
    // console.log('Field name:', field.data('name'));

    const renderContainer = $('#content-container, #' + sectionID);


    // console.log('Render Container:', renderContainer); 


    // const paragraphs = renderContainer.find('p');
    const paragraphs = renderContainer.find('p:not(table p)');

    // console.log('Found <p> elements:', paragraphs.length); 


    if (paragraphs.length === 0) {
        // console.log('No <p> elements found in the specified container.');
    }

    paragraphs.each(function () {
   
        const text = $(this).text().trim();

        // console.log('Processing paragraph with text:', text); 

 
        const normalizedText = text
            .replace(/\u00A0/g, ' ') 
            .replace(/\s+/g, ' ')
            .trim(); 

        // Regular expression to match a letter followed by a closing parenthesis (e.g., a), b), c))
        // Regular expression to match a letter opening and followed by a closing parenthesis (e.g., (a), (b), (c))
        // Regular expression to match roman numerals (e.g., i), iv), iii))

        // const regex = /^\s*([a-zA-Z])\)/; 
        const regex = /^\s*(\([a-zA-Z]+\)|[a-zA-Z]\)|\([ivxlcdm]+\))/;

 
        if (regex.test(normalizedText)) {

            $(this).addClass('indent-paragraph'); 
            // console.log('Added class "indent-paragraph" to:', normalizedText); 

        } else {

            // console.log('No match for:', normalizedText);
        }
    });

    
    renderContainer.find('p.indent-paragraph').each(function () {

        if ($(this).text().trim() === '') {
            $(this).remove();
        }

    });

  
    var updatedHtml = renderContainer.html();
    // console.log('Updated HTML:', updatedHtml); 

 
    field.find('[name="acf[' + field.data('key') + ']"]').val(updatedHtml);

    // console.log('Field updated with new value.');

    return updatedHtml;
}



/**
 * ---------------------------------------------------------------------------------------------
 * 
 * :: Adds indent-paragraph class to regex matched paragraphs that start with a) b) c) etc. END
 * 
 * ----------------------------------------------------------------------------------------------
 */


 /**
 * ----------------------------------------------------------------------------------------------------
 * 
 * :: Adds table-margin-bottom class to tables that do not have another table following them in the DOM 
 * 
 * ----------------------------------------------------------------------------------------------------
 */

function addTableMarginIfNotFollowedByAnotherTable(sectionID) {

const renderContainer = $('#content-container, #' + sectionID);

const tables = renderContainer.find('table');

let element = $('.af-tabular-data__entries');

let elementLastChild = $('.af-tabular-data__entries .last-child');

console.log('Af-tablular-data last child',  elementLastChild);

// console.log('Found <table> elements:', tables.length); // Log the number of tables found

tables.each(function () {
    
    const table = $(this);

    let nextElement = table.next();


    let isNextElementTable = nextElement.is('table') || nextElement.find('table').length > 0;


  
    if (!isNextElementTable && !element) {

        table.addClass('table-margin-bottom');

        // console.log('Added class "table-margin-bottom" to table:', table);

    } else {

        // console.log('Next element is a table or contains a table. No class added:', nextElement);
    }

    
});
}

/**
* ---------------------------------------------------------------------------------------------------------
* 
* :: Adds table-margin-bottom class to tables that do not have another table following them in the DOM END
* 
* ----------------------------------------------------------------------------------------------------------
*/



  /**
 * ------------------------------------------------
 * 
 * :: Calculates the Reindexing of letters e.g (a)
 * 
 * -----------------------------------------------
 */


 function reindexLetters(sectionID, value, field) {
    try {
        field = $(field);
        var fieldName = field.data('name');
        var letters = [];
        var elements = [];
        var originalTexts = [];
        var letterIndex = 0;

        // Function to convert a number to a corresponding letter
        function getLetter(index) {
            return String.fromCharCode(97 + index);  // 97 is the ASCII code for 'a'
        }

        console.log('Starting reindexLetters for sectionID:', sectionID);

        // Select elements with class 'reindex-letters' within the specified sectionID
        var reindexElements = $('#' + sectionID + ' .reindex-letters');
        console.log('Found reindex-letters elements:', reindexElements.length);

        reindexElements.each(function(index, element) {
            // Extract the text of each element
            var text = $(element).text().trim();
            console.log('Processing element:', element, 'with text:', text);

            // Match the letter at the beginning of the text
            // let match = text.match(/^([a-zA-Z])/);
            let match = text.match(/^\((\w)\)/);

            if (match) {
                // Extract the letter
                var letter = match[0];
                console.log('Matched letter:', letter);

                // Push the letter and its element to the respective arrays
                letters.push(letter);
                elements.push($(element));

                // Store the original text that follows the letter
                var originalText = text.substring(letter.length).trim();
                originalTexts.push(originalText);
                console.log('Original text:', originalText);
            } else {
                console.log('No match found for text:', text);
            }
        });

        if (letters.length === 0) {
            console.log('No elements found starting with a letter.');
            return;
        }

        // Reindex the letters
        for (var i = 0; i < letters.length; i++) {
            // Get the corresponding letter for the current index
            var newLetter = getLetter(letterIndex);
            console.log('New letter:', newLetter);

            // Concatenate the new letter with the original text and update the text content of the corresponding element
            var newText = "(" + newLetter + ') ' + originalTexts[i];
            elements[i].text(newText);
            console.log('Updated text:', newText);

            // Increment the letter index for the next iteration
            letterIndex++;
        }

        $('#' + sectionID + ' p.reindex-letters').each(function() {
            if ($(this).text().trim() === '') {
                $(this).remove();
            }
        });

        var updatedHtml = $('#' + sectionID).html();
        console.log('Updated HTML:', updatedHtml);

        value = updatedHtml;

        field.find('[name="acf[' + field.data('key') + ']"]').val(value);
        console.log('Field updated with new value.');

        return updatedHtml;
    } catch (error) {
        console.error('Error in reindexLetters:', error);
    }
}


 /**
 * --------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of letters e.g (a) END
 * 
 * =====================================================================
 */


 /**
 * ------------------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Double Digit Numbers e.g. "4.1" : use class "reindex"
 * 
 * ------------------------------------------------------------------------------------
 */


 function reindexNumbers(sectionID, value, field) {

field = $(field);
var fieldName = field.data('name');
var numbers = [];
var elements = [];
var originalTexts = [];

$('#content-container, #' + sectionID + ' .reindex').each(function(index, element) {
    // Extract the text of each element
    var text = $(element).text().trim();

    // console.log("Text:", text);
    // console.log("Field Name:", fieldName);

    // Match the number at the beginning of the text
    let match = text.match(/^(\d+(?:\.\d+)+)/g);  // Match numbers with one or more decimal points

    // console.log("Match:", match);

    if (match) {
        // Extract the number
        var number = match.toString(); // Extract the entire matched number string

        let period = number.lastIndexOf(".");
        let newString = [number.substring(0, period), number.substring(period)];

        // console.log("Number array:", newString);

        // Push the number and its element to the respective arrays
        numbers.push(newString);
        elements.push($(element));

        // Store the original text that follows the number
        var originalText = text.substring(match[0].length).trim();
        originalTexts.push(originalText);
    }
});

// console.log("Numbers array:", numbers);

// Initialize the decimal part increment
var decimalIncrement = 0.1;

// Start reindexing from 0.1
var currentIndex = 0.1; // Start from 1 as the first number will always be 0.1
for (var i = 0; i < numbers.length; i++) {
    // Set the last decimal part of the current number in the array to currentIndex
    numbers[i][numbers[i].length - 1] = currentIndex.toFixed(1).replace(/^0\.?/, '');

    // Concatenate the number array into a string
    var newNumber = numbers[i].join('.');

    // console.log("New number:", newNumber);

    // Concatenate the new number with the original text and update the text content of the corresponding element
    var newText = newNumber + ' ' + originalTexts[i];
    elements[i].text(newText);

    // Increment currentIndex by 0.1 for the next iteration
    currentIndex += decimalIncrement;
}

$('#' + sectionID + ' p.reindex').each(function() {
    if ($(this).text().trim() === '') {
        $(this).remove();
    }
});

var updatedHtml = $('#' + sectionID).html();

value = updatedHtml;

field.find('[name="acf[' + field.data('key') + ']"]').val(value);

return updatedHtml;



}



 /**
 * --------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Double Digit Numbers e.g. "4.1" END
 * 
 * =====================================================================
 */





/**
 * -------------------------------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Numbers that are nested e.g. "4.1.1" : use class "reindex-nested"
 * 
 * --------------------------------------------------------------------------------------------------
 */



function reindexNumbersNested(sectionID, value, field) {
    var numbers = [];
    var elements = [];
    var originalTexts = [];

    // console.log(sectionID);
    // console.log(value);
    // console.log(field);
    

    $('#content-container, #' + sectionID + ' .reindex-nested').each(function(index, element) {
        // Extract the text of each element
        var text = $(element).text().trim();

        // Match the number at the beginning of the text
        let match = text.match(/^(\d+(?:\.\d+)+)/g);
        // let match = text.match(/^(\d+(?:\.\d+)+)\s/g);

        if (match) {
            // Extract the number
            var number = match.toString();

            if (number.split('.').length - 1 === 2) {
                // Split the number into three separate parts
                let parts = number.split('.');
                let integerPart = parts[0];
                let decimalPart1 = parts[1].slice(0, 2);
                let decimalPart2 = parts[1].slice(2);

                // Push the three parts into the numbers array
                numbers.push([integerPart, decimalPart1, decimalPart2]);
            } else {
                // Split the number into integer and decimal parts
                let [integerPart, decimalPart] = number.split('.');
                // Push the integer and decimal parts into the numbers array
                numbers.push([integerPart, decimalPart || '']);
            }

            // Push the number and its element to the respective arrays
            elements.push($(element));

            // Store the original text that follows the number
            var originalText = text.substring(match[0].length).trim();
            originalTexts.push(originalText);

            // console.log (originalTexts);
        }
    });

    let firstIndex = numbers[0];
    var size = Object.keys(firstIndex).length;

    if (size == 2) {
        let separateNumbers = [];
        let beforeSize3 = [];
        let size3Numbers = [];
        let afterSize3 = [];
        let foundSize3 = false;

        // Iterate through numbers to populate separateNumbers and size3Numbers arrays
        numbers.forEach((number) => {
            if (number.length === 3) {
                size3Numbers.push(number);
                foundSize3 = true;
            } else if (!foundSize3) {
                beforeSize3.push(number);
            } else {
                afterSize3.push(number);
            }
        });

        let currentIndex = 1;

        // Update the first number in beforeSize3 to 1
        if (beforeSize3.length > 0) {
            beforeSize3[0][1] = '1';
        }

        // Increment the second number for the rest of the numbers in beforeSize3
        for (let i = 1; i < beforeSize3.length; i++) {
            let updateIndex = currentIndex += 1;
            beforeSize3[i][1] = updateIndex.toString();
        }

        let lastIndexBeforeSize3 = beforeSize3[beforeSize3.length - 1];
        let passedIndexNumber = lastIndexBeforeSize3[1];
        let updateLastNumber = 1;

        // Increment the second number in the size 3 numbers array
        size3Numbers.forEach((number, index) => {
            number[1] = passedIndexNumber;
            number[2] = updateLastNumber.toString();
            updateLastNumber++;
        });

        let currentIndexAfterSize3 = parseInt(passedIndexNumber) + 1;

        afterSize3.forEach((number, index) => {
            let updateIndex = currentIndexAfterSize3++;
            number[1] = updateIndex.toString();
        });

                originalTexts.forEach((text, index) => {
            // Find the position of the extracted number in the original text
            let startIndex = text.indexOf(numbers[index][0]);

            // Replace the extracted number with the modified number in the original text
            let newText = text.substring(0, startIndex) + ' ' + numbers[index].join('.') + ' ' + text.substring(startIndex + numbers[index][0].length);

            // Update the originalTexts array with the modified text
            originalTexts[index] = newText.trim(); // Trim any leading/trailing whitespace
        });

        elements.forEach((element, index) => {
    // Construct the new HTML content with the modified number
    let newHtmlContent =  originalTexts[index];

    // Set the HTML content of the element
    element.html(newHtmlContent);

    // console.log(newHtmlContent);

    value = newHtmlContent;

    // console.log(value);

    
});

        // console.log("Updated Numbers array:", numbers);
        // console.log("Updated Original Texts array:", originalTexts);
    }

   

    $('#' + sectionID + ' p.reindex-nested').each(function() {
        if ($(this).text().trim() === '') {
            $(this).remove();
        }
    });

    var updatedHtmlNested = $('#' + sectionID).html();


    value = updatedHtmlNested;

    // console.log("Updated Value", value);

 
    field.find('[name="acf[' + field.data('key') + ']"]').val(value);

    return value;

    // field.find('.af-calculated-value').val(value);

}


/**
 * --------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Numbers that are nested e.g. "4.1.1" END
 * 
 * ==========================================================================
 */


 /**
 * --------------------------------------------------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Numbers in whole document nested and single - for use when a whole clause is removed
 * :: Doesnt currently support when sections are added or taken away from individual elements as well only when a whole 
 * :: clause is being removed it reindexes whole document - e.g 'Clause 2 being removed from document'
 * 
 * --------------------------------------------------------------------------------------------------------------------
 */

 function reindexNumbersWhole(sectionID, value, field) {
    var allNumbersInfo = [];
    var processedElements = new Set();

    // Collect all numbers into an array with their corresponding original text and 
    //elements and put them into an array so they keep their original key pair value and index in the array

    $('#' + sectionID + ' .reindex-whole').each(function(index, element) {

        var $element = $(element);

        if (!processedElements.has($element.get(0))) {

            processedElements.add($element.get(0));

            var text = $element.text().trim();

            // let match = text.match(/\b(\d+(\.\d+)*)\b/g); // Regex pattern to identify the number element at the beginning of the paragraraph
            let match = text.match(/^\d+(\.\d+)*\b/g);

             // Pushing the numbers into the array
            if (match) {

                match.forEach((number) => {

                    allNumbersInfo.push({
                        number: number,
                        element: $element,
                        originalText: text
                    });

                });
            }
        }
    });

    // Separate single, double, and triple digit numbers to establish a "parent" - single digits

    var singleDigitNumbers = allNumbersInfo.filter(info => info.number.split('.').length === 1);

    var doubleDigitNumbers = allNumbersInfo.filter(info => info.number.split('.').length === 2);

    var tripleDigitNumbers = allNumbersInfo.filter(info => info.number.split('.').length === 3);

    // console.log("Single digit numbers:", singleDigitNumbers);
    // console.log("Double digit numbers:", doubleDigitNumbers);
    // console.log("Triple digit numbers:", tripleDigitNumbers);

    // Function to update the text of an element with the new number when the text is added/subtracted from DOM
    function updateElementText(info, newNumber) {

        info.originalText = info.originalText.replace(new RegExp(`\\b${info.number}\\b`, 'g'), newNumber);

        info.element.text(info.originalText);

        return { ...info, number: newNumber };
    }

    // Reindex single digit numbers and update corresponding double and triple digit numbers - 
    // single is parent and double and triple digits inherit their first number from them

    singleDigitNumbers.forEach((info, index) => {

        let newNumber = (index + 1).toString();
        
        updateElementText(info, newNumber);

        // Update corresponding double digit numbers that sit under the parent 'single digit'

        doubleDigitNumbers.forEach((doubleInfo) => {

            let parentNumber = doubleInfo.number.split('.')[0]; // Split the number at fullstop and identify parent first number

            if (parentNumber === info.number) {

                let childNumber = doubleInfo.number.split('.').slice(1).join('.');

                let newDoubleNumber = `${newNumber}.${childNumber}`;

                updateElementText(doubleInfo, newDoubleNumber + '.'); // Add fullstop back in at the end

            }
        });

        // Update corresponding triple digit numbers that sit under the parent 'single digit'

        tripleDigitNumbers.forEach((tripleInfo) => {

            let parentNumber = tripleInfo.number.split('.')[0]; // Split the number at fullstop and identify parent first number 

            if (parentNumber === info.number) {

                let childNumber = tripleInfo.number.split('.').slice(1).join('.');

                let newTripleNumber = `${newNumber}.${childNumber}`;

                updateElementText(tripleInfo, newTripleNumber + '.'); // Add fullstop back in at the end

            }
        });
    });

    // Update the value of the field of the corresponding ACF Field

    var updatedHtmlNested = $('#' + sectionID).html();

    value = updatedHtmlNested;

    field.find('[name="acf[' + field.data('key') + ']"]').val(value);

    return value;
}

 /**
 * --------------------------------------------------------------------------------------------------------------------
 * 
 * :: Calculates the Reindexing of Numbers in whole document nested and single - for use when a whole clause is removed
 * :: Doesnt currently support when sections are added or taken away from individual elements as well only when a whole 
 * :: clause is being removed it reindexes whole document
 * 
 * ====================================================================================================================
 */



</script>



<script>

/**
 * -------------------------------------------------------
 * 
 * :: Controls the Submission Data After form is submitted 
 * 
 * -------------------------------------------------------
 */

jQuery(function ($) {
// Changing the success message.
acf.addAction('af/form/ajax/submission', function (data, form) {
// if (form.key === 'form_65c106b0244b4') {


// console.log("Form Data", data);


var image = '<svg xmlns="http://www.w3.org/2000/svg" width="21.708" height="21.708" viewBox="0 0 21.708 21.708">' +
'<path id="Icon_awesome-coins" data-name="Icon awesome-coins" d="M0,17.184v1.81c0,1.5,3.646,2.714,8.141,2.714s8.141-1.217,8.141-2.714v-1.81c-1.751,1.234-4.952,1.81-8.141,1.81S1.751,18.418,0,17.184ZM13.568,5.427c4.494,0,8.141-1.217,8.141-2.714S18.062,0,13.568,0,5.427,1.217,5.427,2.714,9.073,5.427,13.568,5.427ZM0,12.737v2.188c0,1.5,3.646,2.714,8.141,2.714s8.141-1.217,8.141-2.714V12.737c-1.751,1.442-4.956,2.188-8.141,2.188S1.751,14.178,0,12.737Zm17.638.466c2.429-.471,4.07-1.344,4.07-2.349V9.044a10.412,10.412,0,0,1-4.07,1.463Zm-9.5-6.419C3.646,6.784,0,8.3,0,10.176s3.646,3.392,8.141,3.392,8.141-1.518,8.141-3.392S12.635,6.784,8.141,6.784Zm9.3,2.387c2.544-.458,4.27-1.357,4.27-2.387V4.973C20.2,6.038,17.617,6.61,14.895,6.746A4.748,4.748,0,0,1,17.439,9.171Z" fill="#000"/>' +
'</svg>';

      var costCredits = <?php echo json_encode($f__cost_of_credits_per_form); ?>;
      var postId = <?php echo json_encode($post_id); ?>;
      var orginalPostTitle = <?php echo json_encode($first_post_title); ?>;
      var pdfCount = <?php echo json_encode($pdf_count); ?>;
      var fileLimit = <?php echo json_encode($file_upload_limit); ?>;
      var currentCredits = <?php echo json_encode($balance); ?>;
      var userId =  <?php echo json_encode($user_id); ?>;
      var textFormCompletion = <?php echo json_encode($form_completion_text); ?>;

      
      costCredits = costCredits ?? 1;

let creditsOrCredit = costCredits > 1 ? 'credits' : 'credit';

data.form_submitted = 'yes';

data.success_message = '<div id="newBalance" style="background:transparent; color:black; display: flex;">' +
  'You have spent ' + costCredits + ' ' + creditsOrCredit + '! Your new balance is <span class="new-credits-span"></span><div>' + image + '</div></div><div style="margin-top: 1rem;">'+ textFormCompletion +'</div>';
// data.success_message = '<div id="newBalance" style="background:transparent; color:black; display: flex;">You have spent one credit! Your new balance is <span> </span>" </div>'

      // Show elements with class 'post_form_button'
      $('.post_form_button').css('display', 'inline-flex');
      $('.box-parent').css('display', 'none');
      $('.box-parent-navigate').css('display', 'none');


      

    //   console.log(postId);

      $.ajax({
                url: scripts_nonce.ajax_url,
                method: 'POST',
                data: {
                    action: 'update_post_meta',
                    nonce: scripts_nonce.nonce,
                    post_id: postId, // Assuming data.post_id contains the post ID
                    user_id: userId,
                    orginal_post_title: orginalPostTitle,
                    pdf_count: pdfCount,
                    file_limit: fileLimit, 
                    cost_credits: costCredits,
                    credits: currentCredits,
                    success_message: data.success_message
                },
                success: function (response) {
                    // Log the response to the console
                    console.log(response);
                    $("#newBalance .new-credits-span").html(response.data.newcredits).show();
                    // $('#html_content').val(response.data.post_content);
                    // var decodedHtmlContent = $("<textarea/>").html(response.data.post_content).text(); // Decode HTML entities
                    $('#html_content').val(response.data.post_content);
                    $('.mycred-my-balance-wrapper div').html(response.data.newcredits);
                    // $('#t-p-header__aws-capacity-value').html(response.data.percentage_remaining);

                    $('html, body').animate({ scrollTop: 0 }, 'fast');

                },
                error: function (xhr, status, error) {
                    // Log any errors to the console
                    console.error(error);
                }
            });
}
);
});

/**
 * ------------------------------------------------------------
 * 
 * :: Controls the Submission Data After form is submitted END
 * 
 * ============================================================
 */


</script>

<?php


function form_post_updated( $post, $form, $args ) {

    $post_id = get_the_ID();

    $header = af_get_field('input_company_name');

    my_print_r($header);

    update_field( 'f__form_header', $header, $post_id );

}
add_action( 'af/form/editing/post_updated/key=form_65c106b0244b4', 'form_post_updated', 10, 3 );


?>


<script>
//   // Get the modal
//   var modal = document.getElementById("myModal");

//   // Get the button that opens the modal
//   var btn = document.getElementById("openModalBtn");

//   // Get the <span> element that closes the modal
//   var span = modal.querySelector(".close");

//   var submitBtn = document.getElementById("close-modal");

//   // When the user clicks on the button, open the modal
//   if (btn) {
//     btn.addEventListener("click", function() {
//         modal.style.display = "block";
//     });
// }

//   // When the user clicks on <span> (x), close the modal
//   span.addEventListener("click", function() {
//     modal.style.display = "none";
//   });

//   // When the user clicks anywhere outside of the modal, close it
//   window.addEventListener("click", function(event) {
//     if (event.target === modal) {
//       modal.style.display = "none";
//     }

//      // When the user clicks the submit button, close the modal
//   submitBtn.addEventListener("click", function() {
//     modal.style.display = "none";
//   });
//   });

// Get the modal
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModalBtn");
    var span = modal.querySelector(".close");
    var submitBtn = document.getElementById("close-modal");

    var recipientEmailInput = document.getElementById('recipient_email');
    var confirmRecipientEmailInput = document.getElementById('confirm_recipient_email');
    var secondRecipientEmailInput = document.getElementById('second_recipient_email');
    var confirmSecondRecipientEmailInput = document.getElementById('confirm_second_recipient_email');
    var secondSenderEmailInput = document.getElementById('second_sender_email');
    var confirmSecondSenderEmailInput = document.getElementById('confirm_second_sender_email');

    var recipientEmailError = document.getElementById('recipient_email_error');
    var secondRecipientEmailError = document.getElementById('second_recipient_email_error');
    var secondSenderEmailError = document.getElementById('second_sender_email_error');

    if (btn) {
        btn.addEventListener("click", function() {
            modal.style.display = "block";
        });
    }

    if (span) {
        span.addEventListener("click", function() {
            modal.style.display = "none";
            resetEmailFields();
        });
    }

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            resetEmailFields();
        }
    });

    function resetEmailFields() {
        var emailFields = [
            recipientEmailInput,
            confirmRecipientEmailInput,
            secondRecipientEmailInput,
            confirmSecondRecipientEmailInput,
            secondSenderEmailInput,
            confirmSecondSenderEmailInput
        ];

        emailFields.forEach(function(field) {
            if (field) {
                field.classList.remove("match", "no-match");
            }
        });

        if (recipientEmailError) recipientEmailError.style.display = "none";
        if (secondRecipientEmailError) secondRecipientEmailError.style.display = "none";
        if (secondSenderEmailError) secondSenderEmailError.style.display = "none";
    }

    function checkEmailMatch() {
        var recipientEmail = recipientEmailInput ? recipientEmailInput.value : '';
        var confirmRecipientEmail = confirmRecipientEmailInput ? confirmRecipientEmailInput.value : '';
        var secondRecipientEmail = secondRecipientEmailInput ? secondRecipientEmailInput.value : '';
        var confirmSecondRecipientEmail = confirmSecondRecipientEmailInput ? confirmSecondRecipientEmailInput.value : '';
        var secondSenderEmail = secondSenderEmailInput ? secondSenderEmailInput.value : '';
        var confirmSecondSenderEmail = confirmSecondSenderEmailInput ? confirmSecondSenderEmailInput.value : '';

        if (recipientEmail && confirmRecipientEmail) {
            if (recipientEmail === confirmRecipientEmail) {
                setFieldStatus(recipientEmailInput, confirmRecipientEmailInput, "match");
                if (recipientEmailError) recipientEmailError.style.display = "none";
            } else {
                setFieldStatus(recipientEmailInput, confirmRecipientEmailInput, "no-match");
                if (recipientEmailError) recipientEmailError.style.display = "block";
            }
        } else {
            resetFieldStatus(recipientEmailInput, confirmRecipientEmailInput);
            if (recipientEmailError) recipientEmailError.style.display = "none";
        }

        if (secondRecipientEmail && confirmSecondRecipientEmail) {
            if (secondRecipientEmail === confirmSecondRecipientEmail) {
                setFieldStatus(secondRecipientEmailInput, confirmSecondRecipientEmailInput, "match");
                if (secondRecipientEmailError) secondRecipientEmailError.style.display = "none";
            } else {
                setFieldStatus(secondRecipientEmailInput, confirmSecondRecipientEmailInput, "no-match");
                if (secondRecipientEmailError) secondRecipientEmailError.style.display = "block";
            }
        } else {
            resetFieldStatus(secondRecipientEmailInput, confirmSecondRecipientEmailInput);
            if (secondRecipientEmailError) secondRecipientEmailError.style.display = "none";
        }

        if (secondSenderEmail && confirmSecondSenderEmail) {
            if (secondSenderEmail === confirmSecondSenderEmail) {
                setFieldStatus(secondSenderEmailInput, confirmSecondSenderEmailInput, "match");
                if (secondSenderEmailError) secondSenderEmailError.style.display = "none";
            } else {
                setFieldStatus(secondSenderEmailInput, confirmSecondSenderEmailInput, "no-match");
                if (secondSenderEmailError) secondSenderEmailError.style.display = "block";
            }
        } else {
            resetFieldStatus(secondSenderEmailInput, confirmSecondSenderEmailInput);
            if (secondSenderEmailError) secondSenderEmailError.style.display = "none";
        }
    }

    function setFieldStatus(field1, field2, status) {
        if (field1 && field2) {
            field1.classList.add(status);
            field1.classList.remove(status === "match" ? "no-match" : "match");
            field2.classList.add(status);
            field2.classList.remove(status === "match" ? "no-match" : "match");
        }
    }

    function resetFieldStatus(field1, field2) {
        if (field1 && field2) {
            field1.classList.remove("match", "no-match");
            field2.classList.remove("match", "no-match");
        }
    }

    if (recipientEmailInput) recipientEmailInput.addEventListener('input', checkEmailMatch);
    if (confirmRecipientEmailInput) confirmRecipientEmailInput.addEventListener('input', checkEmailMatch);
    if (secondRecipientEmailInput) secondRecipientEmailInput.addEventListener('input', checkEmailMatch);
    if (confirmSecondRecipientEmailInput) confirmSecondRecipientEmailInput.addEventListener('input', checkEmailMatch);
    if (secondSenderEmailInput) secondSenderEmailInput.addEventListener('input', checkEmailMatch);
    if (confirmSecondSenderEmailInput) confirmSecondSenderEmailInput.addEventListener('input', checkEmailMatch);
});

</script>





<script>
/**
 * ---------------------------------
 * 
 * :: Clone form items to make pages
 * 
 * ---------------------------------
 */

 function cloneForm () {

    // :: Remove container
    let oldContainerEl = document.querySelector('.render-container');

    if(oldContainerEl) { oldContainerEl.remove(); }

    // :: Create or render container
    const renderContainer = document.createElement('div');
    
    // :: Helper styling
    renderContainer.classList.add('render-container');

    // renderContainer.style.height = 'fit-content';

    // :: Re-add container so we can update contents
    const zoomContainerEl = document.querySelector('#zoom-content');

    zoomContainerEl.prepend(renderContainer); 
   

    // :: 'Page header' dom el
    const pageHeaderEl = document.getElementById('section-header');

    // :: 'Page footer' dom el
    const pageFooterEl = document.getElementById('section-footer');

    // :: ACF Forms container
    const contentContainer = document.getElementById('content-container');
    contentContainer.style.border = '10px solid red';

    // :: ACF Forms container children ( in orange )
    const sections = Array.from(contentContainer.children);

    // :: Array of sections including header and footer!
    const contentSections = [];

    /**
     * --------------------------------------------------------------------------------------------------------
     * 
     * :: Loop through each of the content sections.. push sections 'excluding' header and footer(!) into array
     * 
     * --------------------------------------------------------------------------------------------------------
     */

    sections.forEach(section => {

        let sectionId = section.getAttribute('id');

        // :: loop through sections.. 
        if(sectionId !== 'section-header' && sectionId !== 'section-footer'){ 
            
            contentSections.push(section); 
        
        }

    });

    // console.log('contentSections : ', contentSections)

    /**
     * ---------------------------------------------------------------------------------------------------------
     * 
     * /:: Loop through each of the content sections.. push sections 'excluding' header and footer(!) into array
     * 
     * =========================================================================================================
     */    


     /**
     * ----------------------------------------------------------------
     * 
     * :: Loop through each content section and extract direct children
     * 
     * ----------------------------------------------------------------
     */

    let processChildren = [];

    contentSections.forEach(contentSectionEl => {

        let sectionChildren = Array.from(contentSectionEl.children); // :: array of immediate children

        sectionChildren.forEach( sectionChild => { // :: Loop through immediate children

            // console.log(sectionChild);

            // sectionChild.style.marginBottom = '1rem';

            // :: Clone child..
            // let clonedChild = sectionChild.cloneNode(true);

            processChildren.push(sectionChild);



        });

    });   


    // console.log('processChildren : ', processChildren);

    /**
     * -----------------------------------------------------------------
     * 
     * /:: Loop through each content section and extract direct children
     * 
     * =================================================================
     */

    /**
     * ---------------------------
     * 
     * :: Sort children into pages array
     * 
     * ---------------------------
     */

    // function calculateInnerSize() {
    //     // Get the width of the content container
    //     const contentContainerWidth = document.getElementById('content-container').offsetWidth;

    //     // Calculate the inner width with margins
    //     const innerWidthWithMargins = contentContainerWidth;

    //     // Adjust the inner height based on the aspect ratio
    //     const aspectRatioHeight = 0.71; // Adjust as needed
    //     let innerHeight = innerWidthWithMargins / aspectRatioHeight;

    //     // Subtract 1cm for the inner margin (assuming 1cm = 37.8px)
    //     innerHeight -= 37.8; // Adjust as needed

    //     // Convert 2.604vw to pixels
    //     const vwToPixels = contentContainerWidth / 100; // Assuming viewport width is 100vw
    //     const headerFooterHeight = 2.604 * vwToPixels; // Convert vw to pixels

    //     // Subtract header and footer height
    //     const innerHeightWithMargin = innerHeight - headerFooterHeight * 2; // Subtract from top and bottom

    //     // Return the inner size
    //     return { width: innerWidthWithMargins, height: innerHeightWithMargin };
    // }

    // // Usage
    // const innerSize = calculateInnerSize();

    // function calculateLimit() {

    //     // Get the inner height from the calculated inner size
    //     const innerHeight = calculateInnerSize().height;

    //     // Return the inner height as the limit
    //     return innerHeight;
    // }

    let 
        limit = 1200,

        pageItems = [],
    
        pages = [],
    
        pagesIndex = 0,
    
        deletItemsArray = [],
        
        currentPageIndex = 0;

    if(processChildren.length) {

        function processArray() {

            let 
                
                leftOversArray = processChildren.slice(), // Copy processChildren array

                pageItems = [],

                totalHeight = 0,

                pageBreakEncountered = false;


            let i = 0;

            processChildren.forEach(processChild => {

                let 
                
                    styles = getComputedStyle(processChild),

                    marginBottom = parseFloat(styles['marginBottom']),

                    elCompleteHeight = Math.ceil(processChild.offsetHeight + marginBottom);

                // console.log('Element Height ' + i + ' : ', elCompleteHeight);
                // console.log(processChild);

                ++i;

            });

            while (leftOversArray.length > 0) {

                totalHeight = 0;

                pageItems = [];

                pageBreakEncountered = false;

                for (let i = 0; i < leftOversArray.length; i++) {

                    let 
                    
                        processChild = leftOversArray[i],
                    
                        styles = getComputedStyle(processChild),
                    
                        marginBottom = parseFloat(styles['marginBottom']),
                    
                        elCompleteHeight = Math.ceil(processChild.offsetHeight + marginBottom);

                    // console.log(`Element Height: ${elCompleteHeight}`);

                    if (processChild.classList.contains('page-break')) {
                        
                        // Start a new page after encountering a page break

                        pageBreakEncountered = true;

                        leftOversArray.splice(i, 1); // Remove the page-break element
                    
                        break;

                    } else {

                        let heightExceedsLimit = totalHeight + elCompleteHeight > limit;

                        let elementFitsOnPage = !heightExceedsLimit || totalHeight === 0; // Ensure at least one element fits on each page

                        if (elementFitsOnPage) {

                            pageItems.push(processChild.outerHTML);

                            totalHeight += elCompleteHeight;

                            leftOversArray.splice(i, 1); // Remove the processed element from leftOversArray

                            i--; // Adjust the index since we removed an element

                        } else {

                            break; // Break if the current item cannot fit on the current page

                        }
                    }

                } 

                // If a page break was encountered or if the last set of elements doesn't fit on the current page
                if (pageItems.length > 0 || (leftOversArray.length === 0 && pageBreakEncountered)) {

                    pages.push(pageItems);

                }

            }
        
        }

        processArray();

        /**
         * ----------------------------
         * 
         * /:: Sort children into pages
         * 
         * ============================
         */    


        /**
         * ----------------------
         * 
         * :: Render pages in DOM
         * 
         * ----------------------
         */

        pages.forEach(function (page, i) {

            // let pageBreak = document.querySelectorAll("page-break");

            // console.log(pageBreak);
            
            
            // :: Create page div
            let pageToRender = document.createElement('div');
            
            // pageToRender.style.border = "10px solid green";

            pageToRender.classList.add('rendered-page__' + i + '');

            renderContainer.appendChild(pageToRender); // :: Add page container to DOM

            let pageToRenderIndex = '.rendered-page__' + i;

            let thePage = document.querySelector(pageToRenderIndex);

            // console.log(thePage);

            let pageHeight = window.getComputedStyle(thePage);

            // console.log(pageHeight);

            let heightPage = pageHeight.getPropertyValue('height');

            // console.log(heightPage);
            

                /**
                 * :: Resource : https://gomakethings.com/converting-a-string-into-markup-with-vanilla-js/
                 * 
                 * Convert a template string into HTML DOM nodes
                 * @param  {String} str The template string
                 * @return {Node}       The template HTML
                 */

                var support = (function () {

                    if (!window.DOMParser) return false;

                        var parser = new DOMParser();

                    try {

                        parser.parseFromString('x', 'text/html');

                    } 

                    catch(err) {

                        return false;

                    }

                    return true;

                })();

                /**
                * Convert a template string into HTML DOM nodes
                * @param  {String} str The template string
                * @return {Node}       The template HTML
                */
                // var stringToHTML = function (str) {

                //     // Otherwise, fallback to old-school method
                //     var dom = document.createElement('div');

                //     dom.innerHTML = str;

                //     return dom;

                // };    
            
                        var stringToHTML = function (str) {
                    // Create a temporary div element
                    var tempDiv = document.createElement('div');
            
                    tempDiv.innerHTML = str;

                    // Check if the temporary div contains an element with the class 'float-center'
                    var floatCenterElement = tempDiv.querySelector('.float-center');

                    let orderFormsTableDiv = tempDiv.querySelector('.order-forms-table-display');

                    if (floatCenterElement) {

                        var parentDiv = floatCenterElement.parentNode;

                        parentDiv.classList.add('float-parent');

                    } else if (orderFormsTableDiv) {
                        
                        var parentDivOrder = orderFormsTableDiv.parentNode;

                        parentDivOrder.classList.add('order-table-div');

                        parentDivOrder.style.marginBottom = '0';

                        
                    } else {
                    
                        var newDiv = document.createElement('div');

                        tempDiv.appendChild(newDiv);
                    }

                    // Return the modified temporary div
                    return tempDiv;
                };
                
            
            // Add page items
            page.forEach(pageItem => {

                

                thePage.append(stringToHTML(pageItem));

            

            });



            var headerHTML = stringToHTML(pageHeaderEl.innerHTML);

            headerHTML.classList.add('section-header'); // Add your desired class name here

            thePage.prepend(headerHTML); // Add page header

            var footerHTML = stringToHTML(pageFooterEl.innerHTML);

            footerHTML.classList.add('section-footer'); // Add your desired class name here

            thePage.append(footerHTML);

        });  

        /**
         * -----------------------
         * 
         * /:: Render pages in DOM
         * 
         * =======================
         */             

    }

} // /cloneForm

/**
* ----------------------------------
* 
* /:: Clone form items to make pages
* 
* ==================================
*/

</script>

<script>



// document.addEventListener('DOMContentLoaded', function() {

//     if (window.innerWidth < 900) { // Adjust this value as needed

//         setTimeout(function() {

//             const btnZoomIn = document.getElementById("zoomIn");
//             const btnZoomOut = document.getElementById("zoomOut");
//             const zoomContent = document.getElementById("zoom-content");

//             let 
//                 zoomLevel = 1,
//                 rootFontSize = 1, // Initial root font size in vw
//                 lineHeightVar = 1.6,  // Initial root line-height in vw
//                 rootFontSizeHeader = 0.6; 

//             function applyZoomStyles() {    
//                 zoomContent.setAttribute('data-font-size', rootFontSize + 'vw');
//                 zoomContent.setAttribute('data-line-height', lineHeightVar + 'vw');
//                 zoomContent.setAttribute('data-header-font', rootFontSizeHeader + 'vw');

//             }

//             function applyStylesFromZoomContent() {
//                 const fontSize = zoomContent.getAttribute('data-font-size');
//                 const lineHeight = zoomContent.getAttribute('data-line-height');
//                 const headerFontSize = zoomContent.getAttribute('data-header-font');

//                 // console.log(headerFontSize);

//                 const renderContainer = document.querySelector('.render-container');
//                 const renderContainerHeader = document.querySelectorAll('.render-container .section-header p');
//                 const renderContainerFooter = document.querySelectorAll('.render-container .section-footer p');

//                 if (renderContainer && fontSize) {

//                     renderContainer.style.fontSize = fontSize;

//                     renderContainerHeader.forEach(element => {
    
//                      element.style.fontSize = headerFontSize;

//                     });

//                     renderContainerFooter.forEach(element => {
    
//                     element.style.fontSize = headerFontSize;

//                     });
//                 }

//                 if (renderContainer && lineHeight) {

//                     renderContainer.style.lineHeight = lineHeight;

//                     renderContainerHeader.forEach(element => {
    
//                         element.style.lineHeight = lineHeight;

//                     });

//                     renderContainerFooter.forEach(element => {

//                     element.style.lineHeight = lineHeight;

//                     });

//                 }
//             }

//             // Mutation observer to watch for changes in render-container or its parent nodes
//             const observer = new MutationObserver(mutationsList => {

//                 for (const mutation of mutationsList) {

//                     if (mutation.type === 'childList') {

//                         applyStylesFromZoomContent();

//                         break; // Exit loop after applying styles once
//                     }
//                 }
//             });

//             observer.observe(document.documentElement, { 
//                 childList: true, 
//                 subtree: true,
//                 attributes: true,
//                 attributeFilter: ['class'] // Watch for changes in class attributes which might affect render-container
//             });

//             btnZoomIn.addEventListener("click", () => {
//                 if (zoomLevel < 2) {
//                     zoomLevel += 0.1;
//                     rootFontSize += 0.1;
//                     lineHeightVar += 0.14;
//                     rootFontSizeHeader += 0.1;
//                     applyZoomStyles();
//                     applyStylesFromZoomContent();
//                 }
//                 // console.log("Zoom In clicked");
//             });

//             btnZoomOut.addEventListener("click", () => {
//                 if (zoomLevel > 1) {
//                     zoomLevel -= 0.1;
//                     rootFontSize -= 0.1;
//                     lineHeightVar -= 0.14;
//                     rootFontSizeHeader -= 0.1;                    
//                     applyZoomStyles();
//                     applyStylesFromZoomContent();
//                 }
//                 // console.log("Zoom Out clicked");
//             });

//             // Initial application of zoom styles
//             applyZoomStyles();
//             applyStylesFromZoomContent();

//         }, 1000); // You can adjust the timeout duration if needed
//     }
// });
</script>


<script>

/**
 * ----------------------------------------------------
 * 
 * :: Prevents the return key from submitting the form
 * 
 * ====================================================
 */


jQuery(function($) {
  
  // Add your form key here
  const formKey = 'form_62d743d9eca45';
  
  $('.af-form input').on('keydown', function(e) {
    if (e.originalEvent.key === 'Enter') {
      e.preventDefault(); // Preventing the default action
      if (af.forms[formKey] && af.forms[formKey].$next_button) {
        af.forms[formKey].$next_button.click();
      }
      return false;
    }
  });
});


/**
 * ----------------------------------------------------
 * 
 * :: Prevents the return key from submitting the form END
 * 
 * ====================================================
 */

     
</script>


<script>


/**
 * -------------------------------------------------------------------------------------------------
 * 
 * :: Handles the scrollspy and highlighting of text as user navigates : use class "text-highlight-#"
 * 
 * -------------------------------------------------------------------------------------------------
 */

 function extractIndexFromClass(className) {

    // :: Extract the index from the class name
    let index = className.match(/field-index-(\d+)/);
    // console.log(className);

    return index ? parseInt(index[1]) : null;
    // console.log(index);

}

// :: clear highlights
function clearAllActiveTextHighlights (){

    // let textHighlightActiveEls = document.querySelectorAll('.render-container [class*="text-highlight-"].active');

    let 
    
        textHighlightActiveEls = document.querySelectorAll('.render-container .active');

    if(textHighlightActiveEls){

        textHighlightActiveEls.forEach(textHighlightActiveEl => {

            textHighlightActiveEl.classList.remove('active');

        });

    }

}

// :: Activate text highlights
function activateTextHighlights () {

    clearAllActiveTextHighlights ();

    // :: Get all questions from side bar
    let sidebarQuestionEls = document.querySelectorAll('.acf-form-fields > [class*="field-index-"]');
    // console.log( 'sidebarQuestionEls : ', sidebarQuestionEls);

    // :: Loop through all questions
    sidebarQuestionEls.forEach(function(question) {

        // console.log('question : ', question);

        // :: If question visible
        if((question.style.display == '') || (question.style.display == 'block')){

            // :: highlight it's span in the rendered form
            // console.log('question : ', question);

            let 
                questionIndex           = extractIndexFromClass(question.className), // :: get the question index 

                // :: Get corrosponding el in 'content-render'
                textHighlightTargetEl   = document.querySelector('.render-container .text-highlight-' + questionIndex); 

            // :: New
            varDataKeyVal = question.dataset.key;                

            // console.log('test123  000 varDataKeyVal', varDataKeyVal);
            

            // :: No index number (legacy)
            if (!textHighlightTargetEl) {

                // :: Get corrosponding el in 'content-render'
                textHighlightTargetEl   = document.querySelector('.render-container .' + varDataKeyVal); 

            }     
            
            // console.log('test123  aaa textHighlightTargetEl', textHighlightTargetEl);

            if(textHighlightTargetEl) {
                
                // :: If 'has-siblings'
                if(textHighlightTargetEl.classList.contains('has-siblings')){

                    let 
                    
                        // :: No index number (legacy)
                        varSyblingEls = document.querySelectorAll('.text-highlight-' + questionIndex + '__sibling');

                    // console.log('test123 xxx varSyblingEls', varSyblingEls);

                    // :: find relative siblings (new)
                    if(varSyblingEls.length == 0){
                    
                        varSyblingEls = document.querySelectorAll('.' + varDataKeyVal + '__sibling');

                    }

                    // console.log('test123 yyy varSyblingEls', varSyblingEls);

                    // :: Highlight sibilings
                    varSyblingEls.forEach(element => {
                        
                        element.classList.add('active');

                    });

                };

                textHighlightTargetEl.classList.add('active');

                const 
                    
                    navigateCheckbox = document.getElementById('navigateYes'),

                    screenWidth = window.innerWidth;

                if (navigateCheckbox.checked && screenWidth > 900) {

                    // :: Scroll to text-highlight.active
                    let 
                    
                        zoomContent               = document.querySelector('#zoom-content'),

                        renderContainer           = document.querySelector('.render-container'),

                        renderContainerRect           = renderContainer.getBoundingClientRect(),

                        textHighlightRect   = textHighlightTargetEl.getBoundingClientRect(),

                        offset              = 20,

                        hozRelativeCoordinates = { x: textHighlightRect.left - renderContainerRect.left - offset };
                        relativeCoordinates = { y: textHighlightRect.top - renderContainerRect.top - offset };

                    if (screenWidth > 900) {

                        zoomContent.scrollTo({
                            top: relativeCoordinates.y,
                            behavior: 'instant'
                        });
                    } else {
                        zoomContent.scrollTo({
                            left: hozRelativeCoordinates.x,
                            top: relativeCoordinates.y,
                            behavior: 'instant'
                        });
                    }
            
                 }

            }
        }

    });

}

// :: Switching between form pages 
acf.addAction( 'af/form/page_changed', function( newPage, previousPage, form ) {

    activateTextHighlights();

});



/**
 * ------------------------------------------------------------------------------------------------------
 * 
 * :: Handles the scrollspy and highlighting of text as user navigates : use class "text-highlight-#" END
 * 
 * ======================================================================================================
 */



</script>



<script>

/**
 * -----------------------------------------------------------------
 * 
 * :: Script to handle accordion at the top of the page [read more]
 * 
 * ------------------------------------------------------------------
 */

document.addEventListener("DOMContentLoaded", function() {

  const accordionTrigger = document.getElementById('accordion-trigger');

  const readMoreContent = document.querySelector('.read_more');

  accordionTrigger.addEventListener('click', function(event) {

    event.preventDefault();

    readMoreContent.classList.toggle('show');

    if (readMoreContent.classList.contains('show')) {

      accordionTrigger.textContent = "[read less...]";

    } else {

      accordionTrigger.textContent = "[read more...]";

    }

  });

});

/**
 * --------------------------------------------------------------------
 * 
 * :: Script to handle accordion at the top of the page [read more] END
 * 
 * ====================================================================
 */

</script>
