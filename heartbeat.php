<?php

// equeue scripts
add_action('wp_enqueue_scripts', 'wp_and_js_demo_enqueue_scripts');
function wp_and_js_demo_enqueue_scripts()
{
    // load heartbeat demo
    wp_enqueue_script(
        'wp-and-js-demo-heartbeat',
        plugins_url('/js/heartbeat-demo.js', __FILE__),
        array('jquery', 'wp-util', 'heartbeat'),
        '1.0.1',
        true // load in footer
    );
}

/**
 * Receive Heartbeat data and respond.
 *
 * Processes data received via a Heartbeat request, and returns additional data to pass back to the front end.
 *
 * @param array $response Heartbeat response data to pass back to front end.
 * @param array $data     Data received from the front end (unslashed).
 *
 * @return array
 */
function myplugin_receive_heartbeat( array $response, array $data ) {
	// If we didn't receive our data, don't send any back.
	if ( empty( $data['myplugin_customfield'] ) ) {
		return $response;
	}

	// Calculate our data and pass it back. For this example, we'll hash it.
	$received_data = $data['myplugin_customfield'];

	$response['myplugin_customfield_hashed'] = sha1( $received_data );
	return $response;
}
add_filter( 'heartbeat_received', 'myplugin_receive_heartbeat', 10, 2 );

