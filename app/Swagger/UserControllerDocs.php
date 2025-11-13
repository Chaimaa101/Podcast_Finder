<?php

namespace App\Swagger;


/**
 * @OA\Tag(
 *     name="User",
 *     description="Endpoints for managing users"
 * )
 * @OA\Post(
 *     path="/api/register",
 *     summary="create account",
 *     tags={"User"},
 *    @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Episode details",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(response=404, description="Episode not found")
 * )
 *
 */
class UserControllerDocs {}
