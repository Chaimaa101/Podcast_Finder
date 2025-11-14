<?php

namespace App\Swagger;

/**
 * @OA\Tag(
 *     name="User",
 *     description="Endpoints for managing users"
 * )
 */

class UserControllerDocs {}

/**
 * ======================
 *      REGISTER
 * ======================
 * @OA\Post(
 *     path="/api/register",
 *     summary="Create account",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Account created",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(response=404, description="User not found")
 * )
 */

 
/**
 * ======================
 *        LOGIN
 * ======================
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login to an account",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="email", type="string", example="chaimaaa@gmail.com"),
 *             @OA\Property(property="password", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="email", type="string", example="chaimaaa@gmail.com"),
 *             @OA\Property(property="password", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(response=404, description="User not found")
 * )
 */

 
/**
 * ======================
 *    RESET PASSWORD
 * ======================
 * @OA\Post(
 *     path="/api/reset",
 *     summary="Reset password",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="email", type="string", example="chaimaaa@gmail.com"),
 *             @OA\Property(property="password", type="string", example="12345678"),
 *             @OA\Property(property="password_confirmation", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password reset successful",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="email", type="string", example="chaimaaa@gmail.com"),
 *             @OA\Property(property="password", type="string", example="12345678"),
 *             @OA\Property(property="password_confirmation", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(response=404, description="User not found")
 * )
 */
