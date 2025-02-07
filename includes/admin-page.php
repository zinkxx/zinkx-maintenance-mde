<?php
if (!defined('ABSPATH')) {
    exit;
}

// Admin menüsüne "Bakım Modu" sayfasını ekle
function devtechnic_add_admin_menu() {
    add_menu_page(
        'Bakım Modu',
        'Bakım Modu',
        'manage_options',
        'devtechnic-maintenance-mode',
        'devtechnic_render_admin_page',
        'dashicons-hammer',
        100
    );
}
add_action('admin_menu', 'devtechnic_add_admin_menu');

// Ayarlar sayfası içeriği
function devtechnic_render_admin_page() {
    ?>
    <div class="wrap">
        <h1>🔧 Bakım Modu Ayarları</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('devtechnic_settings_group');
            do_settings_sections('devtechnic-maintenance-mode');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>
