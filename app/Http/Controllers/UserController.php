<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Admin only)
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Display the specified user.
     * (Admin only)
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified user.
     * (Admin only — can be used to promote a user to admin)
     */
    public function update(Request $request, User $user)
    {
        try{
             $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'role' => 'sometimes|in:student,teacher,admin',
        ]);

        $user->update($validated);

        return [
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user
        ];
        }catch(Exception $e){
            return [
            'message' => 'Error  ',
            'error' => $e->getMessage()
            ];
        }
       
    }

    /**
     * Remove the specified user from storage.
     * (Admin only)
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

        return response()->json([
            'message' => 'Utilisateur supprimé avec succès'
        ]);
        } catch (Exception $e) {
              return [
            'error' => $e->getMessage()
            ];
        }
    }

}
