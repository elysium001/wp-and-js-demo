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
    // load scripts
    wp_enqueue_script(
        'wp-and-js-demo',
        plugins_url('/js/wp-and-js-demo.js', __FILE__),
        array('jquery', 'thickbox'),
        '1.0.0',
        true // load in footer
    );

    // load index.js
    wp_enqueue_script(
        'wp-and-js-demo-index',
        plugins_url('/js/index.js', __FILE__),
        array('jquery'),
        '1.0.0',
        true // load in footer
    );

    // css
    wp_enqueue_style(
        'wp-and-js-demo',
        plugins_url('/style.css', __FILE__),
        array('thickbox'),
    );
}

add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
function add_module_to_my_script($tag, $handle, $src)
{
    if ("wp-and-js-demo-index" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }

    return $tag;
}


