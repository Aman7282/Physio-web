<?php
// Config & Base URL Auto-Detection
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'CareStride');
    define('SITE_TAGLINE', 'theCareStride.com — Licensed In-Home Physiotherapy');
    define('PHONE_NUMBER', '+92 309 7282547');
    define('PHONE_RAW', '923097282547');
    define('WHATSAPP_LINK', 'https://wa.me/' . PHONE_RAW);
    define('CONTACT_EMAIL', 'care@thecarestride.com');
    define('CLINIC_ADDRESS', 'Phase 5 Commercial, DHA Lahore, Pakistan');
}

// Auto-detect base path dynamically (e.g. /physio webapp/ or /)
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$dir_parts = explode('/', trim($script_name, '/'));
$base_folder = '';

if (isset($dir_parts[0]) && strtolower($dir_parts[0]) === 'physio webapp') {
    $base_folder = '/physio webapp/';
} else {
    $base_folder = '/';
}

function site_url($path = '') {
    global $base_folder;
    $clean_path = ltrim($path, '/');
    return $base_folder . $clean_path;
}

function current_full_url() {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    return $protocol . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '');
}
?>
