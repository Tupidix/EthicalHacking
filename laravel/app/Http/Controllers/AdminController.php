<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        // Assurez-vous que l'utilisateur est un administrateur
        if (Auth::user()->role === 'Admin') {
            $users = User::all();
            $roles = ['Admin', 'Editor', 'Lector', 'Guest', 'Disabled'];
            $connectedUserEmail = Auth::user()->email;

            return view('rolepage', compact('users', 'roles', 'connectedUserEmail'));
        } else {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }

    public function updateRole(Request $request, $userId)
    {
        // Assurez-vous que l'utilisateur est un administrateur
        if (Auth::user()->role === 'Admin') {
            $user = User::findOrFail($userId);
            $user->update(['role' => $request->input('role')]);
            $users = User::all();

            return Redirect::back()->with('success', 'Rôle mis à jour avec succès.');
        } else {
            abort(403, 'Vous n\'avez pas la permission d\'effectuer cette action.');
        }
    }
}
