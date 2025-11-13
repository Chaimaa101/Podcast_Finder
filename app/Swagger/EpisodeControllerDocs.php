<?php

namespace App\Swagger;


/**
 * @OA\Tag(
 *     name="Episodes",
 *     description="Endpoints for managing Episodes"
 * )
 *  @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 *
 * @OA\Get(
 *     path="/api/podcasts/{podcast}/episodes",
 *     summary="Show Episode of a podcast",
 *     tags={"Episodes"},
 * security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="podcast",
 *         in="path",
 *         required=true,
 *         description="Episode ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Episode details",
 *         @OA\JsonContent(ref="#/components/schemas/Episode")
 *     ),
 *     @OA\Response(response=404, description="Episode not found")
 * )
 *
 * @OA\Post(
 *     path="/api/podcasts/{podcast}/episodes",
 *     summary="Create a new Episode",
 *     tags={"Episodes"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Episode")
 *     ),
 *     @OA\Response(response=201, description="Episode created successfully")
 * )
 *
 * @OA\Put(
 *     path="/api/episodes/{episode}",
 *     summary="Update a Episode",
 *     tags={"Episodes"},
 *     @OA\Parameter(
 *         name="episode",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Episode")
 *     ),
 *     @OA\Response(response=200, description="Episode updated successfully")
 * )
 *
 * @OA\Delete(
 *     path="/api/Episodes/{id}",
 *     summary="Delete a Episode",
 *     tags={"Episodes"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=200, description="Episode deleted successfully")
 * )
 */
class EpisodeControllerDocs {}
