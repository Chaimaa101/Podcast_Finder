<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     schema="Episode",
 *     title="Episode",
 *     description="Episode model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="The Tech Talk Show"),
 *     @OA\Property(property="description", type="string", example="A Episode about technology trends and innovations."),
 *     @OA\Property(property="duree", type="integer", example="20"),
 *     @OA\Property(property="audio_file", type="string", example="https://res.cloudinary.com/demo/image/upload/v1690012345/Episode.jpg"),
 *     @OA\Property(property="podcast_id", type="integer", example=5),
 *     @OA\Property(property="created_at", type="string", example="2025-11-12T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", example="2025-11-12T12:00:00Z")
 * )
 */
class EpisodeSchema {}
