<?php

require_once __DIR__ . '/../services/UserService.class.php';

/**
 * @OA\Get(path="/users/{id}",
 * tags={"Users"},
 * @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
 * @OA\Response(response="200", description="Get user by id")
 * )
 */

Flight::route('GET /users/@id', function($id){
    $userService = new UserService();
    $user = $userService->get_user_by_id($id);
    Flight::json($user);
});

?>