<?php
$post_id = get_the_ID();
$post_title = get_the_title();
$htmlContent = get_the_content();
$post_object = get_post($post_id);

// my_print_r($docusign_envelope_method);


$original_post_title = get_post_meta($post_id, 'original_post_title', true);
if (!empty($original_post_title)) {
    // $original_post_title is an array, you can access its value like this
    $first_post_title = $original_post_title;
    // This should print 'Anti Bribery Policy'
}
// $post_object = get_post_field('OBJECT', $post_id);
// $htmlContent = '<p>testing 123</p>';
// $htmlContent = isset($_POST['html_content']) ? htmlspecialchars_decode($_POST['html_content']) : '';
$current_user = wp_get_current_user();
$user_id      = $current_user->ID;
$user_first_name = $current_user->first_name;
$user_last_name  = $current_user->last_name;
$r = rand();
$docusign_grid_style = '';

// my_print_r($htmlContent);

$signature_x_position = get_field('x_position');
$signature_y_position = get_field('y_position');
$signature_page_number = get_field('page_number');

if ($docusign_envelope_method == 'docusign-witness') {

  $docusign_grid_style = 'style = "display: grid; grid-template-columns: repeat(2, 1fr);"';

} else {
  $docusign_grid_style = '';
}
// my_print_r($signature_x_position);
// my_print_r($signature_y_position);
// my_print_r($signature_page_number);

// my_print_r($htmlContent);
// my_print_r($post_id);
// my_print_r($post_title);
// my_print_r($post_object);


// my_print_r($user_first_name);
// my_print_r($user_last_name);
// my_print_r($user_id);
// my_print_r($r);


?>
<div class="modal-flex" style="">
<div class="
        t-p-acf-t2-ct-text__column-of-text 

        t-p-acf-t2-ct-text__title-size-small    
    
        t-p-acf-t2-ct-text  ">

<h2>Send to docusign</h2>

  <form id="pdfGenerationForm" method="post" action="">

      <!-- Include the $htmlContent variable as a hidden input field -->
      <input id="html_content" type="hidden" name="html_content" value="">
      <input id="docusign-envelope-method" type="hidden" name="docusign-envelope-method" value="<?= $docusign_envelope_method ?>">
      <input id="signature-x" type="hidden" name="signature_x" value="">
      <input id="signature-y" type="hidden" name="signature_y" value="">
      <input id="signature-page-number" type="hidden" name="signature_page_number" value="">

      <?php 
      if ($docusign_envelope_method == 'docusign-witness') {
      ?>
      <p><strong>Receiving Party's Information</strong></p>

      <div class="docusign-grid" <?= $docusign_grid_style ?>>
      <?php } ?>

      <div>
      <label for="recipient_name">Recipient name:</label>
      <input type="text" id="recipient_name" name="recipient_name" value=""><br><br>

      <label for="recipient_email">Recipient email:</label>
      <input type="email" id="recipient_email" name="recipient_email" required><br><br>

      <label for="confirm_recipient_email">Confirm Recipient email:</label>
      <input type="email" id="confirm_recipient_email" name="confirm_recipient_email" required><br><br>
      <div id="recipient_email_error" class="error">The emails do not match. Please enter the same email twice.</div>
      </div>

      <?php 
      if ($docusign_envelope_method == 'docusign-witness') {
      ?>

     
    
      <div>
      <label for="second_recipient_name">2nd Sig. Recipient Name:</label>
      <input type="text" id="second_recipient_name" name="second_recipient_name" value="" required><br><br>

      <label for="second_recipient_email">2nd Sig. Recipient Email:</label>
      <input type="text" id="second_recipient_email" name="second_recipient_email" value="" required><br><br>


      <label for="confirm_second_recipient_email">Confirm 2nd Recipient Email:</label>
      <input type="email" id="confirm_second_recipient_email" name="confirm_second_recipient_email"><br><br>
      <div id="second_recipient_email_error" class="error">The emails do not match. Please enter the same email twice.</div>
      </div>

      <!-- <div>
      <label for="witness_recipient_name">Witness for recipient Name:</label>
      <input type="text" id="witness_recipient_name" name="witness_recipient_name" value=""><br><br>

      <label for="witness_recipient_email">Witness for recipient Email:</label>
      <input type="email" id="witness_recipient_email" name="witness_recipient_email"><br><br>
      </div> -->
      </div>
      </div>

      <div style="margin-top: 1rem;">
      <p><strong>Sending Party's Information</strong></p>
      <div class="docusign-grid" <?= $docusign_grid_style ?>>
      <div>
      <label for="second_sender_name">2nd Sig. Sender Name:</label>
      <input type="text" id="second_sender_name" name="second_sender_name" value="" required><br><br>

      <label for="second_sender_email">2nd Sig. Sender Email:</label>
      <input type="text" id="second_sender_email" name="second_sender_email" value="" required><br><br>

      <label for="confirm_second_sender_email">Confirm 2nd Sig. Sender Email:</label>
      <input type="email" id="confirm_second_sender_email" name="confirm_second_sender_email"><br><br>
      <div id="second_sender_email_error" class="error">The emails do not match. Please enter the same email twice.</div>
      </div>

      <!-- <div>
      <label for="witness_sender_name">Witness for Sender Name:</label>
      <input type="text" id="witness_sender_name" name="witness_sender_name" value=""><br><br>

      <label for="witness_sender_email">Witness for Sender Email:</label>
      <input type="email" id="witness_sender_email" name="witness_sender_email"><br><br>
      </div> -->
      </div>
      </div>

      <div style="margin-top: 1rem;">
      <p><strong>Email Subject</strong></p>
      <?php
      }
      ?>

      <div>
      <label for="email_subject">Email Subject:</label>
      <input type="text" id="email_subject" name="email_subject"><br><br>
    </div>

    <?php 
      if ($docusign_envelope_method == 'docusign-witness') {
      ?>
     </div>
      <?php } ?>

      <input type="hidden" name="user_id" value="<?= $user_id ?>">
      <input type="hidden" name="user_first_name" value="<?= $user_first_name ?>">
      <input type="hidden" name="user_last_name" value="<?= $user_last_name ?>">
      <input type="hidden" name="rand" value="<?= $r ?>">

      <button id="close-modal" type="submit" name="generate_pdf_docusign" class="

      t-p-acf-t2-ct-button-group__button 

      t-p-acf-t2-ct-button-group__button-standard 

      " style="color: rgb(255, 255, 255); background-color: rgb(242, 19, 100); transition: background 0.5s;" data-button-background-color="#f21364" data-button-hover-color="#03a689" data-modal-link-post-id="1392">
      Send Envelope</button>


      <?php wp_nonce_field('trigger_envelope_function_action', 'trigger_envelope_function_nonce'); ?>
      <input type="hidden" name="action" value="handle_trigger_envelope_function">
  </form>
</div>
</div>
<div id="pdfDump"></div>

<!-- Create an iframe to load the PDF content -->
<iframe id="pdfFrame" name="pdfFrame" style="display: none;"></iframe>

<script>
    // var signatureXPos = document.getElementById('signature-x').value = "<?php echo $signature_x_position; ?>";
    // var signatureYPos = document.getElementById('signature-y').value = "<?php echo $signature_y_position; ?>";
    // var signaturePageNumber = document.getElementById('signature-page-number').value = "<?php echo $signature_page_number; ?>";

var signatureXPos = "<?php echo isset($signature_x_position) ? $signature_x_position : ''; ?>";
var signatureYPos = "<?php echo isset($signature_y_position) ? $signature_y_position : ''; ?>";
var signaturePageNumber = "<?php echo isset($signature_page_number) ? $signature_page_number : ''; ?>";

document.getElementById('signature-x').value = signatureXPos;
document.getElementById('signature-y').value = signatureYPos;
document.getElementById('signature-page-number').value = signaturePageNumber;
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('pdfGenerationForm');
    var recipientEmailInput = document.getElementById('recipient_email');
    var confirmRecipientEmailInput = document.getElementById('confirm_recipient_email');
    var secondRecipientEmailInput = document.getElementById('second_recipient_email');
    var confirmSecondRecipientEmailInput = document.getElementById('confirm_second_recipient_email');
    var secondSenderEmailInput = document.getElementById('second_sender_email');
    var confirmSecondSenderEmailInput = document.getElementById('confirm_second_sender_email');

    var recipientEmailError = document.getElementById('recipient_email_error');
    var secondRecipientEmailError = document.getElementById('second_recipient_email_error');
    var secondSenderEmailError = document.getElementById('second_sender_email_error');

    function validateForm() {
        var isValid = true;
        var recipientEmail = recipientEmailInput ? recipientEmailInput.value : '';
        var confirmRecipientEmail = confirmRecipientEmailInput ? confirmRecipientEmailInput.value : '';
        var secondRecipientEmail = secondRecipientEmailInput ? secondRecipientEmailInput.value : '';
        var confirmSecondRecipientEmail = confirmSecondRecipientEmailInput ? confirmSecondRecipientEmailInput.value : '';
        var secondSenderEmail = secondSenderEmailInput ? secondSenderEmailInput.value : '';
        var confirmSecondSenderEmail = confirmSecondSenderEmailInput ? confirmSecondSenderEmailInput.value : '';

        // Validate recipient email
        if (recipientEmail && confirmRecipientEmail && recipientEmail !== confirmRecipientEmail) {
            if (recipientEmailError) recipientEmailError.style.display = "block";
            isValid = false;
        } else {
            if (recipientEmailError) recipientEmailError.style.display = "none";
        }

        // Validate second recipient email
        if (secondRecipientEmailInput && confirmSecondRecipientEmailInput) {
            if (secondRecipientEmail && confirmSecondRecipientEmailInput.value && secondRecipientEmail !== confirmSecondRecipientEmailInput.value) {
                if (secondRecipientEmailError) secondRecipientEmailError.style.display = "block";
                isValid = false;
            } else {
                if (secondRecipientEmailError) secondRecipientEmailError.style.display = "none";
            }
        }

        // Validate second sender email
        if (secondSenderEmailInput && confirmSecondSenderEmailInput) {
            if (secondSenderEmail && confirmSecondSenderEmailInput.value && secondSenderEmail !== confirmSecondSenderEmailInput.value) {
                if (secondSenderEmailError) secondSenderEmailError.style.display = "block";
                isValid = false;
            } else {
                if (secondSenderEmailError) secondSenderEmailError.style.display = "none";
            }
        }

        return isValid;
    }

    function handleSubmit(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        } else {
            // Optionally set hidden input values (if needed)
            document.getElementById('recipient_name').setAttribute('value', document.getElementById('recipient_name').value);
            if (recipientEmailInput) document.getElementById('recipient_email').setAttribute('value', recipientEmailInput.value);
            document.getElementById('email_subject').setAttribute('value', document.getElementById('email_subject').value);
            if (document.getElementById('second_recipient_name')) document.getElementById('second_recipient_name').setAttribute('value', document.getElementById('second_recipient_name').value);
            if (secondRecipientEmailInput) document.getElementById('second_recipient_email').setAttribute('value', secondRecipientEmailInput.value);
            if (document.getElementById('second_sender_name')) document.getElementById('second_sender_name').setAttribute('value', document.getElementById('second_sender_name').value);
            if (secondSenderEmailInput) document.getElementById('second_sender_email').setAttribute('value', secondSenderEmailInput.value);
        }
    }

    form.addEventListener('submit', handleSubmit);

    // Setup MutationObserver to monitor changes in input fields
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'value') {
                validateForm(); // Validate whenever an attribute changes
            }
        });
    });

    // Observe changes to the form fields
    var config = { attributes: true, subtree: true };
    if (recipientEmailInput) observer.observe(recipientEmailInput, config);
    if (confirmRecipientEmailInput) observer.observe(confirmRecipientEmailInput, config);
    if (secondRecipientEmailInput) observer.observe(secondRecipientEmailInput, config);
    if (confirmSecondRecipientEmailInput) observer.observe(confirmSecondRecipientEmailInput, config);
    if (secondSenderEmailInput) observer.observe(secondSenderEmailInput, config);
    if (confirmSecondSenderEmailInput) observer.observe(confirmSecondSenderEmailInput, config);
});

// function submitForm(event) {

//     event.preventDefault(); // Prevent default form submission

//     var recipientName = document.getElementById('recipient_name').value;
//     var recipientEmail = document.getElementById('recipient_email').value;
//     var emailSubject = document.getElementById('email_subject').value;


//     // var witnessRecipientName = document.getElementById('witness_recipient_name').value;
//     // var witnessRecipientEmail = document.getElementById('witness_recipient_email').value;

//     // var witnessSenderName = document.getElementById('witness_sender_name').value;
//     // var witnessSenderEmail = document.getElementById('witness_sender_email').value;

//     var secondSenderName = document.getElementById('second_sender_name').value;
//     var secondSenderEmail = document.getElementById('second_sender_email').value;

//     var secondRecipientName = document.getElementById('second_recipient_name').value;
//     var secondRecipientEmail = document.getElementById('second_recipient_email').value;



//     var htmlContent = document.getElementById('html_content').value;

  

//     var signatureXPos = document.getElementById('signature-x').value = "<?php echo $signature_x_position; ?>";
//     var signatureYPos = document.getElementById('signature-y').value = "<?php echo $signature_y_position; ?>";
//     var signaturePageNumber = document.getElementById('signature-page-number').value = "<?php echo $signature_page_number; ?>";

 


//     // Set the form values dynamically
//     document.getElementById('recipient_name').setAttribute('value', recipientName);
//     document.getElementById('recipient_email').setAttribute('value', recipientEmail);
//     document.getElementById('email_subject').setAttribute('value', emailSubject);

//     // document.getElementById('witness_recipient_name').setAttribute('value', witnessRecipientName);
//     // document.getElementById('witness_recipient_email').setAttribute('value', witnessRecipientEmail);

//     // document.getElementById('witness_sender_name').setAttribute('value', witnessSenderName);
//     // document.getElementById('witness_sender_email').setAttribute('value', witnessSenderEmail);

//     document.getElementById('second_sender_name').setAttribute('value', secondSenderName);
//     document.getElementById('second_sender_email').setAttribute('value', secondSenderEmail);

//     document.getElementById('second_recipient_name').setAttribute('value', secondRecipientName);
//     document.getElementById('second_recipient_email').setAttribute('value', secondRecipientEmail);

    

//     document.getElementById('pdfGenerationForm').addEventListener('submit', function(event) {
//     var recipientEmail = document.getElementById('recipient_email').value;
//     var confirmRecipientEmail = document.getElementById('confirm_recipient_email').value;

//     if (recipientEmail !== confirmRecipientEmail) {
//         event.preventDefault();
//         alert("The emails do not match. Please enter the same email twice.");
//     }
// });
//     // console.log(signatureXPos);
//     // console.log(signatureYPos);
//     // console.log(signaturePageNumber);
//     // Submit the form
//     // document.getElementById('pdfGenerationForm').submit();
// }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_pdf_docusign'])) {
    
    // Retrieve data from form fields
    $recipient_name = isset($_POST['recipient_name']) ? $_POST['recipient_name'] : '';
    $recipient_email = isset($_POST['recipient_email']) ? $_POST['recipient_email'] : '';
    $email_subject = isset($_POST['email_subject']) ? $_POST['email_subject'] : '';

    // if ($docusign_envelope_method == 'share_with_docusign_witness') {
    // $witness_recipient_name = isset($_POST['witness_recipient_name']) ? $_POST['witness_recipient_name'] : '';
    // $witness_recipient_email = isset($_POST['witness_recipient_email']) ? $_POST['witness_recipient_email'] : '';

    // $witness_sender_name = isset($_POST['witness_sender_name']) ? $_POST['witness_sender_name'] : '';
    // $witness_sender_email = isset($_POST['witness_sender_email']) ? $_POST['witness_sender_email'] : '';

    $second_sender_name = isset($_POST['second_sender_name']) ? $_POST['second_sender_name'] : '';
    $second_sender_email = isset($_POST['second_sender_email']) ? $_POST['second_sender_email'] : '';

    $second_recipient_name = isset($_POST['second_recipient_name']) ? $_POST['second_recipient_name'] : '';
    $second_recipient_email = isset($_POST['second_recipient_email']) ? $_POST['second_recipient_email'] : '';
    // }

    $docusign_envelope_method = isset($_POST['docusign-envelope-method']) ? $_POST['docusign-envelope-method'] : '';
    // $htmlContent = isset($_POST['html_content']) ? ($_POST['html_content']) : '';

    $signature_x_position = isset($_POST['signature_x']) ? $_POST['signature_x'] : '';
    $signature_y_position = isset($_POST['signature_y']) ? $_POST['signature_y'] : '';
    $signature_page_number = isset($_POST['signature_page_number']) ? $_POST['signature_page_number'] : '';


    generatePDFFromHTML($htmlContent, $recipient_name, $recipient_email, $email_subject, $user_id, $user_first_name, $user_last_name, $r, $first_post_title, $signature_x_position, $signature_y_position, $signature_page_number, $docusign_envelope_method, $second_sender_name, $second_sender_email, $second_recipient_name, $second_recipient_email );

}

// my_print_r($htmlContent);

    // Function to generate the PDF
    function generatePDFFromHTML($htmlContent, $recipientName, $recipientEmail, $emailSubject, $user_id, $user_first_name, $user_last_name, $r, $first_post_title, $signature_x_position, $signature_y_position, $signature_page_number, $docusign_envelope_method, $second_sender_name, $second_sender_email, $second_recipient_name, $second_recipient_email ) {
      // Include Dompdf autoload file
      $post_title = get_the_title();
      $filename = $post_title;

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
      // Initialize Dompdf
      $options = new Dompdf\Options();
      $options->set('isHtml5ParserEnabled', true);
      $options->set('isRemoteEnabled', TRUE);
      $options->set('isPhpEnabled', true);
      $options->set('isFontSubsettingEnabled', true);
      $options->setDefaultFont('Helvetica');
      $dompdf = new Dompdf\Dompdf($options);

      $htmlContent .= "<style> 
      
      @page { margin-top: 2cm; }
      body { font-family: Helvetica, sans-serif; }

      table {
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
            color: #fff !important;
          }

          .nameOfCustomer {
            color: #fff !important;
          }

          .dateOfCustomer {
            color: #fff !important;
          }
      }

      .invisible-table td {
        vertical-align: top;
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
            border-top:10px solid red !important;
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
          
          .bold-text {
            font-weight: 700;
          }

          .indent-paragraph {
            margin-left: 2rem;
          }
          
          </style>";
        
      // Load HTML content into Dompdf
      $dompdf->loadHtml($htmlContent);
      // $options->setDefaultFont('Helvetica');
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
      $canvas->page_text(34, 28, $pdf_final,
            $font, 6, array(0, 0, 0));
      $canvas->page_text($w-560,$h-28, $pdf_footer_final , $font, 6, array(0,0,0));
      
      $canvas->close_object();
      $canvas->add_object($footer,"all");

      // header('Content-Disposition: inline; filename="' . $filename . '.pdf"');

      // header('Content-Disposition: inline;');

      

      // Output the generated PDF (you can save it to a file or send it via email)
      $upload_dir = wp_upload_dir();

    $user_directory = $upload_dir['basedir'] . '/shizl_users/' . $user_id . '__' . $user_first_name . '_' . $user_last_name . '/shizl_pdfs/' .  $first_post_title;
    
            
    if (!file_exists($user_directory)) {
        mkdir($user_directory, 0777, true); // Create the directory recursively
    }
            
            // Update the local file path to the uploads directory
    // $localFilePath = $upload_dir['basedir'] . '/' . $filename . '.pdf';
    $localFilePath = $upload_dir['basedir'] .'/shizl_users/'.  $user_id .'__'. $user_first_name .'_'. $user_last_name . '/shizl_pdfs/' . $first_post_title . '/' . $filename . '-sent_to_docusign-' . $r . '.pdf';
            
            // Update the local file path to the uploads directory
    // $localFilePath = $upload_dir['basedir'] . '/' . $filename . '.pdf';
    // $localFilePath = $upload_dir['basedir'] .'/shizl_users/'.  $user_id .'__'. $user_first_name .'_'. $user_last_name . '/shizl_pdfs/' . $filename . '-sent_to_docusign-' . $r . '.pdf';
    // $pdfContent = $dompdf->output();

    // my_print_r($localFilePath);

    file_put_contents($localFilePath, $dompdf->output());

    $pdfFilePath = $filename;

    $XPos = $signature_x_position;
    $YPos = $signature_y_position;
    $Page_num = $signature_page_number;
    $docusign_envelope_method_el = $docusign_envelope_method;

    handle_trigger_envelope_function_pdf($pdfFilePath, $localFilePath,  $XPos, $YPos, $Page_num, $docusign_envelope_method_el);

       // Create an array with debug information
       $debugInfo = array(
        'filename' => $filename,
        'localFilePath' => $localFilePath,
        // 'x_location' => $signature_x_position,
        // 'y_location' => $signature_y_position,
        // 'page_number' => $signature_page_number
    );

    // Encode debug information as JSON
    // $debugJson = json_encode($debugInfo);

    // // Return the JSON response
    // header('Content-Disposition: inline; filename="' . $filename . '.pdf"');
    // header('Content-Type: text/plain');
    // header('X-Content-Type-Options: nosniff');
    // header('X-PDF-File-Path: ' . $localFilePath);
    //  header('X-location:' $signature_x_position,);

    // echo $debugJson;

    // For demonstration purposes, let's output the PDF directly to the browser
    // Call the function to handle triggering envelope with PDF path

    // Return the PDF file paths
    return array('pdfFilePath' => $filename, 'localFilePath' => $localFilePath);
}
?>