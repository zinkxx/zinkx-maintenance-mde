<?php
/**
 * Plugin Name: Zinkx Maintenance Mode
 * Plugin URI: https://devtechnic.online
 * Description: WordPress için gelişmiş bakım modu eklentisi.
 * Version: 1.0
 * Author: DevTechnic
 * Author URI: https://devtechnic.online
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Ayarları yükle
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';

// Bakım modu kontrolü
function devtechnic_maintenance_mode() {
    if (!current_user_can('manage_options') && get_option('devtechnic_maintenance_status') == 'enabled') {
        require_once plugin_dir_path(__FILE__) . 'includes/maintenance-template.php';
        exit;
    }
}
add_action('template_redirect', 'devtechnic_maintenance_mode');
?>
