<?php
/*
Plugin Name: Hide WP Admin
Plugin URI: https://github.com/jellylund/hide-wp-admin
Description:  Prevents /wp-admin access to anyone except administrators
Version: 1.0.0
Author: Steve Lund
License: GPLv2
*/

function disable_dashboard() {
    if (!is_user_logged_in()) {
        return null;
    }
    if (!current_user_can('administrator') && is_admin()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('admin_init', 'disable_dashboard');
