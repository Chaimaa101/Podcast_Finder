<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     schema="User",
 *     title=" User",
 *     description="User model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Tanythinf"),
 *     @OA\Property(property="email", type="string", example="anything@gmail.co"),
 *     @OA\Property(property="password", type="integer", example="password12"),
 *     @OA\Property(property="password_confirmation", type="string", example="password12"),
 *     @OA\Property(property="role", type="string", example="admin"),
 *     @OA\Property(property="created_at", type="string", example="2025-11-12T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", example="2025-11-12T12:00:00Z")
 * )
 */
class UserSchema {}
