<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\Episode;
use App\Models\Podcast;

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

            $episode = $podcast->episodes()->create($request->validated());

            return [
                'message' => 'Episode créé avec succès',
                'Episode' => $episode
            ];
        } catch (\Exception $th) {
            return [
                'error' => $th->getMessage()
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

            $episode->update($request->validated());

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
