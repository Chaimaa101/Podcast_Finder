<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
             $infos = $request->validated();

       
        if ($request->hasFile('image')) {
             $filePath = $request->file('image')->getRealPath();

            $uploadedImage = Cloudinary::upload($filePath);

            $infos['image'] = $uploadedImage;
        }

            $podcast = $request->user()->podcasts()->create($infos);
            return [
                'message' => 'podcast créé avec succès',
                'podcast' => $podcast
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
