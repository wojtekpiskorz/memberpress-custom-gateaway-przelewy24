<?php
if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
}

class StripeP24Payment
{
    public function __construct()
    {
        // Add Gateway Path
        add_filter('mepr-gateway-paths', array($this, 'add_mepr_gateway_paths'));
    }

    public function add_mepr_gateway_paths($tabs)
    {
        array_push($tabs, STRIPE_P24_PAYMENT_PATH);
        return $tabs;
    }

//     public static function add_options_admin_enqueue_script($hook)
//     {
//         if ($hook == 'memberpress_page_memberpress-options') {
//             wp_enqueue_script(
//                 'mp-paystack-options-js',
//                 MP_PAYSTACK_JS_URL . '/admin_options.js',
//                 array(
//                     'jquery',
//                 )
//             );
//             return $hook;
//         }
//     }
}