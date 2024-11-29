<?php
/*
Plugin Name: 9bit Studios WordPress AJAX
Plugin URI: http://www.9bitstudios.com
Description: A plugin demonstrating AJAX in WordPress
Author: 9bit Studios
Version: 1.0.0
Author URI: http://www.9bitstudios.com
*/

class WPF_WordPress_Ajax {

    function __construct() {

        register_activation_hook(__FILE__,  array($this, 'activation'));
        register_deactivation_hook(__FILE__,  array($this, 'deactivation'));
        //add_action('admin_menu', array($this,'add_admin_menu'));
        add_action('admin_footer', array($this, 'cool_options_javascript'));
        add_action('wp_ajax_get_cool_options',  array($this, 'get_cool_options'));
        //add_action('wp_ajax_save_cool_options',  array($this, 'save_cool_options'));

    }

    /**** ACTIVATION ****/

    function activation() {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    }

    /**** DEACTIVATION ****/
    function deactivation() {
        /* Nothing to do here */
    }


    function home() {
        include('home.php');
    }

    function cool_options_javascript() {
        $pluginDirectory = plugins_url() .'/'. basename(dirname(__FILE__));
        wp_enqueue_script("nbs-wp-ajax", $pluginDirectory . '/nbs-wp-ajax.js');
    }






}

$nbsAjax = new WPF_WordPress_Ajax();
