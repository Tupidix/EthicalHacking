<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' || Auth::user()->role === 'Lector') {
            $userRole = Auth::user()->role;
            $messages = Message::all();
        return view('message', compact('messages', 'userRole'));
        }
        else {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }

    public function create()
    {   
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor') {
        return view('create-message');
        }
        else {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Use the authenticated user's ID directly
        Message::create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
            'userEmail' => Auth::user()->email,
        ]);
    
        return redirect()->route('create-message')->with('success', 'Message created successfully!');
    }

    public function destroy($id)
    {
        if(Auth::user()->role === 'Admin'){
        // Récupérez le message à supprimer
        $message = Message::findOrFail($id);

        // Supprimez le message
        $message->delete();

        // Redirigez avec un message de succès
        return redirect()->route('message')->with('success', 'Message deleted successfully!');
    } else {
        abort(403, 'Vous n\'avez pas la permission d\'effectuer cette action');
    }
    }
}
