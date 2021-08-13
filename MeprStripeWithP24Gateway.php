<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

class MeprStripeWithP24Gateway extends MeprStripeGateway {
    public function __construct() {
        $this->name = __("Stripe with P24", 'memberpress');
        $this->desc = __('', 'memberpress');
        $this->key = __('stripe_with_p24', 'memberpress');
        $this->set_defaults();

    }

    protected function set_defaults() {
        if(!isset($this->settings)) {
          $this->settings = array();
        }

        $this->settings = (object)array_merge(
          array(
            'gateway' => 'MeprStripeWithP24Gateway',
            'id' => $this->generate_id(),
            'label' => '',
            'use_label' => true,
            'use_icon' => true,
            'use_desc' => true,
            'email' => '',
            'sandbox' => false,
            'force_ssl' => false,
            'debug' => false,
            'test_mode' => false,
            'stripe_checkout_enabled' => false,
            'churn_buster_enabled' => false,
            'churn_buster_uuid' => '',
            'api_keys' => array(
              'test' => array(
                'public' => '',
                'secret' => ''
              ),
              'live' => array(
                'public' => '',
                'secret' => ''
              )
            ),
            'connect_status' => false,
            'service_account_id' => '',
            'service_account_name' => '',
          ),
          (array)$this->settings
        );
    
        $this->id = $this->settings->id;
        $this->label = $this->settings->label;
        $this->use_label = $this->settings->use_label;
        $this->use_icon = $this->settings->use_icon;
        $this->use_desc = $this->settings->use_desc;
        $this->connect_status = $this->settings->connect_status;
        $this->service_account_id = $this->settings->service_account_id;
        $this->service_account_name = $this->settings->service_account_name;
        //$this->recurrence_type = $this->settings->recurrence_type;
    
        if($this->is_test_mode()) {
          $this->settings->public_key = trim($this->settings->api_keys['test']['public']);
          $this->settings->secret_key = trim($this->settings->api_keys['test']['secret']);
        }
        else {
          $this->settings->public_key = trim($this->settings->api_keys['live']['public']);
          $this->settings->secret_key = trim($this->settings->api_keys['live']['secret']);
        }
    }
    
    public function get_available_methods_for_onetime_payment() {
        $methods = [
          'card', 'p24'
        ];
    
        $mepr_option = MeprOptions::fetch();
        $currency = strtolower($mepr_option->currency_code);

        return $methods;
    }
}
