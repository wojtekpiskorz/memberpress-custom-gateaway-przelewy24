<?php

/**
 * Plugin Name: MemberPress Stripe with P24
 * Description: Stripe with P24 for one time payment in PLN integration with MemberPress.
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
}

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('memberpress/memberpress.php')) {
//     define('MP_PAYSTACK_PLUGIN_SLUG', 'paystack-memberpress/main.php');
    define('MP_PAYSTACK_PLUGIN_NAME', 'stripe-p24-plugin');
//     define('MP_PAYSTACK_EDITION', MP_PAYSTACK_PLUGIN_NAME);
    define('STRIPE_P24_PAYMENT_PATH', WP_PLUGIN_DIR . '/' . MP_PAYSTACK_PLUGIN_NAME);

//     $mp_paystack_url_protocol = (is_ssl()) ? 'https' : 'http'; // Make all of our URLS protocol agnostic
//     define('MP_PAYSTACK_URL', preg_replace('/^https?:/', "{$mp_paystack_url_protocol}:", plugins_url('/' . MP_PAYSTACK_PLUGIN_NAME)));
//     define('MP_PAYSTACK_JS_URL', MP_PAYSTACK_URL . '/js');
//     define('MP_PAYSTACK_IMAGES_URL', MP_PAYSTACK_URL . '/images');

    // Load Memberpress Base Gateway
    require_once(STRIPE_P24_PAYMENT_PATH . '/../memberpress/app/lib/MeprBaseGateway.php');
    require_once(STRIPE_P24_PAYMENT_PATH . '/../memberpress/app/lib/MeprBaseRealGateway.php');

    // Load Memberpress Paystack API
//     require_once(STRIPE_P24_PAYMENT_PATH . '/MeprPaystackAPI.php');

    // Load Memberpress Paystack Addon
    require_once(STRIPE_P24_PAYMENT_PATH . '/StripeP24Payment.php');

    new StripeP24Payment;
}