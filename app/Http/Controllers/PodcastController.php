<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;


class PodcastController extends Controller
{

    public function myPodcasts(Request $request)
    {
        try {
            return $request->user()->podcasts()->with('episodes')->get();
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }
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
                $uploadedImage = Cloudinary::upload(
                    $request->file('image')->getRealPath()
                );

                $infos['image'] = $uploadedImage->getSecurePath();
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

        Gate::authorize('is-owner', $podcast);
        try {
            $infos = $request->validated();

            if ($request->hasFile('image')) {

                $imageFile = Cloudinary::upload($request->file('image')->getRealPath());

                $infos['image'] = $imageFile->getSecurePath();
            }

            $podcast->update($infos);
            return [
                'message' => 'Podcast modifié avec succès',
                'podcast' => $podcast
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
        Gate::authorize('is-owner', $podcast);
        try {
            $podcast->delete();
            return [
                'message' => 'Podcast supprimé avec succès'
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('query');

        $podcasts = Podcast::where('title', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->orWhere('category', 'LIKE', "%$search%")
            ->get();

        return response()->json($podcasts);
    }
}
