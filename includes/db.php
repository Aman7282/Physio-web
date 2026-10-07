<?php
// PDO Database Connection & Auto-Setup Helper

if (!defined('DB_HOST')) {
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'physio_db');
}

function get_db() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            // Attempt to create database if missing
            try {
                $dsn_no_db = "mysql:host=" . DB_HOST . ";charset=utf8mb4";
                $pdo_raw = new PDO($dsn_no_db, DB_USER, DB_PASS);
                $pdo_raw->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                
                // Import database.sql if exists
                $sql_file = __DIR__ . '/../database.sql';
                if (file_exists($sql_file)) {
                    $pdo_raw->exec("USE `" . DB_NAME . "`");
                    $sql_content = file_get_contents($sql_file);
                    $pdo_raw->exec($sql_content);
                }

                $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (Exception $ex) {
                // Fallback return null if database completely unavailable
                return null;
            }
        }
    }
    return $pdo;
}
?>
