<?php

/**
 * @OA\Info(
 *   title="NewsApp API",
 *   description="All the API endpoints are listed here.",
 *   version="1.0",
 *   @OA\Contact(
 *     email="basil.bosnjak@gmail.com",
 *     name="Basil Bosnjak"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
