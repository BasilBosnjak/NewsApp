<?php
    require 'vendor/autoload.php';
    require 'rest/routes/middleware_routes.php';
    require 'rest/routes/article_routes.php';
    require 'rest/routes/comment_routes.php';
    require 'rest/routes/auth_routes.php';


    Flight::route('/', function(){
        echo 'hello world!';
    });

    Flight::route('/muky', function(){
        echo 'muky global elite.';
    });

    Flight::start();
?>