<?php
    require_once __DIR__ . '/../services/AuthService.class.php';

    Flight::set('auth_service', new AuthService());

    Flight::group('/auth', function () {

        Flight::route('POST /register', function () {
            $data = Flight::request()->data->getData();
            Flight::json(Flight::auth_service()->register($data));
        });

        Flight::route('POST /login', function () {
            $data = Flight::request()->data->getData();
            Flight::json(Flight::auth_service()->login($data));
        });
    });
?>