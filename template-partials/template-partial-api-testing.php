<div style="height: 1500px; margin-top:5rem">

<style>
fieldset {
  display: block;
  margin-left: 2px;
  margin-right: 2px;
  padding-top: 0.35em;
  padding-bottom: 0.625em;
  padding-left: 0.75em;
  padding-right: 0.75em;
  border: 2px solid black;
}
</style>




<?php
$DS_master_access_token = get_docusign_JWT_accesstoken(DOCUSIGN_USER_ID);

my_print_r('$DS_master_access_token');
my_print_r($DS_master_access_token);

echo '<br/><br/>';

//$email_to_check = 'mediagrin55+dot.hyp-hen@gmail.com';
//$email_to_check = 'david+ds-dev-admin@madebyflawless.com';
//$email_to_check = 'david.andrew+david001@gmail.com';
//$email_to_check = 'mediagrin55+testplan4@gmail.com';
//$email_to_check = 'mediagrin55+l3@gmail.com';
//$email_to_check = 'james@madebyflawless.com';

//$email_to_check = str_replace('+', '&#x2b;', $email_to_check);
//$email_to_check = str_replace('.', '&#x2e;', $email_to_check);

// $unicode_mapping = array(
//     '+' => '&#x2b;',
//     '0' => '&#x0030;',
//     '1' => '&#x0031;',
//     '2' => '&#x0032;',
//     '3' => '&#x0033;',
//     '4' => '&#x0034;',
//     '5' => '&#x0035;',
//     '6' => '&#x0036;',
//     '7' => '&#x0037;',
//     '8' => '&#x0038;',
//     '9' => '&#x0039;'
// );

// Perform replacements using the mapping
//$email_to_check = strtr($email_to_check, $unicode_mapping);

//$email_to_check = unicode_mapping($email_to_check);


//$resend_docusign_invite = resend_docusign_invite();

// my_print_r('$resend_docusign_invite');
// my_print_r($resend_docusign_invite);



//is_user_activated_in_docusign($email_to_check);


$current_user_id        = get_current_user_id();
$current_user           = wp_get_current_user();
$upload_dir             = wp_upload_dir();

//my_print_r( $current_user->first_name );

if ( isset( $current_user->user_login ) && ! empty( $upload_dir['basedir'] ) ) {
    //$user_dirname = $upload_dir['basedir'].'/'.$current_user->user_login.'/'.$post->post_name;
    
    
    $base_user_dirname = $upload_dir['basedir'] .'/shizl_users/'. $current_user->ID .'__'. $current_user->first_name .'_'. $current_user->last_name;
    $shizl_pdfs = $base_user_dirname . '/shizl_pdfs';
    $user_pdfs = $base_user_dirname . '/user_pdfs';
    

    // my_print_r($upload_dir['basedir']);
    
    // my_print_r( $base_user_dirname );
    // my_print_r( $shizl_pdfs );
    // my_print_r( $user_pdfs ); 
    
    
    // if ( ! file_exists( $base_user_dirname ) ) {
    //     wp_mkdir_p( $base_user_dirname );
    // }

    // if ( ! file_exists( $shizl_pdfs ) ) {
    //     wp_mkdir_p( $shizl_pdfs );
    // }

    // if ( ! file_exists( $user_pdfs ) ) {
    //     wp_mkdir_p( $user_pdfs );
    // }


    if ( ! (file_exists($base_user_dirname) && file_exists($shizl_pdfs) && file_exists($user_pdfs)) ) {
        
        if ( ! file_exists($base_user_dirname)) {
            wp_mkdir_p($base_user_dirname);
        }
        if ( ! file_exists($shizl_pdfs)) {
            wp_mkdir_p($shizl_pdfs);
        }
        if ( ! file_exists($user_pdfs)) {
            wp_mkdir_p($user_pdfs);
        }
    }
}

 






$current_user_id = get_current_user_id();
$updated_consent_status = get_user_meta($current_user_id, 'user__docusign_consent_given', true);

//my_print_r($updated_consent_status);

if (!$updated_consent_status) { ?>



<h2>Hold your Shizl there!!</h2>
<p style="font-size: .9rem">you need to give consent for Shizl to impersonate you and send envelopes</p>

<H4>Prod ENV</H4><br/>

<p style="font-size: .9rem">
<a href="https://account.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=https://shizl.com/docusign-test/">Give Consent - Prod (to DS Prod account from PROD)</a><br/>

<a href="https://account.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=https://staging.shizl.com/docusign-test/">Give Consent - Prod (to DS Prod account from STAGING)</a><br/>

<a href="https://account.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=https://dev.shizl.com/docusign-test/">Give Consent - Prod (to DS Prod account from DEV)</a><br/>
</p>

<H4>Staging ENV</H4><br/>
<p style="font-size: .9rem">
<a href="https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=https://staging.shizl.com/docusign-test/">Give Consent - Demo (to DS Demo account from STAGING)</a><br/>

<a href="https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=https://dev.shizl.com/docusign-test/">Give Consent - Demo (to DS Demo account from DEV)</a><br/>
</p>

<H4>Local ENV</H4><br/>

<p style="font-size: .9rem">
<a href="https://account.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=http://shizl.local/docusign-test/">Give Consent - Prod (to DS Prod account from LOCAL)</a><br/>

<a href="https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=74f7e972-9c24-4c62-9215-d780cd3a1c45&redirect_uri=http://shizl.local/docusign-test/">Give Consent - Demo (to DS Demo account from LOCAL)</a><br/><br/>

</p>
<br/>
<br/>

<?php } 


//delete_user_from_docusign(); 



// Hook the custom function to the delete_account action
add_action('delete_account_action', 'delete_user_from_docusign');

// Add this code to delete the user account
if (isset($_POST['delete_account'])) {
    do_action('delete_account_action'); // Trigger the custom action when the button is clicked
}

?>





<?php

$check_docusign_details = check_docusign_details_after_login()

?>



<!-- <fieldset>
    <legend>Resend invitation to join DocuSign</legend>
    <br/>
    <button id="resent-docusign-email-invation">Send me the invation email</button>
    <br/>
</fieldset> -->


<br/>
<br/>
<br/>


<form method="post">
    <fieldset>
        <legend>Delete current logged in  user</legend>
        <br/>
        <input type="submit" name="delete_account" value="Delete My Account">
        <br/>
    </fieldset>
</form>



<br/>
<br/>
<br/>


<form method="post">
<fieldset>
<legend>Envelope sending test</legend>
<br/>
    <label for="recipient_name">Recipient name:</label>
    <input type="text" id="recipient_name" name="recipient_name"><br><br> 

    <label for="recipient_email">Recipient email:</label>
    <input type="email" id="recipient_email" name="recipient_email"><br><br>

    <label for="email_subject">Email Subject:</label>
    <input type="text" id="email_subject" name="email_subject"><br><br>


    <button type="submit" name="trigger_function">Send Envelope</button>
    <?php wp_nonce_field('trigger_envelope_function_action', 'trigger_envelope_function_nonce'); ?>
    <input type="hidden" name="action" value="handle_trigger_envelope_function">
    <br/>
</fieldset>
</form>


</div>