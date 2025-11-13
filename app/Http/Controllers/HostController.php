<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class HostController extends Controller
{
    public function index()
    {
        try {
        $hosts = User::where('role', 'animateur')->get();
        return response()->json($hosts);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function store(RegisterRequest $request)
    {
        try {

        $data = $request->validated();
        $data['role'] = 'animateur';
        $host = User::create($data);

        return [
            'message' => 'Animateur créé avec succès',
            'host' => $host,
        ];

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function update(Request $request, User $host)
    {
        try {
            $data = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:users,email,',
                'password' => 'nullable|min:6|confirmed',
            ]);


            $host->update($data);

            return response()->json([
                'message' => 'Animateur mis à jour avec succès',
                'host' => $host,
            ]);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function show(User $host)
    {
        try {
            return $host;
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }


    public function destroy(User $host)
    {
        $host->delete();

        return response()->json(['message' => 'Animateur supprimé avec succès']);
    }
}
