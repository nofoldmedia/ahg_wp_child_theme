
/**
 * :: Load global element : Footer
 */


alert();

const varPrimaryNavPricingEl = document.querySelector('#menu-item-17 a');

varPrimaryNavPricingEl.addEventListener("click", (e) => {

    /**
     * ----
     * 
     * Ajax
     * 
     * ----
     */

    function get_posts($params) {

        // :: CPT Global element : Footer TARGET 
        let 
        
            content = document.querySelector('.t-p-footer__modal-target-element');

        jQuery.ajax({

            type: 'post',

            dataType: 'json',

            url: scripts_nonce.ajax_url, // url: `${window.location.origin}/wp-admin/admin-ajax.php`,

            data: {

                action: "my_action",  // <-- the action to fire in the server

                nonce: scripts_nonce.nonce,

                params: $params,

            },

            // :: If AJAX response successful 
            success: function (data, textStatus, XMLHttpRequest) {

                // console.log(data.content);

                if (data.status === 200) {

                    // console.log('ajax success');
                    // console.log(XMLHttpRequest);
                    // console.log(data);
                    // console.log(data.content);
                    // console.log(textStatus);

                }


            },

            // :: If AJAX response errors
            error: function (XMLHttpRequest, textStatus, errorThrown) {

                // $status.html(textStatus);

                // console.log(textStatus);

                /*console.log(MLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);*/

            },

            // :: If AJAX response completed
            complete: function (data, textStatus) {

                // console.log(data);

            }

        });

    }
    /**
     * -----
     * 
     * /Ajax
     * 
     * =====
     */

    // :: AJAX Parameters
    let $params = {

        'posts_per_page': -1,

        'post_type': 'post',

        'post_ID': 1392, // <-- post ID for 'CPT Modal - Payment options'

    };

    // Run query
    // console.log('filter Params', $params);

    get_posts($params);

});