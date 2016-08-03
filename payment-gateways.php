<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
Plugin Name: WooCommerce Extra Payment Gateways
Plugin URI: http://www.intelligencestorm.com
Description: WooCommerce Extra Payment Gateways.
Version: 1.0.0
Author: Dmytro Samokhin
Author URI: http://www.intelligencestorm.com
*/

$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
if ( in_array( 'woocommerce/woocommerce.php',  $active_plugins) ) {

    
    /**
    * Load WC_Gateway_Privat_Bank class
    **/
    add_action('plugins_loaded', 'woocommerce_gateway_privat_init', 0);
        function woocommerce_gateway_privat_init() {
        if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

            require_once 'class-wc-gateway-privat.php';
        
        }

        /**
        * Add the Gateway to WooCommerce
        **/
        function woocommerce_add_privat_gateway($methods) {
            $methods['privat'] = 'WC_Gateway_Privat_Bank';
            return $methods;
        }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_privat_gateway' );
     

    /**
    * Load WC_Gateway_OTP_Bank class
    **/
    add_action('plugins_loaded', 'woocommerce_gateway_otp_init', 0);
        function woocommerce_gateway_otp_init() {
        if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

            require_once 'class-wc-gateway-otp.php';
        
        }

        /**
        * Add the Gateway to WooCommerce
        **/
        function woocommerce_add_otp_gateway($methods) {
            $methods['otp'] = 'WC_Gateway_OTP_Bank';
            return $methods;
        }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_otp_gateway' );
    } 

?>