<?php

// load options page.
add_action('admin_menu', 'wp_and_js_demo_options_page');
function wp_and_js_demo_options_page()
{
    // add top level menu page
    add_menu_page(
        'WP and JS Demo',
        'WP and JS Demo',
        'manage_options',
        'wp-and-js-demo',
        'wp_and_js_demo_options_page_html'
    );
}

// create html for option page
function wp_and_js_demo_options_page_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error(
            'wp-and-js-demo_messages',
            'wp-and-js-demo_message',
            __('Settings Saved', 'wp-and-js-demo'),
            'updated'
        );
    }

    // show error/update messages
    settings_errors('wp-and-js-demo_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <p><?php _e('This is a demo page to show how to use JS in WordPress.', 'wp-and-js-demo'); ?></p>

        

        <!-- thickbox container -->
        <div id="wp-and-js-demo-thickbox" style="display:none;">
            <h2><?php _e('Thickbox', 'wp-and-js-demo'); ?></h2>
            <p><?php _e('This is a thickbox.', 'wp-and-js-demo'); ?></p>
        </div>
        

        <!-- wp-and-js-demo-button -->
        <p>
            <button id="wp-and-js-demo-button" class="button">
                <?php _e('Click Me', 'wp-and-js-demo'); ?>
            </button>
        </p>

        <!-- greeting-component -->
        <p>
            <greeting-component></greeting-component>
        </p>

        <!-- <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wp_and_js_demo"
            settings_fields('wp_and_js_demo');
            // output setting sections and their fields
            // (sections are registered for "wp_and_js_demo", each field is registered to a specific section)
            do_settings_sections('wp_and_js_demo');
            // output save settings button
            submit_button('Save Settings');
            ?>
        </form> -->
    </div>
    <?php
}

// register settings
function wp_and_js_demo_register_settings()
{
    // register a new setting for "wp_and_js_demo" page
    register_setting(
        'wp_and_js_demo',
        'wp_and_js_demo',
        'wp_and_js_demo_sanitize_settings'
    );

    // register a new section in the "wp_and_js_demo" page
    add_settings_section(
        'wp_and_js_demo_section_developers',
        __('Developers', 'wp-and-js-demo'),
        'wp_and_js_demo_section_developers_cb',
        'wp_and_js_demo'
    );

    // register a new field in the "wp_and_js_demo_section_developers" section, inside the "wp_and_js_demo" page
    add_settings_field(
        'wp_and_js_demo_field_developers',
        __('Developers', 'wp-and-js-demo'),
        'wp_and_js_demo_field_developers_cb',
        'wp_and_js_demo',
        'wp_and_js_demo_section_developers',
        [
            'label_for' => 'wp_and_js_demo_field_developers',
            'class' => 'wp_and_js_demo_row',
            'wp_and_js_demo_custom_data' => 'custom',
        ]
    );
}

// sanitize settings
function wp_and_js_demo_sanitize_settings($settings)
{
    // $settings['some_other_id'] = intval($settings['some_other_id']);
    // $settings['some_other_id'] = sanitize_text_field($settings['some_other_id']);
    return $settings;
}

