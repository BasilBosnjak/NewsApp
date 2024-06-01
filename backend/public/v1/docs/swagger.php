<?php

require __DIR__ . '/../../../vendor/autoload.php';

if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    define('BASE_URL', 'http://localhost/NewsApp/backend');
} else {
    define('BASE_URL', 'https://dolphin-app-k6wnf.ondigitalocean.app/backend');
}

// define('BASE_URL', 'http://localhost:8018/web-introduction/dentist-backend/');
//define('BASE_URL', 'http://localhost/NewsApp/backend');

error_reporting(0);

$openapi = \OpenApi\Generator::scan(['../../../rest/routes/', './']);
// $openapi = \OpenApi\Util::finder(['../../../rest/routes', './'], NULL, '*.php');
// $openapi = \OpenApi\scan(['../../../rest', './'], ['pattern' => '*.php']);

header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
?>
