<?php
/**
 * Plugin Name: WP and JS Demo
 * Plugin URI:
 * Description: A demo plugin to show how to use JS in WordPress
 * Version: 1.0.0
 * Author: Omar Serrano
 */

// dont access directly
if (!defined('ABSPATH')) {
    exit;
}

// include php files
require_once plugin_dir_path(__FILE__) . 'demo-options-page.php';

// register scripts
add_action('admin_enqueue_scripts', 'wp_and_js_demo_register_scripts');
function wp_and_js_demo_register_scripts()
{
    // register scripts
    wp_enqueue_script(
        'wp-and-js-demo',
        plugins_url('/js/wp-and-js-demo.js', __FILE__),
        array('jquery'),
        '1.0.0',
        true // load in footer
    );
}


