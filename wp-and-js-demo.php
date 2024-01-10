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

require_once plugin_dir_path(__FILE__) . 'load-admin-scripts.php';

require_once plugin_dir_path(__FILE__) . 'heartbeat.php';

// for custom block enqueuing, use block.json metadata file.
// Build the block using npm run build with npm module wp-scripts.
add_action('init', 'wp_and_js_demo_register_block_json');
function wp_and_js_demo_register_block_json()
{
    // register block.json
    register_block_type( plugin_dir_path(__FILE__) . 'build' );
}


