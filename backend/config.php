<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ (E_NOTICE | E_DEPRECATED));

class Config {
    // Digital Ocean credentials using enviroment variables
    public static function DB_NAME() {
        return Config::get_env('DB_NAME', 'newsapp');
    }

    public static function DB_PORT() {
        return Config::get_env('DB_PORT', 3306);
    }

    public static function DB_USER() {
        return Config::get_env('DB_USER', 'root');
    }

    public static function DB_PASSWORD() {
        return Config::get_env('DB_PASSWORD', '');
    }

    public static function DB_HOST() {
        return Config::get_env('DB_HOST', 'localhost');
    }

    public static function JWT_SECRET() {
        return Config::get_env('JWT_SECRET', 'M6/gz/ePL.!xXW]r6Q7VPi&((&i{AV');
    }

    public static function get_env($name, $default) {
        return isset($_ENV[$name]) && trim($_ENV[$name]) !== '' ? $_ENV[$name] : $default;
    }
}
// // DB access credentials
// define('DB_NAME', 'newsapp');
// define('DB_PORT', 3306);
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_HOST', 'localhost');

// // JWT secret key
// define('JWT_SECRET', 'M6/gz/ePL.!xXW]r6Q7VPi&((&i{AV');
?>
