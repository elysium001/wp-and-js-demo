// on jquery dom ready, do this
jQuery(document).ready(function($) {
    
    // on click of the button, do this
    $('#wp-and-js-demo-button').click(function() {

        // show thickbox
        tb_show('WP and JS Demo', '#TB_inline?width=600&height=550&inlineId=wp-and-js-demo-thickbox', false);
    });

    console.log('wp-and-js-demo.js loaded');

    console.log(wp_and_js_demo);
});