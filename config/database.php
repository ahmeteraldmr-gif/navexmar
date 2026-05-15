<?php
/**
 * Veritabanı Yapılandırma Dosyası
 * Database Configuration File
 * 
 * Ortam algılama ve veritabanı bağlantı ayarları
 */

// Env loader'ı yükle
require_once __DIR__ . '/env_loader.php';

// Ortam algılama (Local / Production)
function detectEnvironment() {
    return env('APP_ENV', 'production');
}

// Ortam
if (!defined('APP_ENV')) {
    define('APP_ENV', detectEnvironment());
}

// Veritabanı ayarları
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_PORT', env('DB_PORT', '3306'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASSWORD', ''));
define('DB_NAME', env('DB_DATABASE', 'navexmar'));


/**
 * Veritabanı bağlantısını döndürür
 * 
 * @return PDO Veritabanı bağlantı nesnesi
 * @throws PDOException Bağlantı hatası durumunda
 */
function getDB() {
    static $conn = null;
    
    if ($conn === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $conn = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]);
        } catch (PDOException $e) {
            // Production'da detaylı hata gösterme
            if (APP_ENV === 'production') {
                error_log("Database Error: " . $e->getMessage());
                die("Veritabanı bağlantı hatası. Lütfen sistem yöneticisi ile iletişime geçin.");
            }
            
            // Development'ta detaylı hata göster
            $errorMsg = "Veritabanı bağlantı hatası: " . $e->getMessage();
            $errorMsg .= "\n\nKontrol edin:";
            $errorMsg .= "\n- Veritabanı adı: " . DB_NAME;
            $errorMsg .= "\n- Kullanıcı adı: " . DB_USER;
            $errorMsg .= "\n- Host: " . DB_HOST . ":" . DB_PORT;
            $errorMsg .= "\n- Ortam: " . APP_ENV;
            die("<pre style='background:#fee;padding:2rem;border-left:4px solid #c33;font-family:monospace;'>" . 
                htmlspecialchars($errorMsg) . "</pre>");
        }
    }
    
    return $conn;
}
