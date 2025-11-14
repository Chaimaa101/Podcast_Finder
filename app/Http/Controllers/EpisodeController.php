<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\Episode;
use App\Models\Podcast;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Podcast $podcast)
    {
        try {
            $episodes = Episode::where('podcast_id', $podcast->id)
                ->with('podcast')
                ->get();

            return response()->json($episodes);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpisodeRequest $request, Podcast $podcast)
    {
        try {
            $infos = $request->validated();

            if ($request->hasFile('audio')) {

                $uploadedFile = Cloudinary::uploadFile(
                    $request->file('audio')->getRealPath(),
                    ['resource_type' => 'auto']
                );

                $infos['audio'] = $uploadedFile->getSecurePath();
            }

            $episode = $podcast->episodes()->create($infos);

            return [
                'message' => 'Episode créé avec succès',
                'Episode' => $episode
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        return $episode;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        try {

             $infos = $request->validated();

            if ($request->hasFile('audio')) {

                $uploadedFile = Cloudinary::uploadFile(
                    $request->file('audio')->getRealPath(),
                    ['resource_type' => 'auto']
                );

                $infos['audio'] = $uploadedFile->getSecurePath();
            }

            $episode->update($infos);

            return [
                'message' => 'Episode modifié avec succès',
                'Episode' => $episode
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        try {
            $episode->delete();

            return [
                'message' => 'Episode supprimé avec succès',
            ];
        } catch (\Exception $th) {
            return [
                'error' => $th->getMessage()
            ];
        }
    }
}
