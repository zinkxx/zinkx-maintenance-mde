<?php
if (!defined('ABSPATH')) {
    exit;
}

$logo = get_option('devtechnic_maintenance_logo');
$title = get_option('devtechnic_maintenance_title', 'Bakımdayız!');
$message = get_option('devtechnic_maintenance_message', 'Sitemizi daha iyi hale getirmek için kısa bir bakım sürecindeyiz.');
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html($title); ?></title>
    <link rel="stylesheet" href="<?php echo plugins_url('../assets/style.css', __FILE__); ?>">
</head>
<body>
    <div class="maintenance-container">
        <?php if ($logo) { echo '<img src="'.esc_url($logo).'" class="logo">'; } ?>
        <h1><?php echo esc_html($title); ?></h1>
        <p><?php echo esc_html($message); ?></p>
    </div>
</body>
</html>
