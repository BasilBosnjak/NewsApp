<?php
    require 'vendor/autoload.php';
    require 'rest/routes/article_routes.php';

    Flight::route('/', function(){
        echo 'hello world!';
    });

    Flight::route('/muky', function(){
        echo 'muky global elite.';
    });

    Flight::start();
?>