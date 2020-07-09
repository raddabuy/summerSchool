<?php

namespace App\Http\Swagger;

abstract class UserAPIController
{

    /**
     * @OA\Post(
     *     path="/api/v1/user/login",
     *      description="Login",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="Email",
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     description="Password",
     *                     property="password",
     *                     type="string"
     *                 ),
     *              required={"email", "password"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *     response="200",
     *      description="Create payment session",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "success": "true",
     *                         "data": "string"
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    abstract public function login();

}
