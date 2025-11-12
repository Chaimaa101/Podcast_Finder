<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     schema="Podcast",
 *     title="Podcast",
 *     description="Podcast model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="The Tech Talk Show"),
 *     @OA\Property(property="description", type="string", example="A podcast about technology trends and innovations."),
 *     @OA\Property(property="category", type="string", example="Technology"),
 *     @OA\Property(property="image", type="string", example="https://res.cloudinary.com/demo/image/upload/v1690012345/podcast.jpg"),
 *     @OA\Property(property="user_id", type="integer", example=5),
 *     @OA\Property(property="created_at", type="string", example="2025-11-12T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", example="2025-11-12T12:00:00Z")
 * )
 */
class PodcastSchema {}
