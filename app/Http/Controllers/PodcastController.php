<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Podcast::with(['user', 'episodes'])->get();
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePodcastRequest $request)
    {
        try {
            $request->user()->podcasts()->create($request->validated());
            return [
                'message' => 'podcast créé avec succès'
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
    public function show(Podcast $podcast)
    {
        try {
            return $podcast;
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePodcastRequest $request, Podcast $podcast)
    {
         try {
            $podcast->update($request->validated());
            return [
                'message' => 'Podcast modifié avec succès'
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
    public function destroy(Podcast $podcast)
    {
        //
    }
}
