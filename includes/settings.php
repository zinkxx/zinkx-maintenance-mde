<?php
if (!defined('ABSPATH')) {
    exit;
}

// Ayarları kaydetme
function devtechnic_register_settings() {
    register_setting('devtechnic_settings_group', 'devtechnic_maintenance_status');
    register_setting('devtechnic_settings_group', 'devtechnic_maintenance_title');
    register_setting('devtechnic_settings_group', 'devtechnic_maintenance_message');
    register_setting('devtechnic_settings_group', 'devtechnic_maintenance_logo');
}
add_action('admin_init', 'devtechnic_register_settings');

// Ayarlar sayfasına alanlar ekleme
function devtechnic_settings_fields() {
    add_settings_section('devtechnic_section', 'Bakım Modu Ayarları', null, 'devtechnic-maintenance-mode');

    add_settings_field(
        'devtechnic_maintenance_status',
        'Bakım Modunu Aç/Kapat',
        'devtechnic_toggle_field',
        'devtechnic-maintenance-mode',
        'devtechnic_section'
    );

    add_settings_field(
        'devtechnic_maintenance_title',
        'Başlık',
        'devtechnic_text_field',
        'devtechnic-maintenance-mode',
        'devtechnic_section',
        ['label_for' => 'devtechnic_maintenance_title']
    );

    add_settings_field(
        'devtechnic_maintenance_message',
        'Mesaj',
        'devtechnic_textarea_field',
        'devtechnic-maintenance-mode',
        'devtechnic_section',
        ['label_for' => 'devtechnic_maintenance_message']
    );

    add_settings_field(
        'devtechnic_maintenance_logo',
        'Logo URL',
        'devtechnic_text_field',
        'devtechnic-maintenance-mode',
        'devtechnic_section',
        ['label_for' => 'devtechnic_maintenance_logo']
    );
}
add_action('admin_init', 'devtechnic_settings_fields');

// Aç/Kapat butonu
function devtechnic_toggle_field() {
    $status = get_option('devtechnic_maintenance_status', 'disabled');
    ?>
    <select name="devtechnic_maintenance_status">
        <option value="enabled" <?php selected($status, 'enabled'); ?>>Açık</option>
        <option value="disabled" <?php selected($status, 'disabled'); ?>>Kapalı</option>
    </select>
    <?php
}

// Metin alanı
function devtechnic_text_field($args) {
    $option = get_option($args['label_for'], '');
    ?>
    <input type="text" name="<?php echo esc_attr($args['label_for']); ?>" value="<?php echo esc_attr($option); ?>" class="regular-text">
    <?php
}

// Metin kutusu
function devtechnic_textarea_field($args) {
    $option = get_option($args['label_for'], '');
    ?>
    <textarea name="<?php echo esc_attr($args['label_for']); ?>" class="large-text code" rows="3"><?php echo esc_textarea($option); ?></textarea>
    <?php
}
?>
