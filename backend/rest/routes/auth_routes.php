<?php
require_once __DIR__ . '/../services/AuthService.class.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::set('auth_service', new AuthService());

/**
 * @OA\Post(
 *     path="/register",
 *     tags={"Authentication"},
 *     summary="Register a new user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="full_name",
 *                     type="string",
 *                     description="The full name of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     description="The email of the user",
 *                     format="email"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     description="The password of the user"
 *                 ),
 *                 required={"full_name", "email", "password"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A user object",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="The ID of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="full_name",
 *                     type="string",
 *                     description="The full name of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     description="The email of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     description="The hashed password of the user"
 *                 )
 *             )
 *         )
 *     )
 * )
 */
Flight::route('POST /register', function(){
    $data = Flight::request()->data->getData();
    $authService = new AuthService();
    Flight::json($authService->add_user($data));
});

/**
 * @OA\Post(
 *     path="/login",
 *     tags={"Authentication"},
 *     summary="Login a user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     description="The email of the user",
 *                     format="email"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     description="The password of the user"
 *                 ),
 *                 required={"email", "password"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A user object",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="The ID of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="full_name",
 *                     type="string",
 *                     description="The full name of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     description="The email of the user"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     description="The hashed password of the user"
 *                 )
 *             )
 *         )
 *     )
 * )
 */

Flight::route('POST /login', function(){
    $payload = Flight::request()->data->getData();

    $user = Flight::get('auth_service')->login($payload['email'], $payload['password']);

    if (!$user || !password_verify($payload['password'], $user['password']))
        Flight::halt(500, 'Invalid email or password');

    unset($user['password']);

    $jwt_payload = [
        'user' => $user,
        'iat' => time(),
        'exp' => time() + (60*60*24) // jwt for the day
    ];

    $token = JWT::encode(
        $jwt_payload,
        Config::JWT_SECRET(),
        'HS256'
    );

    Flight::json(
        array_merge($user, ['token' => $token])
    );
    
});

?>