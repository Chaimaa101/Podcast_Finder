<?php

namespace App\Swagger;

/**
 * @OA\Tag(
 *     name="User",
 *     description="User Authentication and CRUD operations"
 * )
 *
 * ============================================================
 *                       REGISTER
 * ============================================================
 * @OA\Post(
 *     path="/api/register",
 *     summary="Create account",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UserRegisterRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Account created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/UserResource")
 *     )
 * )
 *
 * ============================================================
 *                        LOGIN
 * ============================================================
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login to your account",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UserLoginRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
 *     )
 * )
 *
 
 * @OA\Post(
 *     path="/api/reset",
 *     summary="Reset password",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UserResetPasswordRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password reset successfully",
 *         @OA\JsonContent(ref="#/components/schemas/UserResource")
 *     )
 * )
 *
*
 * @OA\Get(
 *     path="/api/users",
 *     summary="List all users",
 *     tags={"User"},
 *     @OA\Response(
 *         response=200,
 *         description="List of users",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UserResource"))
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/users/{id}",
 *     summary="Get a user by ID",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User found",
 *         @OA\JsonContent(ref="#/components/schemas/UserResource")
 *     ),
 *     @OA\Response(response=404, description="User not found")
 * )
 *
*
 * @OA\Post(
 *     path="/api/users",
 *     summary="Create a new user",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UserStoreRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="User created",
 *         @OA\JsonContent(ref="#/components/schemas/UserResource")
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/users/{id}",
 *     summary="Update a user",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UserUpdateRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User updated",
 *         @OA\JsonContent(ref="#/components/schemas/UserResource")
 *     )
 * )
 
 * @OA\Delete(
 *     path="/api/users/{id}",
 *     summary="Delete a user",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User deleted"
 *     ),
 *     @OA\Response(response=404, description="User not found")
 * )
 *
 */
class UserControllerDocs {}
