<?php

namespace App\Swagger;


/**
 * @OA\Tag(
 *     name="Podcasts",
 *     description="Endpoints for managing podcasts"
 * )
 *
 * @OA\Get(
 *     path="/api/podcasts",
 *     summary="List all podcasts",
 *     tags={"Podcasts"},
 *     @OA\Response(
 *         response=200,
 *         description="List of podcasts",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Podcast")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/podcasts/{id}",
 *     summary="Show podcast details",
 *     tags={"Podcasts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Podcast ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Podcast details",
 *         @OA\JsonContent(ref="#/components/schemas/Podcast")
 *     ),
 *     @OA\Response(response=404, description="Podcast not found")
 * )
 *
 * @OA\Post(
 *     path="/api/podcasts",
 *     summary="Create a new podcast",
 *     tags={"Podcasts"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Podcast")
 *     ),
 *     @OA\Response(response=201, description="Podcast created successfully")
 * )
 *
 * @OA\Put(
 *     path="/api/podcasts/{id}",
 *     summary="Update a podcast",
 *     tags={"Podcasts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Podcast")
 *     ),
 *     @OA\Response(response=200, description="Podcast updated successfully")
 * )
 *
 * @OA\Delete(
 *     path="/api/podcasts/{id}",
 *     summary="Delete a podcast",
 *     tags={"Podcasts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=200, description="Podcast deleted successfully")
 * )
 */
class PodcastControllerDocs {}
